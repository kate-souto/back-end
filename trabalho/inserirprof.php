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
    <input type="text" name="cpf" required><br><br>

    <input type="submit" value="Inserir professor">   
</form>
</body>
</html>

<br>

<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    $conexao = getConexao();

    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $query = "INSERT INTO professor (nome, cpf) VALUES ('$nome', '$cpf')";
   // echo "Query SQL: " . $query . "<br>";

    if (mysqli_query($conexao, $query)) {
        echo "Professor inserida com sucesso!";
    } else {
        echo "Erro ao inserir professor: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

}

?>

<br>
<a href="home.php">Voltar para Home</a>