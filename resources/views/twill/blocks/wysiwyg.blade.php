@twillBlockTitle('Wysiwyg')
@twillBlockIcon('edit')
@twillBlockGroup('app')

<x-twill::wysiwyg name="text" label="Text" placeholder="Text" :toolbar-options="[
    ['header' => [2, 3, 4, 5, 6, false]],
    'bold',
    'italic',
    'underline',
    'strike',
    'blockquote',
    'code-block',
    'ordered',
    'bullet',
    'hr',
    'code',
    'link',
    'clean',
    'table',
    'align',
]" :translated="true" />
