<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$server   = 'localhost';
$user     = 'root';
$password = 'admin';
$database = 'db_notas';

try {
    $conexao = new mysqli($server, $user, $password, $database);
} catch (mysqli_sql_exception $e) {
    die('Erro na conexão: ' . $e->getMessage());
}
?>