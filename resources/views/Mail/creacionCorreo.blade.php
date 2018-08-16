<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
<h1> ARPEMAR SAC</h1>
<p>Hola la aplicacion ARPEMAR S.A.C ha creado exitosamente tu cuenta, por favor verifica tus datos.</p>
<p>Datos de usuario Registrado:</p>
<ul>
    <li>NOMBRE: {{ $persona->nombres }} </li>
    <li>APELLIDOS: {{ $persona->apellidos }}</li>
    <li>DNI: {{ $persona->dni }}</li>
    <li>NRO CELULAR: {{ $persona->nroCelular }}</li>
    <li>CORREO: {{$persona->correo}}</li>
</ul>
<p>Datos de acceso a la cuenta</p>
<ul>
    <li>Usuario:{{ $usuario->usuario }}</li>
    <li>Clave: {{ $usuario->password }} </li>
</ul>
</body>
</html>