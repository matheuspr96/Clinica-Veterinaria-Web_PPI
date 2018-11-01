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
		$nome = $email = $motivo = $mensagem = "";

		$nome 		= filtraEntrada($_POST["contato__nome"]);
		$email 		= filtraEntrada($_POST["contato__email"]);
		$motivo		= filtraEntrada($_POST["contato__motivo"]);
		$mensagem 	= filtraEntrada($_POST["contato__mensagem"]);
    	
    try
	{    
		$conn = conectaMySQL();

		$sql = "
		  INSERT INTO P_CONTATO (IDContato, Nome, Email, Motivo, Mensagem)
		   VALUES (null, ?, ?, ?, ?);
		";

    // prepara a declaração SQL (stmt é uma abreviação de statement)
    if (! $stmt = $conn->prepare($sql))
      throw new Exception("Falha na operacao prepare: " . $conn->error);
			
    // Faz a ligação dos parâmetros em aberto com os valores.
    if (! $stmt->bind_param("ssss", $nome, $email, $motivo, $mensagem))
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);
		
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);
	
			echo "OK Dados cadastrados";
	
	}
	catch (Exception $e)
	{
		$msgErro = $e->getMessage();
	}
}

?>