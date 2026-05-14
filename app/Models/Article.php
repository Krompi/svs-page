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

class Article extends Model
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasFactory, HasBladeComponents;

    protected $fillable = [
        'published',
        'title',
        'teaser',
        'publish_start_date',
        'publish_end_date',
    ];

    protected $attributes = [
        'publish_start_date' => null,
        'publish_end_date' => null,
    ];

    protected $casts = [
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

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

}
