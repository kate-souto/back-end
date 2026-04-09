<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<body>

<form action="inserirprof.php" method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" required><br><br>

    <label>CPF:</label>
    <input type="number" name="cpf" required><br><br>

    <input type="submit" value="Inserir professor">   
</form>
</body>
</html>

<br>

<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    $conexao = getConexao();

    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }


    $query_cpf_existe = "SELECT cpf FROM professor WHERE cpf = '$cpf'";
    $resultado = mysqli_query($conexao, $query_cpf_existe);

    if ((mysqli_num_rows($resultado) > 0) or (strlen($cpf) != 11))
    {
        if (mysqli_num_rows($resultado) > 0) 
        {
            echo "Já há um professor com este CPF";
        }  
        else
        {
            echo "CPF inválido";
        } 
    } 
    else 
    {
        $query = "INSERT INTO professor (nome, cpf) VALUES ('$nome', '$cpf')";
        

        if (mysqli_query($conexao, $query)) {
            echo "Professor inserido com sucesso!";
        } else {
            echo "Erro ao inserir professor: " . mysqli_error($conexao);
        }
    }

    mysqli_close($conexao);

}

?>

<br>
<br>
<a href="home.php">Voltar para Home</a>