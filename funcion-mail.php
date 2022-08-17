<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

/*
if( ! isset( $_POST['nombre'] ) ){
    header("Location: index.html" );
}
*/


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$proyecto = $_POST['proyecto'];
$contrato = $_POST['contrato'];
$mensaje = $_POST['mensaje']

if( empty(trim($nombre)) ) $nombre = 'anonimo';
if( empty(trim($telefono)) ) $telefono = '';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre $telefono / $email</p>
    <p>Tipo de proyecto: $proyecto</p>
    <p>Contrato: $contrato</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

//sintaxis de los emails email@algo.com || 
// nombre <email@algo.com>

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre $telefono <$email> \r\n";
$headers.= "To: Sitio web <jose.zapata@eaf.edu.ar> \r\n";
// $headers.= "Cc: copia@email.com \r\n";
// $headers.= "Bcc: copia-oculta@email.com \r\n";


//REMITENTE (NOMBRE/APELLIDO - EMAIL)
//ASUNTO 
//CUERPO 
$rta = mail('jose.zapata@eaf.edu.ar', "Mensaje formulario web", $body, $headers );
//var_dump($rta);

header("Location: gracias.html" );