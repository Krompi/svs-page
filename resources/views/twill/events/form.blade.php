@extends('twill::layouts.form')
@php
$wysiwygOptions = [
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
];
@endphp

@section('contentFields')
    @formField('input', [
        'name' => 'title',
        'label' => 'Titel',
        'required' => true,
        'translated' => true,
    ])

    @formField('input', [
        'name' => 'teaser',
        'label' => 'Teaser',
        'type' => 'textarea',
        'rows' => 3,
        'maxlength' => 200,
        'note' => 'Wird auf der Startseite angezeigt',
        'translated' => true,
    ])

    @formField('block_editor')

@stop

@section('sideFieldsets')
<a17-fieldset title="Meta" id="meta">
    @formField('medias', [
        'name' => 'cover',
        'label' => 'Cover Image',
    ])

    @formField('date_picker', [
        'name' => 'publish_start_date',
        'label' => 'Veröffentlicht von',
    ])

    @formField('date_picker', [
        'name' => 'publish_end_date',
        'label' => 'Veröffentlicht bis',
    ])
    </a17-fieldset>
    
<a17-fieldset title="Datum" id="date">

    @formField('date_picker', [
        'name' => 'start_date',
        'label' => 'Start Datum',
    ])

    @formField('date_picker', [
        'name' => 'start_time',
        'label' => 'Start Zeit',
        'time_only' => true,
    ])

    @formField('date_picker', [
        'name' => 'end_date',
        'label' => 'Ende Datum',
    ])

    @formField('date_picker', [
        'name' => 'end_time',
        'label' => 'Ende Zeit',
        'time_only' => true,
    ])
    </a17-fieldset>
    
<a17-fieldset title="Ort" id="location">

    @formField('input', [
        'name' => 'location',
        'label' => 'Ort',
        'type' => 'text',
    ])

    @formField('input', [
        'name' => 'location_url',
        'label' => 'Ort URL',
        'type' => 'url',
    ])
</a17-fieldset>
@stop
