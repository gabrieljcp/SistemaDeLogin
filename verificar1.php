<?php

include("config.php");

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        echo "Preencha seu e-mail";
    } else if(strlen($_POST ['senha']) == 0){
        echo "Preencha sua senha";
    } else {
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: ".$conn->error);
        
        $quantidade = $sql_query->num_rows;

        if($quantidade >= 1) {
            $USER = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
            
            $_SESSION['id'] = $USER['id'];
            $_SESSION['nome'] = $USER['nome'];

            //header("Location: index2.php");
            print "<script>location.href='index2.php';</script>";

        } else{
		print "<script>alert('Usuário e/ou Senho incorretos');</script>";
		print "<script>location.href='index.php';</script>";
	    }
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        
       
        <form method="POST" action="">
            <p><input type="text" placeholder="E-mail" name="email" value=""></p>
            <p><input type="password" name="senha"></p>
            <p><a href="esqueceuSenha.php">Esqueceu sua senha? </a></p>
            <p><input type="submit" value="Entrar"></p>
        </form>
    </body>
</html>