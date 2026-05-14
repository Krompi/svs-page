<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBrowsers;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Models\Contracts\TwillModelContract;
use App\Models\Event;

class EventRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias, HandleFiles, HandleRevisions, HandleBrowsers;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    public function afterSave(TwillModelContract $model, array $fields): void
    {
        $this->updateBrowser($model, $fields, 'articles');
        $this->updateBrowser($model, $fields, 'topics');
        parent::afterSave($model, $fields);
    }

    public function getFormFields(TwillModelContract $model): array
    {
        $fields = parent::getFormFields($model);
        $fields['browsers']['articles'] = $this->getFormFieldsForBrowser($model, 'articles');
        $fields['browsers']['topics'] = $this->getFormFieldsForBrowser($model, 'topics');
        return $fields;
    }
}
