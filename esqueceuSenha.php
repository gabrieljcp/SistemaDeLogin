<?php

include("config.php");

if(isset($_POST["ok"])){

    
    $email = $conn->escape_string($_POST['email']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "E-mail inválido.";
    }

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $conn->query($sql_code) or die($conn->error);
    $USER = $sql_query->fetch_assoc();
    $quantidade = $sql_query->num_rows;

    if($quantidade == 0)
        echo "O E-mail informado não existe no banco de dados.";

    if($quantidade != 0){

        $novaSenha = substr(md5(time()), 0, 6);
        $nscriptografada = md5(md5($novaSenha));

        if(1 == 1){

            $sql_code = "UPDATE usuarios SET senha = '$nscriptografada' WHERE email = '$email'";
            $sql_query = $conn->query($sql_code) or die($conn->error);

            if($sql_query)
                echo "Senha Alterada com Sucesso!";
        }
    }    
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recuperar senha</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    
    <form action="" method="POST">
        <input type="text" placeholder="Seu email" name="email" value="<?php echo @$_POST['email']; ?>">
        <input name="ok" value="ok" type="submit">
        <a href="index.php"  class="button">Voltar ao Login</a>
    </form>
</body>
</html>