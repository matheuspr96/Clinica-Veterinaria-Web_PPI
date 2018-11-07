<?php 
class Agenda{
    public $nome;
    public $especialidade;
    public $hora;
    public $data;
    public $nomePac;
    public $contato;
}

function getAgenda($connag)
{
    $arrayAgenda = [];
    
    $sql = "
        SELECT  F.NOME, F.ESPECIALIDADE, A.HORA, A.DATAAGENDA, P.NOME, P.TELEFONE      
        FROM AGENDA A
        INNER JOIN FUNCIONARIO F
        ON F.IDFUNCIONARIO = A.ID_FUNCIONARIO
        INNER JOIN PACIENTE P 
        ON P.IDPACIENTE = A.ID_PACIENTE
        ORDER BY F.NOME , A.DATAAGENDA ;
            ";

    if (! $stmt = $connag->prepare($sql))
      throw new Exception("Falha na operacao prepare: " . $connag->error);
        
    // Executa a consulta
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);

    // Indica as variáveis PHP que receberão os resultados
    if (! $stmt->bind_result($nome, $especialidade, $hora, $data, $nomePac, $contato))
      throw new Exception("Falha na operacao bind_result: " . $stmt->error);    
  


    // Navega pelas linhas do resultado
    while ($stmt->fetch())
    {
        $agenda = new Agenda();
        
        $agenda->nome            = $nome;
        $agenda->hora            = $hora;
        $agenda->data            = $data;
        $agenda->contato         = $contato;
        $agenda->nomePac         = $nomePac;
        $agenda->especialidade   = $especialidade;

        $arrayAgenda[] = $agenda;
      
    }
    
    return $arrayAgenda;
  }
try
{
  $connag = conectaMySQL();
  $arrayAgenda = getAgenda($connag);  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}
?>