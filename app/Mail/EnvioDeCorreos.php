<?php

namespace App\Mail;

use App\Persona;
use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        $usuario = Usuario::findOrFail(1);
        $persona=Persona::findOrFail($usuario->id_Persona);
        Mail::to('jhonvargast@gmail.com')->send(new  CorreoUsuarioCreado($usuario,$persona));


    }
}
