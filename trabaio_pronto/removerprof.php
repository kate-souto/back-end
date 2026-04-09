<?php
    require_once 'db.php';

    $cpf = $_POST["id_para_prof_ser_removido"];

    $conexao = getConexao();

    if (!$conexao) 
    {
        die("Falha na conexão: " . mysqli_connect_error());
    }


    mysqli_query($conexao, "DELETE FROM materias WHERE cpfprofessor = '$cpf'");
    $query = "DELETE FROM professor WHERE cpf = '$cpf'";

    if (mysqli_query($conexao, $query)) 
    {
        echo "Professor removido com sucesso!";
    } 
    else 
    {
        echo "Erro ao remover professor: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header('Location: home.php')

?>
