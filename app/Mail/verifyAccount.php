<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verifyAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($randCode,$name,$mail)
    {
        $this->randCode     = $randCode;
        $this->name         = $name;
        $this->mail         = $mail;
        $this->verifyLink   = route('verifyMail',['mail'=>$mail,'randCode'=>$this->randCode]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('virtualitprofessional@gmail.com')
                ->markdown('emails.verifyAccount', [
                    'url' => $this->verifyLink, 'name'=>$this->name
                ]);
    }
}
