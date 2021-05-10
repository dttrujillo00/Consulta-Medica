<?php

define('DB_USUARIO', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'consultamedica');

$conn = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NAME);

// echo $conn->ping();