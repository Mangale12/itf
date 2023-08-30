<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailToAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;

    /**
     * Create a new message instance.
     */
    public function __construct($contact)
    {
        $this->contact=$contact;
    }

    public function build(){
        $contact = json_decode($this->contact,true);
        // dd($details);
        $subject = $contact['subject'];
        // $title = ($settings->theme == 'default')?'Noor':ucwords($settings->theme);

        return $this->from('admin@test99.caandv.com', "ITF")
                    ->subject($subject)
                    ->markdown('mails.mail_to_admin')
                    ->with([
                        'contact' => ($contact['name'])
                           ]);
    }

}
