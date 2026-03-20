<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<body>

<form action="inserir.php" method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" required><br><br>

    <label>Professor:</label>
    <input type="text" name="professor" required><br><br>

    <input type="submit" value="Inserir Matéria">   
</form>
</body>
</html>

<br>

<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $professor = $_POST["professor"];

    $conexao = getConexao();

    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $query = "INSERT INTO my_table (nome, professor) VALUES ('$nome', '$professor')";
   // echo "Query SQL: " . $query . "<br>";

    if (mysqli_query($conexao, $query)) {
        echo "Matéria inserida com sucesso!";
    } else {
        echo "Erro ao inserir matéria: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

}

?>

<br>
<a href="home.php">Voltar para Home</a>