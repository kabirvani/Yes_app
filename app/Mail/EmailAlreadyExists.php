<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAlreadyExists extends Mailable
{
    use Queueable, SerializesModels;

    protected $email, $passwordResetUrl;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $passwordResetUrl)
    {
        //
        $this->email = $email;
        $this->passwordResetUrl = $passwordResetUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Your account on Yes!";
        return $this->view('mail/email_already_exists',['email' => $this->email, 'passwordResetUrl' => $this->passwordResetUrl, 'profile_type' => 'company', 'year' => '2019'])->subject($subject);
    }
}
