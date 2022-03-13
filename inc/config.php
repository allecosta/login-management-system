<?php

session_start();

$server = "localhost";
$username = "###";
$password = "###";
$dbname = "db_login_system";

$conn = mysqli_connect("$server", "$username", "$password", "$dbname");

if (!$conn) {
    die("Ops! Falha de conexão" . mysqli_connect_error());
} else {
    echo "Conexão realizada com sucesso!";
}
