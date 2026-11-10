<?php
include 'conexao.php';

$qt           = (int) $_POST['qt'];
$nome_produto = $_POST['nm_produto'];
$cd_nota      = (int) $_POST['cd_nota'];


$busca = $conexao->prepare("SELECT cd_produto, vl_unitario FROM tb_produto WHERE nm_produto = ?");
$busca->bind_param("s", $nome_produto);
$busca->execute();
$produto = $busca->get_result()->fetch_assoc();

if (!$produto) {
    echo "<script>alert('Produto não encontrado'); history.back();</script>";
    exit;
}

$cd_produto    = $produto['cd_produto'];
$vl_total_item = $qt * $produto['vl_unitario'];


$insert = $conexao->prepare(
    "INSERT INTO tb_produto_has_tb_nota (fk_cd_produto, fk_cd_nota, qt_produto, vl_total_item) VALUES (?, ?, ?, ?)"
);
$insert->bind_param("iiid", $cd_produto, $cd_nota, $qt, $vl_total_item);

if ($insert->execute()) {
    header("Location: ../obrigado.html");
} else {
    echo "<script>alert('Erro ao cadastrar item: " . $insert->error . "'); history.back();</script>";
}
?>