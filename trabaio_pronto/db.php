<?php
 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'mysqluser');
define('DB_NAME', 'bancoteste');
 
function getConexao() 
{
    $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
    if (!$conexao) 
    {
        die("Falha na conexão: " . mysqli_connect_error());
    }
 
    return $conexao;
}
 