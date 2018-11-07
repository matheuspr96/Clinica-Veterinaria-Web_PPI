<?php
    require "conexaoBanco.php"; 
    class Endereco 
    {
        public $rua;
        public $bairro;
        public $cidade;
        public $estado;
    }

    try
    {
        $msgErro = "";
        $connEnd = conectaMySQL();
        $endereco = $cep = "";
        if (isset($_POST["form__cep"]))
            $cep = $_POST["form__cep"];

        $sql = "
        SELECT Rua, Bairro, Cidade, Estado
        FROM Endereco
        WHERE Cep = ?;
        ";

        if (! $stmt = $connEnd->prepare($sql))
            throw new Exception("Falha na operacao prepare: " . $connEnd->error);

        if (! $stmt->bind_param("s", $cep))
            throw new Exception("Falha na operacao bind_param: " . $stmt->error);

        // Executa a consulta
        if (! $stmt->execute())
            throw new Exception("Falha na operacao execute: " . $stmt->error);

        // Indica as variáveis PHP que receberão os resultados
        $stmt->store_result();
        if (! $stmt->bind_result($rua, $bairro, $cidade, $estado))
            throw new Exception("Falha na operacao bind_result: " . $stmt->error);
        if($stmt->num_rows > 0)   

        $stmt->fetch();
        
        $endereco = new Endereco();

        $endereco->rua    = $rua;
        $endereco->bairro = $bairro;
        $endereco->cidade = $cidade;
        $endereco->estado = $estado;
    
        $jsonStr = json_encode($endereco);
        echo $jsonStr;

    }
    catch (Exception $e)
    {
        $connEnd->close();
        $msgErro = $e->getMessage();
        echo $msgErro;
    }
?>