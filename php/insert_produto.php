<?php
include 'conexao.php';
 
// dados vindos do formulário (cad_produto.html)
$nome  = $_POST['nome_produto'];
$valor = $_POST['valor_unitario'];
 
// aceita vírgula no valor (ex: 10,50 -> 10.50)
$valor = str_replace(',', '.', $valor);
 
// cd_produto é auto_increment, então não entra no insert
$insert = $conexao->prepare(
    "INSERT INTO tb_produto (nm_produto, vl_unitario) VALUES (?, ?)"
);
$insert->bind_param("sd", $nome, $valor);
 
if ($insert->execute()) {
    header("Location: ../obrigado.html");
} else {
    echo "<script>alert('Erro ao cadastrar produto'); history.back();</script>";
}
?>