@twillBlockTitle('Gallery')
@twillBlockIcon('media-grid')
@twillBlockGroup('app')

<x-twill::input
    name="title"
    label="Title"
    :translated="true"
/>

<x-twill::wysiwyg
    name="intro"
    label="Intro text"
    :toolbar-options="[
        'bold',
        'italic',
        ['list' => 'bullet'],
        ['list' => 'ordered'],
        'link',
        'clean'
    ]"
    :translated="true"
/>

<x-twill::medias
    name="gallery"
    label="Gallery images"
    :max="100"
/>
