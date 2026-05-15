<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use App\Models\Page;

class MenuLinkController extends BaseModuleController
{
    protected $moduleName = 'menuLinks';
    protected $showOnlyParentItemsInBrowsers = true;
    protected $nestedItemsDepth = 1;

    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->enableReorder();
    }

    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Browser::make()
                ->name('page')
                ->modules([Page::class])
                ->label('Interne Seite')
                ->max(1)
        );

        $form->add(
            Input::make()
                ->name('external_link')
                ->label('Externer Link')
                ->note('Wenn gesetzt, hat dieser Link Vorrang vor der internen Seite.')
        );

        $form->add(
            Checkbox::make()
                ->name('external_link_new_window')
                ->label('In neuem Tab öffnen')
        );

        $form->add(
            Input::make()
                ->name('description')
                ->label('Beschreibung')
                ->translatable()
        );

        return $form;
    }

    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Beschreibung')
        );

        return $table;
    }
}
