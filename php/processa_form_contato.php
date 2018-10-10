<?php
require "conexaoBanco.php";

function filtraEntrada($dado) 
{
	$dado = trim($dado);               // remove espaços no inicio e no final da string
	$dado = stripslashes($dado);       // remove contra barras: "cobra d\'agua" vira "cobra d'agua"
	$dado = htmlspecialchars($dado);   // caracteres especiais do HTML (como < e >) são codificados

	return $dado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$msgErro = "";

    	// Define e inicializa as variáveis
    	$nome, $email, $motivo, $mensagem = "";

    	$nome  = filtraEntrada($_POST["contato__nome"]);
    	$email = filtraEntrada($_POST["contato__email"]);
    	$motivo = filtraEntrada($_POST["motivo"]);
    	$mensagem = filtraEntrada($_POST["contato__mensagem"]);
    
    try
	{    
		// Função definida no arquivo conexaoMysql.php
		$conn = conectaMySQL();

		$sql = "
		  INSERT INTO P_CONTATO (IDContato, Nome, Email, Motivo, Mensagem)
		  VALUES (null, '$nome', '$email', '$motivo', '$mensagem');
		";

		if (! $conn->query($sql))
		  throw new Exception("Falha na inserção dos dados: " . $conn->error);

	}
	catch (Exception $e)
	{
		$msgErro = $e->getMessage();
	}
}
  
?>
