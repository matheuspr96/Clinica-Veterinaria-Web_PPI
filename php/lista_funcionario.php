<?php

class Funcionario
{
    public $idfun;
    public $nome;
    public $sexo;
    public $cargo;
    public $rg;
    public $idend;
    public $lougradoro;
    public $bairro;
    public $cidade;
}
function getFuncionarios($connfun)
{
    $arrayFuncionarios = "";

    $sql = "
        SELECT F.IDFUNCIONARIO, F.NOME, F.SEXO, F.ESPECIALIDADE, F.RG,
               E.IDENDERECO, E.RUA_LOUGRADORO, E.BAIRRO, E.CIDADE
        FROM FUNCIONARIO F
        INNER JOIN ENDERECO E
        ON F.IDFUNCIONARIO = E.ID_FUNCIONARIO
    ";

    // Prepara a consulta
    if (! $stmt = $connfun->prepare($sql))
        throw new Exception("Falha na operacao prepare: " . $connfun->error);

    // Executa a consulta
    if (! $stmt->execute())
        throw new Exception("Falha na operacao execute: " . $stmt->error);

    // Indica as variáveis PHP que receberão os resultados
    if (! $stmt->bind_result($idfun, $nome, $sexo, $cargo, $rg, $idend, $lougradoro, $bairro, $cidade))
        throw new Exception("Falha na operacao bind_result: " . $stmt->error);   

    // Navega pelas linhas do resultado
    while ($stmt->fetch())
    {
        $funcionario = new Funcionario();

        $funcionario->idfun            = $idfun;
        $funcionario->nome             = $nome;
        $funcionario->sexo             = $sexo;
        $funcionario->cargo            = $cargo;
        $funcionario->rg               = $rg;
        $funcionario->idend            = $idend;
        $funcionario->lougradoro       = $lougradoro;
        $funcionario->bairro           = $bairro;
        $funcionario->cidade           = $cidade;
        

        $arrayFuncionarios[] = $funcionario;
    }

    return $arrayFuncionarios;
}
///////////////////////////////////////////////////////////////////////////
// Código principal PHP
///////////////////////////////////////////////////////////////////////////
$arrayFuncionarios = "";
$msgErro = "";

try
{
  $connfun = conectaMySQL();
  $arrayFuncionarios = getFuncionarios($connfun);  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}


?>
