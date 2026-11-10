<?php
$server = 'localhost'; 
$user = 'root';
$password = 'adim';
$database = 'db_notas';

$conexao = new mysqli($server, $user, $password, $database);

if ($conexao == false) {
    die('Error na conexão');
}

?>