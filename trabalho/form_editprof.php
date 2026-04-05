
<?php

$id_para_prof_ser_editado = $_POST["id_para_prof_ser_editado"];

$conexao = mysqli_connect("localhost", "root", "", "bancoteste");
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "SELECT nome, cpf FROM professor WHERE cpf = '$id_para_prof_ser_editado'";

$resultado = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($resultado);

?>


<form action="atualizarprof.php" method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?=$row["nome"];?>" required><br><br>

    <label>CPF:</label>
    <input type="text" name="cpf" value="<?=$row["cpf"];?>" required><br><br>

    <input type="hidden" name="id_para_prof_ser_atualizado" value="<?=$id_para_prof_ser_editado;?>">

    <input type="submit" value="Editar Professor">   
</form>
