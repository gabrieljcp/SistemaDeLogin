<?php

include("config.php");
    
    $email = $conn->escape_string($_POST['email']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "E-mail inválido.";
    }

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $conn->query($sql_code) or die($conn->error);
    $USER = $sql_query->fetch_assoc();
    $quantidade = $sql_query->num_rows;
	$from     = $_POST['email']; //remetente
	$to       = "gabrieljcp@outlook.com"; //destinatário, elielkruz@gmail.com
	$subject  = 'Sua nova senha temporaria';	
	$message  = 'Sua nova senha temporaria: ';

	$headers  = 'MIME-Version: 1.0';
	$headers .= 'Content-type: text/html; charset=iso-8859-1';
	$headers .= 'From: ' . $from . "\r\n" .
			    'Reply-To: ' . $from . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

    if($quantidade == 0)
        echo "O E-mail informado não existe no banco de dados.";

    if($quantidade != 0){

        $novaSenha = substr(md5(time()), 0, 6);    

        if(mail($email, $subject , $message. $novaSenha. ". Favor alterar no primeiro acesso, clicando em -Listar Usuarios-, e clicando no botao para alterar senha.", $headers)){

            $sql_code = "UPDATE usuarios SET senha = '$novaSenha' WHERE email = '$email'";
            $sql_query = $conn->query($sql_code) or die($conn->error);

            if($sql_query)
                print "Email enviado com Sucesso!";
				print "<a href=index.php class=button>Voltar ao Login</a>";	
        }
    }    

?>