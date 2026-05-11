<x-mail::message>
# Neue Kontaktanfrage

**Name:** {{ $data['name'] }}
    
**E-Mail:** {{ $data['email'] }}
    

**Nachricht:**
{{ $data['message'] }}

    
@if(!empty($data['whatsapp']))
**WhatsApp-Gruppe:** Ja
    
**Smartphone-Nummer:** {{ $data['phone'] ?? 'Nicht angegeben' }}
@else
**WhatsApp-Gruppe:** Nein
@endif

Danke,<br>
{{ config('app.name') }}
</x-mail::message>
