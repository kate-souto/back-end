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
    <input type="text" name="nomemateria" required><br><br>

    <label>CPF do professor:</label>
    <input type="number" name="cpfprofessor" required><br><br>

    <input type="submit" value="Inserir Matéria">   
</form>
</body>
</html>

<br>

<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $nomemateria = $_POST["nomemateria"];
    $cpfprofessor = $_POST["cpfprofessor"];

    $conexao = getConexao();

    if (!$conexao) 
    {
        die("Falha na conexão: " . mysqli_connect_error());
    }


    $query_prof_existe = "SELECT cpf FROM professor WHERE cpf = '$cpfprofessor'";
    $resultado = mysqli_query($conexao, $query_prof_existe);


    if (mysqli_num_rows($resultado) > 0) 
    {
        $query = "INSERT INTO materias (nomemateria, cpfprofessor) VALUES ('$nomemateria', '$cpfprofessor')";
    

        if (mysqli_query($conexao, $query)) 
        {
            echo "Matéria inserida com sucesso!";
        } 
        else 
        {
            echo "Erro ao inserir matéria: " . mysqli_error($conexao);
        }
    }
    else
    {
        echo "Professor não encontrado";
    }

    mysqli_close($conexao);

}

?>

<br>
<br>
<a href="home.php">Voltar para Home</a>