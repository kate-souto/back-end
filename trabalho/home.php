<?php
require_once 'db.php';
$conexao = getConexao();

if (!$conexao) 
{
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "SELECT materias.nomemateria, materias.codigo, professor.nome AS nomeprofessor FROM materias LEFT JOIN professor ON materias.cpfprofessor = professor.cpf";

$resultado = mysqli_query($conexao, $query);

?>



<br>
<a href="inserir.php">Inserir nova materia</a>
<br>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Código</th>
        <th>Professor</th>
        <th> Remover </th>
        <th> Editar </th>
    </tr>



<?php


while ($row = mysqli_fetch_assoc($resultado)) 
{
    echo     
    "<tr>
        <td>" . $row["nomemateria"] . "</td>
        <td>" . $row["codigo"] . "</td>
        <td>" . $row["nomeprofessor"] . "</td>"  . 
        "<td> 
           
        
            <form action='remover.php' method='POST'>
                <input type='hidden' name='id_para_ser_removido' value='" . $row["codigo"] . "'>
                <input type='submit' value='Remover'>
            </form>
            
        
        </td>" .
        
        
        "<td> 
        

            <form action='form_edit.php' method='POST'>
                <input type='hidden' name='id_para_ser_editado' value='" . $row["codigo"] . "'>
                <input type='submit' value='Editar'>
            </form>


        </td>" .
        
    "</tr>";
}
echo "<br>";
?>

</table>

<br>

<?php
echo "Total de materias: " . mysqli_num_rows($resultado);


?>

<br><br>

<a href="index.php?ordem=az">Ordenar A-Z</a>

<br><br>
<hr>












<?php

$query = "SELECT nome, cpf FROM professor";

$resultado = mysqli_query($conexao, $query);

?>

<br>
<a href="inserirprof.php">Inserir novo professor</a>
<br>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th> Remover </th>
        <th> Editar </th>
    </tr>



<?php


while ($row = mysqli_fetch_assoc($resultado)) {
    echo     
    "<tr>
        <td>" . $row["nome"] . "</td>
        <td>" . $row["cpf"] . "</td>"  . 
        "<td> 
           
        
            <form action='removerprof.php' method='POST'>
                <input type='hidden' name='id_para_prof_ser_removido' value='" . $row["cpf"] . "'>
                <input type='submit' value='Remover'>
            </form>
            
        
        </td>" .
        
        
        "<td> 
        

            <form action='form_editprof.php' method='POST'>
                <input type='hidden' name='id_para_prof_ser_editado' value='" . $row["cpf"] . "'>
                <input type='submit' value='Editar'>
            </form>


        </td>" .
        
    "</tr>";
}
echo "<br>";
?>

</table>

<br>

<?php
echo "Total de professores: " . mysqli_num_rows($resultado);


?>