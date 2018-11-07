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
	try
	{  

        
		$msgErro = "";
		if (!isset($_POST["funcionario__nome"]))
			throw new Exception("O nome do funcionário deve ser fornecido");
		if (!isset($_POST["funcionario__data"]))
			throw new Exception("A data de nascimento do funcionario deve ser fornecida");
		if (!isset($_POST["funcionario__sexo"]))
            throw new Exception("O sexo do funcionario deve ser fornecido");
        if (!isset($_POST["estado__civil"]))
			throw new Exception("O estado civil deve ser fornecido");
        if (!isset($_POST["esp__medica"]))
            throw new Exception("A especialidade deve ser fornecida");

        if (!isset($_POST["form__cpf"]))
            throw new Exception("O CPF do funcionario deve ser fornecido");
        if (!isset($_POST["form__rg"]))
            throw new Exception("O RG deve ser fornecido");
        if (!isset($_POST["form__titulo-eleitor"]))
            throw new Exception("O titulo de eleitor deve ser fornecido");

        if (!isset($_POST["form__cep"]))
            throw new Exception("O CEP do funcionario deve ser fornecido");
        if (!isset($_POST["tipo__logradouro"]))
            throw new Exception("O tipo lougradoro deve ser fornecido");
        if (!isset($_POST["logradouro"]))
            throw new Exception("O lougradoro deve ser fornecido");
        if (!isset($_POST["numero"]))
            throw new Exception("O numero da residência deve ser fornecido");
        if (!isset($_POST["complemento"]))
            throw new Exception("O complemento deve ser fornecido");
        if (!isset($_POST["bairro"]))
            throw new Exception("O bairro deve ser fornecido");
        if (!isset($_POST["cidade"]))
            throw new Exception("O cidade deve ser fornecida");
         if (!isset($_POST["estado"]))
			throw new Exception("O estado deve ser fornecido");

		// Define e inicializa as variáveis
		$nome = $nascimento = $sexo = $especialidade = $especialidade = "";
		$nome 			= filtraEntrada($_POST["funcionario__nome"]);
        $nascimento 	= strtotime($_POST["funcionario__data"]);
        $newformat       = date('Y-m-d',$nascimento);
		$sexo		    = filtraEntrada($_POST["funcionario__sexo"]);
        $estadocivil	= filtraEntrada($_POST["estado__civil"]);
        $especialidade	= filtraEntrada($_POST["esp__medica"]);

        $cpf =  $rg	= $titulo = "";
        $cpf	        = filtraEntrada($_POST["form__cpf"]);
        $rg	            = filtraEntrada($_POST["form__rg"]);
        $titulo	        = filtraEntrada($_POST["form__titulo-eleitor"]);

        $cep	        = filtraEntrada($_POST["form__cep"]);
        $tlogradouro	= filtraEntrada($_POST["tipo__logradouro"]);
        $logradouro	    = filtraEntrada($_POST["logradouro"]);
        $numero	        = filtraEntrada($_POST["numero"]);
        $complemento	= filtraEntrada($_POST["complemento"]);
        $bairro	        = filtraEntrada($_POST["bairro"]);
        $cidade	        = filtraEntrada($_POST["cidade"]);
        $estado	        = filtraEntrada($_POST["estado"]);	

        if ($nome == "")
            throw new Exception("O nome deve ser fornecido");
        if ($nascimento == "")
            throw new Exception("A data de nascimento do funcionario deve ser fornecida");
        if(strtotime($nascimento) >= strtotime(date("Y-m-d")))
            throw new Exception("O nascimento deve ser no passado");
        if ($sexo == "")
            throw new Exception("O sexo do funcionario deve ser fornecido");
        if ($estadocivil == "")
            throw new Exception("O estado civil deve ser fornecido");
        if ($especialidade == "")
            throw new Exception("A especialidade deve ser fornecida");

        if ($cpf == "")
            throw new Exception("O CPF do funcionario deve ser fornecido");
        if ($tlogradouro == "")
            throw new Exception("O tipo lougradoro deve ser fornecido");
        if ($logradouro == "")
            throw new Exception("O tipo lougradoro deve ser fornecido");

        if ($numero == "")
            throw new Exception("O numero da residência deve ser fornecido");
        if ($complemento == "")
            throw new Exception("O complemento deve ser fornecido");
        if ($bairro == "")
            throw new Exception("O bairro deve ser fornecido");
        if ($cidade == "")
            throw new Exception("O cidade deve ser fornecida");
        if ($estado == "")
            throw new Exception("O estado deve ser fornecido");

    
        $conn = conectaMySQL();
        $conn->begin_transaction();


		$sql = "
            INSERT INTO FUNCIONARIO (IDFUNCIONARIO, NOME, NASCIMENTO, SEXO, ESTADOCIVIL, ESPECIALIDADE,
                                    CPF, RG, TITULO)
            VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);
           
        ";

    // prepara a declaração SQL (stmt é uma abreviação de statement)
    if (! $stmt = $conn->prepare($sql))
      throw new Exception("Falha na operacao prepare: " . $conn->error);
			
    // Faz a ligação dos parâmetros em aberto com os valores.
    if (! $stmt->bind_param("ssssssss",
    $nome, $newformat, $sexo, $estadocivil, $especialidade,
    $cpf, $rg, $titulo))
  
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);
		
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);
        $stmt->close();
    
    $sql2 = "
        INSERT INTO ENDERECO (IDENDERECO, CEP, TIPOLOUGRADORO, RUA_LOUGRADORO, NUMERO,
            COMPLEMENTO, BAIRRO, CIDADE, ESTADO, ID_FUNCIONARIO)
        VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    ";
        // prepara a declaração SQL (stmt é uma abreviação de statement)
    if (! $stmt2 = $conn->prepare($sql2))
        throw new Exception("Falha na operacao prepare: " . $conn->error);
              
      // Faz a ligação dos parâmetros em aberto com os valores.
    if (! $stmt2->bind_param("sssissssi",
      $cep, $tlogradouro, $logradouro, $numero, $complemento, 
      $bairro, $cidade, $estado, mysqli_insert_id($conn)))
        throw new Exception("Falha na operacao bind_param: " . $stmt2->error);
          
      if (! $stmt2->execute())
        throw new Exception("Falha na operacao execute: " . $stmt2->error);

        $conn->commit();
        echo "OK Dados cadastrados";
    }
	catch (Exception $e)
	{
        $conn->rollback();
		http_response_code(400); 
        $msgErro = $e->getMessage();
		echo $msgErro;
    }
}

?>