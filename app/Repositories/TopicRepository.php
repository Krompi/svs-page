<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Topic;

class TopicRepository extends ModuleRepository
{
    use HandleSlugs;

    public function __construct(Topic $model)
    {
        $this->model = $model;
    }
}
