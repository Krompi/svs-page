@twillBlockTitle('Card')
@twillBlockIcon('image-text')
@twillBlockGroup('app')

<x-twill::medias
    name="cover"
    label="Bild"
/>

<x-twill::input
    name="title"
    label="Titel"
    :translated="true"
/>

<x-twill::select
    name="heading_level"
    label="Überschrift-Stufe"
    default="h2"
    :options="[
        ['value' => 'h2', 'label' => 'H2'],
        ['value' => 'h3', 'label' => 'H3'],
        ['value' => 'h4', 'label' => 'H4'],
    ]"
/>

<x-twill::select
    name="orientation"
    label="Ausrichtung (Layout)"
    default="vertical"
    :options="[
        ['value' => 'vertical', 'label' => 'Vertikal'],
        ['value' => 'horizontal', 'label' => 'Horizontal'],
    ]"
/>

<x-twill::select
    name="alignment"
    label="Text-Ausrichtung"
    default="left"
    :options="[
        ['value' => 'left', 'label' => 'Links'],
        ['value' => 'center', 'label' => 'Zentriert'],
        ['value' => 'right', 'label' => 'Rechts'],
    ]"
/>

<x-twill::select
    name="width"
    label="Breite"
    default="1/3"
    :options="[
        ['value' => '1/2', 'label' => '1/2'],
        ['value' => '1/3', 'label' => '1/3'],
        ['value' => '1/4', 'label' => '1/4'],
    ]"
/>

<x-twill::input
    name="link"
    label="Link (URL)"
/>

<x-twill::block-editor
    name="card_content"
    label="Inhalt"
    :blocks="['text', 'wysiwyg', 'button']"
/>
