<?php
    define("HOST", "fdb22.awardspace.net"); 
    define("USER", "2837288_testebd");
    define("PASSWORD", "m32137552"); 
    define("DATABASE", "2837288_testebd");

    function conectaMySQL(){
        $conexao = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if($conexao->conect_error)
        throw new Exception('Falha na cominicação com o MySQL'.$conexao->connect_error);
        return $conexao;
    }
?>