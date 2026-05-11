<?php

namespace Tests\Feature;

use App\Mail\ContactRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_validation()
    {
        $response = $this->post(route('contact.submit'), []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email', 'message', 'privacy']);
    }

    public function test_contact_form_whatsapp_validation()
    {
        $response = $this->post(route('contact.submit'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello',
            'privacy' => '1',
            'whatsapp' => '1',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['phone']);
    }

    public function test_contact_form_submission_sends_email()
    {
        Mail::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello there!',
            'privacy' => '1',
            'whatsapp' => '0',
        ];

        // We need to set the recipient config for the controller
        config(['mail.contact_recipient' => 'admin@example.com']);

        $response = $this->post(route('contact.submit'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');

        Mail::assertSent(ContactRequest::class, function ($mail) use ($data) {
            return $mail->hasTo('admin@example.com') &&
                   $mail->data['name'] === $data['name'] &&
                   $mail->data['email'] === $data['email'];
        });
    }
}
