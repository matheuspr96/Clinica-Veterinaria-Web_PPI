<?php

class Contato 
{
    public $id;
    public $nome;
    public $email;
    public $motivo;
    public $mensagem;
}

function getContato($conn)
{
  $arrayContato = "";
  
  $SQL = "
    SELECT IDContato, Nome, Email, Motivo, Mensagem
    FROM P_CONTATO
  ";
  
  // Prepara a consulta
  if (! $stmt = $conn->prepare($SQL))
    throw new Exception("Falha na operacao prepare: " . $conn->error);
      
  // Executa a consulta
  if (! $stmt->execute())
    throw new Exception("Falha na operacao execute: " . $stmt->error);

  // Indica as variáveis PHP que receberão os resultados
  if (! $stmt->bind_result($id, $nome, $email, $motivo, $mensagem))
    throw new Exception("Falha na operacao bind_result: " . $stmt->error);    
  
  // Navega pelas linhas do resultado
  while ($stmt->fetch())
  {
    $contato = new Contato();
    
    $contato->id            = $id;
    $contato->nome          = $nome;
    $contato->email         = $email;
    $contato->motivo        = $motivo;
    $contato->mensagem      = $mensagem;

    $arrayContato[] = $contato;
  }
  
  
  return $arrayContato;
}

///////////////////////////////////////////////////////////////////////////
// Código principal PHP
///////////////////////////////////////////////////////////////////////////
$arrayContato = "";
$msgErro = "";

try
{
  $conn = conectaMySQL();
  $arrayContato = getContato($conn);  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}

?>