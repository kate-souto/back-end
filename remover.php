<?php
    require_once 'db.php';

    $id = $_POST["id_para_ser_removido"];

    $conexao = getConexao();

    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $query = "DELETE FROM my_table WHERE id = $id";
    //echo "Query SQL: " . $query . "<br>";

    if (mysqli_query($conexao, $query)) {
        echo "Produto removido com sucesso!";
    } else {
        echo "Erro ao remover produto: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header('Location: home.php')

?>
