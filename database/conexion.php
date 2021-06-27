<?php
/* 
define('DB_USUARIO', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'consultamedica');

$conn = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NAME);
 */

$link = 'mysql:host=localhost;dbname=consultamedica';
$user = 'root';
$pass = '';

try{
$pdo=new PDO($link,$user,$pass);

}catch(PDOException $e){
print "Error de conexion";
}
// echo $conn->ping();