<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$proyecto = $_POST['proyecto'];
$contrato = $_POST['contrato'];
$mensaje = $_POST['mensaje']; //array assoc - $foto['tmp_name']; $foto['size'] - $foto['name']

if( empty(trim($nombre)) ) $nombre = 'anonimo';
if( empty(trim($apellido)) ) $apellido = '';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre / $email</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

$mailer = new PHPMailer();
$mailer->setFrom( $email, "$nombre" );
$mailer->addAddress('jose.zapata@eaf.edu.ar','Sitio web');
$mailer->Subject = "Mensaje web: $proyecto";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$mailer->CharSet = 'UTF-8';

if( $foto['size'] > 0 ){
    $mailer->addAttachment( $foto['tmp_name'], $foto['name'] );
}

$rta = $mailer->send( );

//var_dump($rta);
header("Location: gracias.html" );