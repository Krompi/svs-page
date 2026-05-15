<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class MenuLink extends Model implements Sortable
{
    use HasTranslation, HasPosition, HasNesting, HasRelated;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
        'external_link',
        'external_link_new_window',
    ];
    
    public $translatedAttributes = [
        'title',
        'description',
    ];

    public function getHrefAttribute()
    {
        if ($this->external_link) {
            return $this->external_link;
        }

        $page = $this->getRelated('page')->first();

        if ($page) {
            return route('frontend.page', $page->slug);
        }

        return '#';
    }

    public function getTargetAttribute()
    {
        return $this->external_link_new_window ? '_blank' : '_self';
    }
}
