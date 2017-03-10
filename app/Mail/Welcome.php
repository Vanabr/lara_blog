<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class Welcome
 * @package App\Mail
 */
class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    protected $user;

    /**
     * Create a new message instance.
     * @param \App\User $user
     *
     */
    public function __construct( User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome', [
            'user' => $this->user
        ]);
    }
}
