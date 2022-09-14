<?php 
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$sql = "INSERT INTO usuarios
						(nome, email, senha, tipo, status)
					VALUES 
						('".$_POST['nome']."',
						'".$_POST['email']."',
						'".$_POST['senha']."',
						'".$_POST['tipo']."',	
						'1')";
			$res = $conn->query($sql);
			if ($res==true) {
				print "<script>alert('Cadastrou com sucesso');</script>";
				print "<script>location.href='?page=listar';</script>";			
			} else {
				print "<script>alert('Não foi possível cadastrar');</script>";
				print "<script>location.href='?page=listar';</script>";
			}
									
			break;
		
		case 'editar':
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$tipo = $_POST["tipo"];
			$status = $_POST["status"];								

			$sql = "UPDATE usuarios 
			SET nome='{$nome}',email='{$email}',senha='{$senha}',tipo='{$tipo}',status='{$status}',
			WHERE id=".$_REQUEST["id"]; 		

			$res = $conn->query($sql);

			if($res==true){
				print "<script>alert('Editado com sucesso!');</script>";
				print "<script>location.href='?page=listar';</script>";
			}else{
				print "<script>alert('Não foi possível editar');</script>";
				print "<script>location.href='?page=listar';</script>";
			}
		break;

		case 'excluir':
			$sql = "DELETE FROM usuarios 
			WHERE id=".$_REQUEST["id"];
			$res = $conn->query($sql);

			if($res==true){
				print "<script>alert('Excluido com sucesso!');</script>";
				print "<script>location.href='?page=listar';</script>";
			}else{
				print "<script>alert('Não foi possível excluir');</script>";
				print "<script>location.href='?page=listar';</script>";
			}
			break;	
	}
 ?>