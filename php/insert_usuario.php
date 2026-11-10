<?php
include 'conexao.php';

$nomeCompleto = $_POST['nomemompleto'];
$email = $_POST['email'];
$senha = $POST['senha'];
//$confirmarsenha

$insert = "insert into TB_USUARIO values (null, '$nomecompleto', '$email', '$senha')";

$query = $conexao ->query ($insert);

if ($query == true){
    echo "<script> alert('Cadastro realizado com sucesso') history.back(); ,/script";
}



?>