<?php
require_once 'db.php';
$conexao = getConexao();

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "SELECT nomemateria, codigo, cpfprofessor FROM materias";

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


while ($row = mysqli_fetch_assoc($resultado)) {
    echo     
    "<tr>
        <td>Nome: " . $row["nomemateria"] . "</td>  
        <td> Código: " . $row["codigo"] . "</td>  
        <td> Professor: " . $row["cpfprofessor"] . "</td>"  . 
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

<hr>

<?php
echo "Total de materias: " . mysqli_num_rows($resultado);


?>