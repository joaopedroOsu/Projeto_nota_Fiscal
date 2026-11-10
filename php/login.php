<?php
include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$select = $conexao->prepare("SELECT NM_USUARIO, EMAIL FROM TB_USUARIO WHERE EMAIL = ? AND senha = ?");
$select->bind_param("ss", $email, $senha);
$select->execute();
$result = $select->get_result()->fetch_assoc();

if ($result) {
    session_start();
    $_SESSION['email'] = $result['EMAIL'];
    $_SESSION['nome']  = $result['NM_USUARIO'];

    header("Location: ../home.html");
    exit;
} else {
    echo "<script>alert('Email ou senha incorretos'); window.location.href='../index.html';</script>";
}
?>