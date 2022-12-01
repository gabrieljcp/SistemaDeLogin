<?php 
	include("recaptchalib.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body id="login">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 offset-lg-4 mt-5">
				<div class="card-login" id="card">
					<div class="card-body">
						<h5>Acesso Restrito</h5>
						<form action="verificar1.php" method="POST">
							<div class="mb-3">
								<input type="email" name="email" class="form-control" placeholder="E-mail">
							</div>
							<div class="mb-3">
								<input type="password" name="senha" placeholder="Senha" class="form-control">
							</div>
							<div class="mb-3">
								<a href="index3.php">Esqueceu a senha?</a> |
								<a href="cadastrar-login.php" >Cadastrar</a>
							</div>
							<div class="mb-3">
								<button type="submit" name="enviar" class="btn btn-success" onclick="return valida()">Acesso</button>
								
							</div>
							<div class="g-recaptcha" data-sitekey="6LdzuDYiAAAAAIi0WSj7teF1p7O8wufMtf5gKMjW"></div>
							
						</form>				
						<?php

						if(isset($_POST['enviar'])){
							if(!empty($_POST['g-recaptcha-response'])){
								$url = "https://www.google.com/recaptcha/api/siteverify";
                                $secret = "6LdzuDYiAAAAAKyZ2grG84YISZ2jIfiHmV0u6xbM";
								$response = $_POST['g-recaptcha-response'];
								$variaveis = "secret=".$secret."&response".$response;

								$ch = curl_init($url);
								curl_setopt( $ch, CURLOPT_POST, 1);
								curl_setopt( $ch, CURLOPT_POSTFIELDS, $variaveis);
								curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
								curl_setopt( $ch, CURLOPT_HEADER, 0);
								curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
								$resposta = curl_exec($ch);

								$resultado = json_decode($resposta);

								if($resultado->success == 1){
                                     echo "a";
								}
							}
						}
						
						?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
	<script type="text/javascript">
		function valida() {
			if (grecaptcha.getResponse() == "") {
				alert("Você precisa marcar a validação!");
				return false;
			}
		}
	</script>
</body>
</html>