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
		$especialidade = $medico = $data = $horario = $nome = $telefone = "";

		$especialidade 		= filtraEntrada($_POST["agendamento__especialidade"]);
        $medico 		    = filtraEntrada($_POST["agendamento__medico"]);

        $data		        = strtotime($_POST["agendamento__consulta"]);
        $newformat          = date('Y-m-d',$data);

        $horario 	        = strtotime($_POST["agendamento__horario"]);
        $horarioformat      =  date("H:i:s",$horario);    

        $nome           	= filtraEntrada($_POST["agendamento__nome"]);
        $telefone 	        = filtraEntrada($_POST["agendamento__telefone"]);
    	
    try
	{    
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
		$msgErro = $e->getMessage();
	}
}

?>