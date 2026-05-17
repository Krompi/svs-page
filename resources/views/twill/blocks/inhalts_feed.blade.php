@twillBlockTitle('Inhalts-Feed')
@twillBlockIcon('rows')
@twillBlockGroup('app')

<x-twill::radios
    name="feed_type"
    label="Typ"
    default="events"
    :inline="true"
    :options="[
        ['value' => 'events', 'label' => 'Veranstaltungen'],
        ['value' => 'articles', 'label' => 'Meldungen'],
    ]"
/>

<x-twill::input
    name="count"
    label="Anzahl der Einträge"
    type="number"
    default="3"
/>

<x-twill::browser
    module-name="topics"
    name="topics"
    label="Filter nach Themen (Optional)"
    :max="10"
/>
