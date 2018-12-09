<?php

namespace App\Mail;

use App\Persona;
use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CorreoUsuarioCreado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $usuario,$persona;


    public function __construct(Usuario $usuario,Persona $persona)
    {
        $this->usuario = $usuario;
        $this->persona=$persona;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.creacionCorreo');
    }
}
