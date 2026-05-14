<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\BladePartial;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Forms\Form;

class ArticleController extends BaseModuleController
{
    protected $moduleName = 'articles';

    protected function setUpController(): void
    {
        $this->setPermalinkBase('artikel');
        $this->withoutLanguageInPermalink();
    }

    public function getSideFieldsets(TwillModelContract $model): Form
    {
        $form = parent::getSideFieldsets($model);

        $form->addFieldset(
            Fieldset::make()
                ->title('Themen')
                ->id('topics')
                ->fields([
                    Select::make()
                        ->name('main_topic_id')
                        ->label('Hauptthema')
                        ->options(
                            \App\Models\Topic::published()->orderBy('position')->get()->map(function ($topic) {
                                return [
                                    'value' => $topic->id,
                                    'label' => $topic->title,
                                ];
                            })->toArray()
                        )
                        ->addOptional(),
                    Browser::make()
                        ->name('topics')
                        ->modules([\App\Models\Topic::class])
                        ->label('Nebenthemen')
                        ->max(10)
                ])
        );

        $form->addFieldset(
            Fieldset::make()
                ->title('Meta')
                ->id('meta')
                ->fields([
                    Medias::make()
                        ->name('cover')
                        ->label('Cover Image')
                        ->max(1),
                ])
        );

        $form->addFieldset(
            Fieldset::make()
                ->title('Event-Verknüpfung')
                ->id('linked-events')
                ->fields([
                    // BladePartial::make()->view('twill.articles.linked_events_sidebar'),
                    Browser::make()
                        ->name('events')
                        ->modules([\App\Models\Event::class])
                        ->label('Verknüpfte Events')
                        ->max(10)
                ])
        );

        return $form;
    }

    public function getForm(TwillModelContract $model): Form
    {
        return Form::make([
            Input::make()
                ->name('title')
                ->label('Titel')
                ->required()
                ->translatable(),
            Input::make()
                ->name('teaser')
                ->label('kurzer Teaser')
                ->type('textarea')
                ->rows(3)
                ->maxlength(200)
                ->note('Wird auf der Startseite angezeigt')
                ->translatable(),
            BlockEditor::make()
        ]);
    }

    public function getCreateForm(): Form
    {
        return Form::make([
            Input::make()
                ->name('title')
                ->label('Titel')
                ->translatable()
                ->onChange('formatPermalink'),
            Input::make()
                ->name('teaser')
                ->label('kurzer Teaser')
                ->type('textarea')
                ->translatable()
        ]);
    }
}
