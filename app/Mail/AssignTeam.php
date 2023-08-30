<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssignTeam extends Mailable
{
    use Queueable, SerializesModels;
    public $team;

    /**
     * Create a new message instance.
     */
    public function __construct($team)
    {
        $this->team = $team;
    }

    public function build(){
        $team = json_decode($this->team,true);
        // dd($details);
        $subject = $contact['subject'];
        // $title = ($settings->theme == 'default')?'Noor':ucwords($settings->theme);

        return $this->from('admin@test99.caandv.com', "ITF")
                    ->subject($subject)
                    ->markdown('mails.teamassign_to_contact')
                    ->with([
                        'contact' => (!empty($team) ? $team : '')
                           ]);
    }
}
