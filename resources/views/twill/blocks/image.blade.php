@twillBlockTitle('Image')
@twillBlockIcon('image')
@twillBlockGroup('app')

<x-twill::medias
    name="highlight"
    label="Highlight"
/>

<x-twill::select
    name="width"
    label="Breite"
    default="full"
    :options="[
        [
            'value' => 'full',
            'label' => 'Voll'
        ],
        [
            'value' => 'half',
            'label' => '1/2'
        ],
        [
            'value' => 'third',
            'label' => '1/3'
        ],
        [
            'value' => 'fourth',
            'label' => '1/4'
        ],
    ]"
/>

<x-twill::select
    name="alignment"
    label="Ausrichtung"
    default="left"
    :options="[
        [
            'value' => 'left',
            'label' => 'Links'
        ],
        [
            'value' => 'right',
            'label' => 'Rechts'
        ],
    ]"
    connected-to="width"
    :connected-to-values="['half', 'third', 'fourth']"
/>

<x-twill::checkbox
    name="show_lightbox"
    label="in Lightbox öffnen"
/>
