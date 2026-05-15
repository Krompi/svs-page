@twillBlockTitle('Button')
@twillBlockIcon('link')

<x-twill::input
    name="text"
    label="Button Text"
    :translatable="true"
/>

<x-twill::input
    name="link"
    label="Link Target"
/>

<x-twill::select
    name="variant"
    label="Button Variant"
    :options="[
        ['value' => 'primary', 'label' => 'Primary (Blue)'],
        ['value' => 'accent', 'label' => 'Accent (Yellow)'],
        ['value' => 'black', 'label' => 'Black'],
    ]"
    default="primary"
/>

<x-twill::select
    name="display"
    label="Display Mode"
    :options="[
        ['value' => 'inline', 'label' => 'Inline'],
        ['value' => 'block', 'label' => 'Block (Full Width)'],
    ]"
    default="inline"
/>
