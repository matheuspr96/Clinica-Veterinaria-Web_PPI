<?php

    class Endereco 
    {
    public $rua;
    public $bairro;
    public $cidade;
    }

    try
    {
        $msgErro = "";
        //require "conexaoBanco.php"; 
        $conn = conectaMySQL();
        $endereco = $cep = "";
        if (isset($_GET["cep"]))
        $cep = $_GET["cep"];

        $SQL = "
        SELECT Rua, Bairro, Cidade
        FROM Endereco
        WHERE Cep = ?;
        ";

        if (! $stmt = $conn->prepare($SQL))
            throw new Exception("Falha na operacao prepare: " . $conn->error);

        if (! $stmt->bind_param("s", $cep))
            throw new Exception("Falha na operacao bind_param: " . $stmt->error);

        // Executa a consulta
        if (! $stmt->execute())
            throw new Exception("Falha na operacao execute: " . $stmt->error);

        // Indica as variáveis PHP que receberão os resultados
        if (! $stmt->bind_result($rua, $bairro, $cidade))
            throw new Exception("Falha na operacao bind_result: " . $stmt->error);  
        

            $endereco = new Endereco();

            $endereco->rua    = $rua;
            $endereco->bairro = $bairro;
            $endereco->cidade = $cidade;
    
        $jsonStr = json_encode($endereco);
        echo $jsonStr;

    }
    catch (Exception $e)
    {
    $msgErro = $e->getMessage();
    }
    if ($conn != null)
    $conn->close();

?>