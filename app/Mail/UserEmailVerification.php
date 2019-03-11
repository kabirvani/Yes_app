<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $email, $login_url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $login_url)
    {
        $this->email = $email;
        $this->login_url = $login_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Welcome to Yes!";
        return $this->view('mail/welcome_mail', ['email' => $this->email, 'login_url' => $this->login_url, 'profile_type' => 'company', 'year' => '2019'])->subject($subject);
    }
}
