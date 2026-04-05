<?php
require_once 'db.php';

$id_para_ser_editado = $_POST["id_para_ser_atualizado"];
$nome = $_POST["nome"];
$codigo = $_POST["codigo"];
$professor = $_POST["professor"];

$conexao = getConexao();
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "UPDATE my_table SET nome = '$nome', codigo = $codigo, professor = $professor WHERE id = $id_para_ser_editado";


if (mysqli_query($conexao, $query)) {
    echo "Matéria atualizada com sucesso!";
} else {
    echo "Erro ao atualizar matéria: " . mysqli_error($conexao);
}

mysqli_close($conexao);

echo "<br><a href='home.php'>Voltar para Home</a>";

?>