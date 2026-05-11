<?php

namespace App\Http\Controllers;

use App\Mail\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'privacy' => 'accepted',
            'whatsapp' => 'nullable|boolean',
            'phone' => 'required_if:whatsapp,1|nullable|string|max:50',
        ], [
            'name.required' => 'Bitte geben Sie Ihren Namen an.',
            'email.required' => 'Bitte geben Sie Ihre E-Mail-Adresse an.',
            'email.email' => 'Bitte geben Sie eine gültige E-Mail-Adresse an.',
            'message.required' => 'Bitte geben Sie eine Nachricht ein.',
            'privacy.accepted' => 'Bitte akzeptieren Sie die Datenschutzerklärung.',
            'phone.required_if' => 'Bitte geben Sie Ihre Smartphone-Nummer für die WhatsApp-Gruppe an.',
        ]);

        $recipient = config('mail.contact_recipient');

        if ($recipient) {
            Mail::to($recipient)->send(new ContactRequest($validated));
        }

        return back()->with('success', 'Vielen Dank für Ihre Nachricht! Wir haben Ihre Anfrage erhalten und werden uns so schnell wie möglich bei Ihnen melden.');
    }
}
