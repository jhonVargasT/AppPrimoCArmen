<?php

use Illuminate\Database\Seeder;

class usuariorootseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('persona')->insert([
            'dni' => null,
            'ruc' => null,
            'nombres' => 'Usuario',
            'apellidos' => '',
            'fechaNacimiento' => null,
            'direccion' => null,
            'nroCelular' => null,
            'correo' => null,
            'fechaCreacion' => null,
            'estado' => 1,
            'fechaActualizacion' => null,
            'usuarioCreacion' => null,
            'departamento' => null,
            'provincia' => null,
            'distrito' => null
        ]);
        DB::table('usuario')->insert([

            'password' => '$2y$12$.xNuiPII66QMA83k1vEgwOB9nCExuQUJVEGoQVBRBNXOPaGcECQjW',
            'usuario' => 'root',
            'passwordAntigua' => null,
            'fechaCambioPassword' => null,
            'tipoUsuario' => 1,
            'usuarioCreacion' => null,
            'fechaCreacion' => null,
            'estado' => 1,
            'id_Persona' => 1
        ]);
    }
}
