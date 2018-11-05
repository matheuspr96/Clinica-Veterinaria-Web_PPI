<?php 
require "conexaoBanco.php";

if(empty($_POST['login__login']) || empty($_POST['login__senha'])){
    header('Location: index.php');
}

$user = filtraEntrada($_POST['login__login']);
$password = filtraEntrada($_POST['login__senha']);

$conn = conectaMySQL();

$query = "SELECT * FROM LOGIN WHERE `USERNAME` = '$user' AND `PASSWORD` = '$password'";

$result = mysqli_query($conn,$query);

$row = mysqli_num_rows($result);

echo $row;
exit();


function filtraEntrada($dado) 
{
	$dado = trim($dado);               // remove espaços no inicio e no final da string
	$dado = stripslashes($dado);       // remove contra barras: "cobra d\'agua" vira "cobra d'agua"
	$dado = htmlspecialchars($dado);   // caracteres especiais do HTML (como < e >) são codificados

	return $dado;
}

?>

