<?php 
class Agenda{
    public $especialidade;
    public $hora;
    public $data;
    public $contato;
}

function getAgenda($conn){
    $arrayAgenda = [];
    
    $sql = "";

    if (! $stmt = $conn->prepare($SQL))
      throw new Exception("Falha na operacao prepare: " . $conn->error);
        
    // Executa a consulta
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);

    // Indica as variáveis PHP que receberão os resultados
    if (! $stmt->bind_result($especilidade, $hora, $data, $conato))
      throw new Exception("Falha na operacao bind_result: " . $stmt->error);    
    
    // Navega pelas linhas do resultado
    while ($stmt->fetch())
    {
        $agenda = new Agenda();
        
        $agenda->especialidade = $especialidade;
        $agenda->hora = $hora;
        $agenda->data = $data;
        $agenda->contato = $contato;

        $arrayAgenda[] = $agenda;
      
    }
    
    
    return $arrayAgenda;
  }
}

$arrayContato = [];
$msgErro;

try
{
  $conn = conectaMySQL();
  $arrayAgenda = getAgenda($conn);  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}
?>