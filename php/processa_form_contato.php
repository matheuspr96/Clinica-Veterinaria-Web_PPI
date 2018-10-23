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
<<<<<<< HEAD
	{
		$msgErro = "";

		// Define e inicializa as variáveis
		$nome = $email = $motivo = $mensagem = "";

		$nome 		= filtraEntrada($_POST["contato__nome"]);
		$email 		= filtraEntrada($_POST["contato__email"]);
		$motivo		= filtraEntrada($_POST["contato__motivo[]"]);
		$mensagem = filtraEntrada($_POST["contato__mensagem"]);
    	
    try
	{    
	// Função definida no arquivo conexaoMysql.php
=======
<<<<<<< HEAD
	{
		$msgErro = "";

    	// Define e inicializa as variáveis
    	$nome, $email, $motivo, $mensagem = "";

    	$nome  = filtraEntrada($_POST["contato__nome"]);
    	$email = filtraEntrada($_POST["contato__email"]);
    	$motivo = filtraEntrada($_POST["motivo"]);
    	$mensagem = filtraEntrada($_POST["contato__mensagem"]);
=======
{
	$msgErro = "";

    // Define e inicializa as variáveis
    $nome, $email, $motivo, $mensagem = "";

    $nome  = filtraEntrada($_POST["contato__nome"]);
    $email = filtraEntrada($_POST["contato__email"]);
    $motivo = filtraEntrada($_POST["motivo"]);
    $mensagem = filtraEntrada($_POST["contato__mensagem"]);
>>>>>>> a34ad31faedd110db9a61378a0f09b7d371feba0
    
    try
	{    
		// Função definida no arquivo conexaoMysql.php
>>>>>>> d279b76fb91a71851119f0d1e649f54d662c74df
		$conn = conectaMySQL();

		$sql = "
		  INSERT INTO P_CONTATO (IDContato, Nome, Email, Motivo, Mensagem)
<<<<<<< HEAD
		   VALUES (null, ?, ?, null, ?);
		";

    // prepara a declaração SQL (stmt é uma abreviação de statement)
    if (! $stmt = $conn->prepare($sql))
      throw new Exception("Falha na operacao prepare: " . $conn->error);
			
    // Faz a ligação dos parâmetros em aberto com os valores.
    if (! $stmt->bind_param("sss", $nome, $email, $mensagem))
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);
		
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);
	
	  
	$formProcSucesso = true;
	
	}
		catch (Exception $e)
	{
	$msgErro = $e->getMessage();
	}
}

	

  
?>
=======
		  VALUES (null, '$nome', '$email', '$motivo', '$mensagem');
		";

		if (! $conn->query($sql))
		  throw new Exception("Falha na inserção dos dados: " . $conn->error);
<<<<<<< HEAD

=======
>>>>>>> a34ad31faedd110db9a61378a0f09b7d371feba0
	}
	catch (Exception $e)
	{
		$msgErro = $e->getMessage();
	}
}
  
?>
<<<<<<< HEAD
=======

    


?>
>>>>>>> a34ad31faedd110db9a61378a0f09b7d371feba0
>>>>>>> d279b76fb91a71851119f0d1e649f54d662c74df
