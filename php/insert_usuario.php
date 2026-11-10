<?php
include 'conexao.php';

$nomecompleto = $_POST['nomecompleto'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$insert = $conexao->prepare(
    "INSERT INTO tb_usuario (nm_usuario, email, senha) VALUES (?, ?, ?)"
);
$insert->bind_param("sss", $nomecompleto, $email, $senha);

if ($insert->execute()) {
    echo "<script>alert('Cadastro realizado com sucesso'); window.location.href='../index.html';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar: " . $insert->error . "'); history.back();</script>";
}

header("Location: ../index.html");
exit;
?>