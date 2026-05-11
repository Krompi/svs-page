<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fields\DatePicker;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Forms\Fieldsets;
use A17\Twill\Services\Forms\BladePartial;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use App\Repositories\ArticleRepository;
use Illuminate\Http\RedirectResponse;

class EventController extends BaseModuleController
{
    protected $moduleName = 'events';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->setPermalinkBase('events');
        $this->withoutLanguageInPermalink();
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        $table->add(
            Text::make()
                ->field('create_article')
                ->title('Aktion')
                ->customRender(function (TwillModelContract $event) {
                    $url = route('twill.events.createArticle', [$event->id]);
                    $csrf = csrf_token();
                    return "
                        <form action='{$url}' method='POST' style='display:inline;'>
                            <input type='hidden' name='_token' value='{$csrf}'>
                            <button type='submit' style='padding: 5px 10px; cursor: pointer; border: none; background: #007AC0; color: white; border-radius: 4px; font-size: 12px;'>
                                Artikel erstellen
                            </button>
                        </form>
                    ";
                })
                ->renderHtml()
        );

        return $table;
    }
 
    public function getSideFieldsets(TwillModelContract $model): Form
    {
        $form = parent::getSideFieldsets($model);

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
                ->title('Datum')
                ->id('date')
                ->fields([
                    DatePicker::make()
                        ->name('start_date')
                        ->label('Start Datum')
                        ->withoutTime(),
                    DatePicker::make()
                        ->name('start_time')
                        ->label('Start Zeit')
                        ->timeOnly(),
                    DatePicker::make()
                        ->name('end_date')
                        ->label('Ende Datum')
                        ->withoutTime(),
                    DatePicker::make()
                        ->name('end_time')
                        ->label('Ende Zeit')
                        ->timeOnly(),
                ])
        );

        $form->addFieldset(
            Fieldset::make()
                ->title('Ort')
                ->id('location')
                ->fields([
                    Input::make()
                        ->name('location')
                        ->label('Ort'),
                    Input::make()
                        ->name('location_url')
                        ->label('Ort URL')
                        ->type('url'),
                ])
        );

        $form->addFieldset(
            Fieldset::make()
                ->title('Artikel-Verknüpfung')
                ->id('article-actions')
                ->fields([
                    BladePartial::make()->view('twill.events.create_article_sidebar'),
                    Browser::make()
                        ->name('articles')
                        ->modules([\App\Models\Article::class])
                        ->label('Verknüpfte Artikel')
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
                ->label('Teaser')
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
                ->label('Veranstaltungstitel')
                ->translatable()
                ->onChange('formatPermalink'),
            Input::make()
                ->name('teaser')
                ->label('kurzer Teaser')
                ->type('textarea')
                ->translatable()
        ]);
    }

    public function createArticle(int $id, ArticleRepository $articleRepository): RedirectResponse
    {
        $event = $this->repository->getById($id, ['medias']);

        $articleFields = [
            'published' => false,
            'title' => $event->getTranslations('title'),
            'teaser' => $event->getTranslations('teaser'),
        ];

        $article = $articleRepository->create($articleFields);

        // Copy cover image if exists
        $cover = $event->medias->filter(function($media) {
            return $media->pivot->role === 'cover';
        })->first();

        if ($cover) {
            $article->medias()->attach($cover->id, [
                'role' => 'cover',
                'crop' => $cover->pivot->crop,
                'metadatas' => $cover->pivot->metadatas,
                'ratio' => $cover->pivot->ratio,
            ]);
        }

        $event->articles()->attach($article->id);

        return redirect()->route('twill.articles.edit', [$article->id]);
    }
}
