<?php

use PHPMailer\PHPMailer\PHPMailer;

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';

/**
 * @const string WEB_URL
 */

 const WEB_URL = "http://localhost";

include_once 'database/DatabaseConn.php';
/**
 * CREACIÓN DE LA CONEXIÓN
 * @var PDO $conn
 */
$conn = (new DatabaseConn("localhost", "jproject", "root", "osopolar1"))->getConn();

if($conn == null)
    die("No se ha podido conectar a la base de datos!");

/**
 * CONFIGURACIÓN EMAIL
 * @var PHPMailer $email
 */

$email = new PHPMailer(true);
$email->isSMTP();
$email->Host = 'smtp-mail.outlook.com';
$email->Port = 587;
$email->SMTPSecure = 'tls';
$email->SMTPDebug = 0;
$email->SMTPAuth = true;
$email->Username = 'jpproject_staff@outlook.com';
$email->Password = 'gHf9Ld2w0';
$email->From = 'jpproject_staff@outlook.com';
$email->FromName = "J. Palacios";
$email -> CharSet = "UTF-8";

include_once 'models/AModel.php';
AModel::SetConnection($conn);

include_once 'models/Admin.php';
include_once 'models/Mensaje.php';
include_once 'models/Direccion.php';
include_once 'models/Venta.php';
include_once 'models/Pintura.php';
include_once 'models/Envio.php';