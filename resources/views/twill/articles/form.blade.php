@extends('twill::layouts.form')

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
            'max' => 1,
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
@stop
