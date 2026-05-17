@twillBlockTitle('Dokumente')
@twillBlockIcon('file-text')
@twillBlockGroup('app')

<x-twill::input
    name="title"
    label="Überschrift"
    :translated="true"
/>

<x-twill::select
    name="level"
    label="Überschriften-Ebene"
    default="h2"
    :options="[
        [
            'value' => 'h2',
            'label' => 'H2'
        ],
        [
            'value' => 'h3',
            'label' => 'H3'
        ],
        [
            'value' => 'h4',
            'label' => 'H4'
        ],
    ]"
/>

<x-twill::files
    name="documents"
    label="Dokumente"
    :item-label="'Dokument'"
    :note="'Beliebig viele Dokumente hinzufügen'"
/>
