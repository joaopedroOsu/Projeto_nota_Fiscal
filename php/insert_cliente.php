<?php
include 'conexao.php';
 
// dados vindos do formulário (cad_cliente.html)
$cnpj  = $_POST['cnpj'];
$razao = $_POST['razao'];
$pais  = $_POST['pais'];
$email = $_POST['email'];
 
// os ? evitam SQL Injection (os valores são enviados separados do comando)
$insert = $conexao->prepare(
    "INSERT INTO tb_cliente (nr_cnpj, nm_razao_social, nm_pais, nm_email) VALUES (?, ?, ?, ?)"
);
$insert->bind_param("ssss", $cnpj, $razao, $pais, $email);
 
if ($insert->execute()) {
    header("Location: ../obrigado.html");
} else {
    echo "<script>alert('Erro ao cadastrar cliente'); history.back();</script>";
}
?>