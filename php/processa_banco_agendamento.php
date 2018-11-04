<?php
    
    class veterinarioNome
    {
        public $idvet;
        public $nomevet;
    }


    try
    { 
        require "conexaoBanco.php"; 
        $conn = conectaMySQL();
        $msgErro = "";

        $especialidade = $medico = $idmedico = "";
        $arrayVeterinario = "";
        if (isset($_POST["agendamento__especialidade"]))
        $especialidade = $_POST["agendamento__especialidade"];


		$sql = "
	        SELECT IDFUNCIONARIO, NOME
            FROM FUNCIONARIO
            WHERE ESPECIALIDADE = (?)
		";

    // Prepara a consulta
    if (! $stmt = $conn->prepare($sql))
        throw new Exception("Falha na operacao prepare: " . $conn->error);

    if (! $stmt->bind_param("s", $especialidade))
        throw new Exception("Falha na operacao bind_param: " . $stmt->error);

    // Executa a consulta
    if (! $stmt->execute())
        throw new Exception("Falha na operacao execute: " . $stmt->error);

    // Indica as variáveis PHP que receberão os resultados
    if (! $stmt->bind_result($idmedico, $medico))
        throw new Exception("Falha na operacao bind_result: " . $stmt->error);   

    // Navega pelas linhas do resultado
    while ($stmt->fetch())
    {
        $veterinario = new veterinarioNome();

        $veterinario->idvet        = $idmedico;
        $veterinario->nomevet      = $medico;
     
        $arrayVeterinario[] = $veterinario;
    }
        
    $jsonStr = json_encode($arrayVeterinario);
    echo $jsonStr;
        
    }
    catch (Exception $e)
    {
        $msgErro = $e->getMessage();
    }
        
        
    if ($conn != null)
    $conn->close();

?>