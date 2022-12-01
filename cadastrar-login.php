<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Cadastro</title>
</head>
<body id="cadastro-login">
    
    <h1>Cadastar Usuário</h1>

    <form action="?page=salvar" method="POST" id="form-cadastro">
        <input type="hidden" name="acao" value="cadastrar-login">
        <div class="mb-3" class="input-cadastro" class="form-control">
            <label>Nome:</label>
            <input type="text" name="nome"  class="input-cadastro" class="form-control">
        </div>
        <div class="mb-3">
            <label>E-mail:</label>
            <input type="email" name="email" class="input-cadastro" class="form-control">
        </div>
        <div class="mb-3" class="input-cadastro">
            <label>Senha:</label>
            <input type="password" name="senha" class="input-cadastro" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tipo:</label>
            <select name="tipo" class="input-cadastro" class="form-control">
                <option>-Escolha-</option>
                <option value="1">Administrador</option>
                <option value="2">Usuário Comum</option>
            </select>
        </div>
        <br>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Enviar</button>
            <a href="index.php"  class="button">Voltar ao Login</a>
        </div>
    </form>

</body>
</html>


		