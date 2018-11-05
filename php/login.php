<?php 
require "conexaoBanco.php";

if(empty($_POST['login__login']) || empty($_POST['login__senha'])){
    header('Location: index.php');
}

$user = filtraEntrada($_POST['login__login']);
$password = filtraEntrada($_POST['login__senha']);

$conn = conectaMySQL();

$query = "SELECT * FROM LOGIN WHERE `USERNAME` = '$user' AND `PASSWORD` = '$password'";

// prepara a declaração SQL (stmt é uma abreviação de statement)
if (! $stmt = $conn->prepare($sql))
throw new Exception("Falha na operacao prepare: " . $conn->error);
      
// Faz a ligação dos parâmetros em aberto com os valores.
if (! $stmt->bind_param("ssssss", $especialidade, $medico, $newformat, $horarioformat, $nome, $telefone))
throw new Exception("Falha na operacao bind_param: " . $stmt->error);
  
if (! $stmt->execute())
throw new Exception("Falha na operacao execute: " . $stmt->error);

if($stmt == 1){
    header('Location: funcionalidades.php');
    exit();
}else{
    header('Location: index.php');
}


function filtraEntrada($dado) 
{
	$dado = trim($dado);               // remove espaços no inicio e no final da string
	$dado = stripslashes($dado);       // remove contra barras: "cobra d\'agua" vira "cobra d'agua"
	$dado = htmlspecialchars($dado);   // caracteres especiais do HTML (como < e >) são codificados

	return $dado;
}

?>

