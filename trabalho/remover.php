<?php
    require_once 'db.php';

    $codigo = $_POST["id_para_ser_removido"];

    $conexao = getConexao();

    if (!$conexao) 
    {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $query = "DELETE FROM materias WHERE codigo = $codigo";
    //echo "Query SQL: " . $query . "<br>";

    if (mysqli_query($conexao, $query)) 
    {
        echo "Matéria removida com sucesso!";
    } 
    else 
    {
        echo "Erro ao remover matéria: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header('Location: home.php')

?>
