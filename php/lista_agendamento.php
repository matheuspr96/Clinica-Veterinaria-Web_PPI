<?php 
class Agenda{
    public $nome;
    public $especialidade;
    public $hora;
    public $data;
    public $contato;
}

function getAgenda($conn){
    $arrayAgenda = [];
    
    $sql = "
        SELECT  F.NOME, F.ESPECIALIDADE, A.HORA, A.DATAAGENDA, P.TELEFONE      
        FROM AGENDA A
        INNER JOIN FUNCIONARIO F
        ON F.IDFUNCIONARIO = A.ID_FUNCIONARIO
        INNER JOIN PACIENTE P 
        ON P.IDPACIENTE = A.ID_PACIENTE
        ORDER BY F.NOME , A.DATAAGENDA ;
            ";

    if (! $stmt = $conn->prepare($SQL))
      throw new Exception("Falha na operacao prepare: " . $conn->error);
        
    // Executa a consulta
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);

    // Indica as variáveis PHP que receberão os resultados
    if (! $stmt->bind_result($especilidade, $hora, $data, $contato))
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