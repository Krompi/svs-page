<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Spatie\LaravelPackageTools\Concerns\Package\HasBladeComponents;

class Event extends Model
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasFactory, HasBladeComponents;

    protected $fillable = [
        'title',
        'description',
        'published',
        'teaser',
        'publish_start_date',
        'publish_end_date',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'location',
        'location_url',
    ];

    protected $attributes = [
        'publish_start_date' => null,
        'publish_end_date' => null,
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'publish_start_date' => 'datetime',
        'publish_end_date' => 'datetime',
    ];

    public $translatedAttributes = [
        'title',
        'teaser',
    ];

    public array $mediasParams = [
        'cover' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 16 / 9,
                ],
            ],
        ],
    ];

    public $slugAttributes = [
        'title',
    ];

    public function getCoverAttribute()
    {
        return $this->medias()->wherePivot('role', 'cover')->first();
    }

    public function getCoverUrlAttribute()
    {
        return $this->image('cover');
    }

    public function getCoverPreviewUrlAttribute()
    {
        return $this->image('cover', 'default', ['h' => 256]);
    }

    public function getCoverAltAttribute()
    {
        return $this->cover?->alt_text ?? $this->title;
    }

    public function getLocalizedStartDateAttribute()
    {
        return $this->start_date
            ? $this->start_date->locale(app()->getLocale())
            : null;
    }

    public function getStartDateDayAttribute()
    {
        return $this->localized_start_date?->isoFormat('DD');
    }

    public function getStartDateMonthAttribute()
    {
        return $this->localized_start_date?->isoFormat('MMM');
    }

    public function getStartDateYearAttribute()
    {
        return $this->localized_start_date?->isoFormat('YYYY');
    }

    public function getStartTimeDisplayAttribute()
    {
        return $this->start_time?->format('H:i');
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (! isset($this->attributes['publish_start_date']) || empty($this->attributes['publish_start_date'])) {
            $this->attributes['publish_start_date'] = now();
        }

        if (! isset($this->attributes['publish_end_date']) || empty($this->attributes['publish_end_date'])) {
            $this->attributes['publish_end_date'] = now()->addYear();
        }
    }
}
