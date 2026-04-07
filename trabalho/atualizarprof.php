<?php
require_once 'db.php';

$id_para_prof_ser_editado = $_POST["id_para_prof_ser_atualizado"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];

$conexao = getConexao();
if (!$conexao) 
{
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "UPDATE professor SET nome = '$nome', cpf = $cpf WHERE cpf = '$id_para_prof_ser_editado'";


if (mysqli_query($conexao, $query)) 
{
    echo "Professor atualizado com sucesso!";
} 
else 
{
    echo "Erro ao atualizar professor: " . mysqli_error($conexao);
}

mysqli_close($conexao);

echo "<br><a href='home.php'>Voltar para Home</a>";

?>