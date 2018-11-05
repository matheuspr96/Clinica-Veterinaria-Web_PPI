<?php 
    require "conexaoBanco.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            $msgErro = "";
            $user = isset($_POST["login__login"]) ? (trim($_POST["login__login"])) : FALSE;
            $password = isset($_POST["login__senha"])  ? (trim($_POST["login__senha"])) : FALSE;

            if(!$user || !$password){
                echo "Voce deve digitar sua senha e login";
                exit();
            }
            
            $conn = conectaMySQL();
            $sql = "
                    SELECT * 
                    FROM LOGIN
                    WHERE `USERNAME` = '$user' AND `PASSWORD` = '$password'
                    ";

            $result = mysqli_query($conn,$sql);
	        if (! $result)
		        throw new Exception('Ocorreu uma falha ao gerar o relatorio de testes: ' . $conn->error);

            if($result->num_rows > 0){
                    header('Location:http://zikapet.atwebpages.com/funcionalidades.php');
            }else{
                    header('Location:http://zikapet.atwebpages.com/index.php');
            }
            
        }
        catch(Exception $e){
            http_response_code(400); 
		    $msgErro = $e->getMessage();
		    echo $msgErro;  
        }



    }

?>

