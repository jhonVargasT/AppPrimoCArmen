<?php

namespace App\Mail;

use App\Persona;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class EnvioDeCorreos extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  return $this->view('emails.welcome')
        ->from('jhonvargast@gmail.com')
        ->subject('Bienvenido!');
    }

    public  function enviarCorreo(){
        $data = []; // Empty array

        Mail::send('index', $data, function($message)
        {
            $message->to('jhonvargast@gmail.com', 'Jon Doe')->subject('Welcome');
        });
    }
}
