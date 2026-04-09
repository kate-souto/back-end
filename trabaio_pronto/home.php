<?php
require_once 'db.php';
$conexao = getConexao();

if (!$conexao) 
{
    die("Falha na conexão: " . mysqli_connect_error());
}


$query_mat = "SELECT materias.nomemateria, materias.codigo, professor.nome AS nomeprofessor FROM materias LEFT JOIN professor ON materias.cpfprofessor = professor.cpf";

$fmat = $_POST['fmat'] ?? '';

if (isset($_POST['fmatsubmit']))
    {
        $query_mat .= " WHERE materias.nomemateria LIKE '" . $fmat . "%'";
    }



$query_prof = "SELECT nome, cpf FROM professor";

$fprof = $_POST['fprof'] ?? '';

if (isset($_POST['fprofsubmit']))
    {
        $query_prof .= " WHERE professor.nome LIKE '" . $fprof . "%'";
    }

$botaomat = $_GET['botaomat'] ?? '';

$botaoprof = $_GET['botaoprof'] ?? '';

if (($botaoprof == "ordenar") and ($botaomat == ""))
{
    $query_prof .= " ORDER BY professor.nome ASC";
}

if (($botaoprof == "ordenar") and ($botaomat == "ordenar"))
{
    $query_prof .= " ORDER BY professor.nome ASC";
    $query_mat .= " ORDER BY materias.nomemateria ASC";
}

if (($botaomat == "ordenar") and ($botaoprof == ""))
{
    $query_mat .= " ORDER BY materias.nomemateria ASC";
}





$resultado_mat = mysqli_query($conexao, $query_mat);

?>

<link rel="stylesheet" href="estilo.css">

<h1>CADASTROS</h1>
<br>


<table border="1">
    <tr>
        <th>Nome</th>
        <th>Código</th>
        <th>Professor</th>
        <th> Remover </th>
        <th> Editar </th>
    </tr>

<form method="post">
    <p>Buscar Matéria: </p>
    <input type="text" name="fmat">
    <input type="submit" name="fmatsubmit">
</form>
<br>
<?php


while ($row = mysqli_fetch_assoc($resultado_mat)) 
{
    echo     
    "<tr>
        <td>" . $row["nomemateria"] . "</td>
        <td>" . $row["codigo"] . "</td>
        <td>" . $row["nomeprofessor"] . "</td>"  . 
        "<td> 
           
        
            <form action='remover.php' method='POST'>
                <input type='hidden' name='id_para_ser_removido' value='" . $row["codigo"] . "'>
                <input class='submit' type='submit' value='Remover'>
            </form>
            
        
        </td>" .
        
        
        "<td> 
        

            <form action='form_edit.php' method='POST'>
                <input type='hidden' name='id_para_ser_editado' value='" . $row["codigo"] . "'>
                <input class = 'submit' type='submit' value='Editar'>
            </form>


        </td>" .
        
    "</tr>";
}
    
echo "<br>";
?>

</table>

<br>

<?php
echo "Total de materias: " . mysqli_num_rows($resultado_mat);


?>

<br><br>

<a href="inserir.php">Inserir nova materia</a>
<a href="home.php?botaomat=ordenar&botaoprof=<?= $botaoprof?>" > Ordenar Matéria</a>

<br><br>
<hr>












<?php



$resultado_prof = mysqli_query($conexao, $query_prof);

?>

<br>


<table border="1">
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th> Remover </th>
        <th> Editar </th>
    </tr>


<form method="post">
    <p>Buscar Professor: </p>
    <input type="text" name="fprof">
    <input type="submit" name="fprofsubmit">
</form>
<br>
<?php


while ($row = mysqli_fetch_assoc($resultado_prof)) {
    echo     
    "<tr>
        <td>" . $row["nome"] . "</td>
        <td>" . $row["cpf"] . "</td>"  . 
        "<td> 
           
        
            <form action='removerprof.php' method='POST'>
                <input type='hidden' name='id_para_prof_ser_removido' value='" . $row["cpf"] . "'>
                <input class='submit' type='submit' value='Remover'>
            </form>
            
        
        </td>" .
        
        
        "<td> 
        

            <form action='form_editprof.php' method='POST'>
                <input type='hidden' name='id_para_prof_ser_editado' value='" . $row["cpf"] . "'>
                <input class='submit' type='submit' value='Editar'>
            </form>


        </td>" .
        
    "</tr>";
}
echo "<br>";
?>

</table>

<br>

<?php
echo "Total de professores: " . mysqli_num_rows($resultado_prof);

?>

<br><br>

<a href="inserirprof.php">Inserir novo professor</a>
<a href="home.php?botaoprof=ordenar&botaomat=<?= $botaomat?>" >Ordenar Professor</a>