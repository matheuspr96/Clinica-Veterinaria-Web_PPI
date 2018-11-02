<?php
require "conexaoBanco.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	try{ 
		$msgErro = "";
		if (!isset($_POST["agendamento__especialidade"]))
			throw new Exception("A especialidade deve ser fornecida");
		if (!isset($_POST["agendamento__medico"]))
			throw new Exception("O médico deve ser informado");
		if (!isset($_POST["agendamento__consulta"]))
			throw new Exception("A data do agendamento deve ser fornecida");
		if (!isset($_POST["agendamento__horario"]))
		 throw new Exception("O horário de atendimento deve ser fornecido");
		if (!isset($_POST["agendamento__nome"]))
		 throw new Exception("O nome deve ser fornecido");
		if (!isset($_POST["agendamento__telefone"]))
		 throw new Exception("O contato deve ser fornecido");

		// Define e inicializa as variáveis
			$especialidade = $medico = $data = $horario = $nome = $telefone = "";

				$especialidade 		= filtraEntrada($_POST["agendamento__especialidade"]);
        $medico 		    	= filtraEntrada($_POST["agendamento__medico"]);

        $data		       		= strtotime($_POST["agendamento__consulta"]);
        $newformat        = date('Y-m-d',$data);

        $horario 	        = strtotime($_POST["agendamento__horario"]);
        $horarioformat    = date("H:i:s",$horario);    

        $nome           	= filtraEntrada($_POST["agendamento__nome"]);
				$telefone 	      = filtraEntrada($_POST["agendamento__telefone"]);
				

		if ($especialidade == "")
			throw new Exception("A especialidade deve ser fornecida");
		if ($medico == "")
			throw new Exception("O médico deve ser informado");
		if ($newformat == "")
			throw new Exception("A data do agendamento deve ser fornecida");
		if ($horarioformat == "")
			throw new Exception("O horário de atendimento deve ser fornecido");
		if ($nome == "")
			throw new Exception("O nome deve ser fornecido");
		if ($telefone == "")
			throw new Exception("O contato deve ser fornecido");
			
			
		$conn = conectaMySQL();

		$sql = "
		  INSERT INTO P_AGENDAMENTO (IDConsulta, Especialidade, Medico, DataAgendamento, Horario, Nome, Telefone)
		   VALUES (null, ?, ?, ?, ?, ?, ?);
		";

    // prepara a declaração SQL (stmt é uma abreviação de statement)
    if (! $stmt = $conn->prepare($sql))
      throw new Exception("Falha na operacao prepare: " . $conn->error);
			
    // Faz a ligação dos parâmetros em aberto com os valores.
    if (! $stmt->bind_param("ssssss", $especialidade, $medico, $newformat, $horarioformat, $nome, $telefone))
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);
		
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);
	
			echo "OK Dados cadastrados";

	}
	catch (Exception $e)
	{
		http_response_code(400); 
		$msgErro = $e->getMessage();
		echo $msgErro;
	}
}

function filtraEntrada($dado) 
{
	$dado = trim($dado);               // remove espaços no inicio e no final da string
	$dado = stripslashes($dado);       // remove contra barras: "cobra d\'agua" vira "cobra d'agua"
	$dado = htmlspecialchars($dado);   // caracteres especiais do HTML (como < e >) são codificados

	return $dado;
}

?>