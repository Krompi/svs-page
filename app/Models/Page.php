<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Page extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition, HasFactory;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
    ];
    
    public $translatedAttributes = [
        'title',
        'description',
    ];
    
    public $slugAttributes = [
        'title',
    ];

    public function banners(): BelongsToMany
    {
        return $this->belongsToMany(Banner::class)->withPivot('position')->orderByPivot('position');
    }
}
