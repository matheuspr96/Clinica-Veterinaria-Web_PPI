<?php
try
{ 
    /*Quando o nome do médico for selecionado pelo usuário, uma requisição AJAX
     deverá buscar no banco de dados todos os horários já agendados para o
      médico na data especificada pelo usuário. */
      
    require "conexaoBanco.php"; 
    $conn = conectaMySQL();
    $msgErro = "";

    $medico = $idHora = $hora = "";
    $arrayHora = [];

    $medico = $_POST["agendamento__medico"];

    $data		       	= strtotime($_POST["agendamento__consulta"]);
    if(($data) < strtotime(date("Y-m-d")))
    throw new Exception("O data agendamento deve ser no futuro");
    $formatData       	 = date('Y-m-d',$data);

    $sql = "
        SELECT IDAGENDA, HORA
        FROM   AGENDA
        WHERE  ID_FUNCIONARIO = (?) AND DATAAGENDA = ?;
    ";

// Prepara a consulta
if (! $stmt = $conn->prepare($sql))
    throw new Exception("Falha na operacao prepare: " . $conn->error);

if (! $stmt->bind_param("ss", $medico, $formatData))
    throw new Exception("Falha na operacao bind_param: " . $stmt->error);

// Executa a consulta
if (! $stmt->execute())
    throw new Exception("Falha na operacao execute: " . $stmt->error);

// Indica as variáveis PHP que receberão os resultados
if (! $stmt->bind_result($idHora, $hora))
    throw new Exception("Falha na operacao bind_result: " . $stmt->error);   

// Navega pelas linhas do resultado

while ($stmt->fetch())
{
    $arrayHora[] = $hora;
}
    
$jsonStr = json_encode($arrayHora);
echo $jsonStr;
    
}
catch (Exception $e)
{
    
    $msgErro = $e->getMessage();
    echo $msgErro;
}
    
if ($conn != null)
$conn->close();

?>