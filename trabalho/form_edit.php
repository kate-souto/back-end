<?php

$id_para_ser_editado = $_POST["id_para_ser_editado"];

$conexao = mysqli_connect("localhost", "root", "", "bancoteste");
if (!$conexao) 
{
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "SELECT nomemateria, cpfprofessor FROM materias WHERE codigo = " . $id_para_ser_editado;

$resultado = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($resultado);

?>


<form action="atualizar_no_bd.php" method="POST">
    <label>Nome:</label>
    <input type="text" name="nomemateria" value="<?=$row["nomemateria"];?>" required><br><br>

    <label>Professor:</label>
    <input type="text" name="cpfprofessor" value="<?=$row["cpfprofessor"];?>" required><br><br>

    <input type="hidden" name="id_para_ser_atualizado" value="<?=$id_para_ser_editado;?>">

    <input type="submit" value="Editar Matéria">   
</form>
