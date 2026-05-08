@twillBlockTitle('Kontaktformular')
@twillBlockIcon('search')

<x-twill::input
    name="title"
    label="Titel (optional)"
    :translated="true"
/>

<x-twill::wysiwyg
    name="text"
    label="Einleitungstext (optional)"
    :translated="true"
/>
