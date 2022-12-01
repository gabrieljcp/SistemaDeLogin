<h1>Alterar Senha Temporária</h1>
<?php
	$sql = "SELECT * FROM usuarios WHERE id=".$_REQUEST['id'];

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>
<form action="?page=salvar" method="POST">
	<input type="hidden" name="acao" value="alterarSenha">
	<input type="hidden" name="id" value="<?php print $row->id; ?>">
	<div class="mb-3">
		<label>Senha</label>
		<input type="text" name="senha" value="<?php print $row->senha; ?>" class="form-control">
	</div>	
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>