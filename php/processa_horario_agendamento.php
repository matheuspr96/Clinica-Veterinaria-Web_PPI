<?php
try
{ 
    /*Quando o nome do médico for selecionado pelo usuário, uma requisição AJAX
     deverá buscar no banco de dados todos os horários já agendados para o
      médico na data especificada pelo usuário. */
      
    require "conexaoBanco.php"; 
    $conn = conectaMySQL();
    $msgErro = "";

    $especialidade = $idHora = $hora = "";
    $arrayHora = "";

    $especialidade = $_POST["agendamento__medico"];
    if(isset($especialidade))
        throw new Exception("Falha na operacao especialidade:  " . $especialidade);

    $data		       	= strtotime($_POST["agendamento__consulta"]);
    $formatData       	 = date('Y-m-d',$data);

    if(isset($formatData))
    throw new Exception("Falha na operacao data: " . $formatData);

    $sql = "
        SELECT IDAGENDA, HORA
        FROM   AGENDA
        WHERE  ID_FUNCIONARIO = (?) AND DATAAGENDA = ?;
    ";

// Prepara a consulta
if (! $stmt = $conn->prepare($sql))
    throw new Exception("Falha na operacao prepare: " . $conn->error);

if (! $stmt->bind_param("ss", $especialidade, $formatData))
    throw new Exception("Falha na operacao bind_param: " . $stmt->error);

// Executa a consulta
if (! $stmt->execute())
    throw new Exception("Falha na operacao execute: " . $stmt->error);

// Indica as variáveis PHP que receberão os resultados
if (! $stmt->bind_result($idHora, $hora))
    throw new Exception("Falha na operacao bind_result: " . $stmt->error);   

// Navega pelas linhas do resultado
$horaformartbanco = date();
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
}
    
if ($conn != null)
$conn->close();

?>