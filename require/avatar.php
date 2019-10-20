<?php 

	//includes
	include_once('database.php');
	include_once('functions.php');

	//operação
	if(isset($_POST['comprar'])){
		$avatar_id = strip_tags($_POST['avatar_id']);
		$avatar_level = strip_tags($_POST['avatar_level']);
		$avatar_moedas = strip_tags($_POST['avatar_moedas']);
		$usuario_id = $db['id'];
		$sqlvertarel = mysqli_query(conexao(), "SELECT * FROM avatars WHERE avatar_id='$avatar_id' AND level='$avatar_level' AND moedas='$avatar_moedas'");
		$sqlveravatt = mysqli_query(conexao(), "SELECT * FROM usuarios_avatars WHERE usuario_id='$usuario_id' AND $avatar_id='1'");		
		$sqlverexist = mysqli_query(conexao(), "SELECT * FROM usuarios_avatars WHERE usuario_id='$usuario_id'");
		if(mysqli_num_rows($sqlvertarel)>0){				
			if(mysqli_num_rows($sqlveravatt)==0){
				if($db['moedas'] >= $avatar_moedas){
					if($db['nivel'] >= $avatar_level){
						$moedas = $db['moedas'] - $avatar_moedas;
						mysqli_query(conexao(), "UPDATE usuarios SET moedas='$moedas' WHERE id='$usuario_id'");
						if(mysqli_num_rows($sqlverexist)>0){
							mysqli_query(conexao(), "UPDATE usuarios_avatars SET $avatar_id='1' WHERE usuario_id='$usuario_id'");
						}else{
							mysqli_query(conexao(), "INSERT INTO usuarios_avatars (usuario_id, $avatar_id) VALUES ('".antiinjection($usuario_id)."', '1')");
						}
						$success = MensagemSuccess("avatarSuccess");
					}else{
						$error = MensagemError("avatarLvIns");
					}
				}else{
					$error = MensagemError("avatarMdIns");
				}
			}else{
				$error = MensagemError("avatarPss");
			}
		}else{
			$error = MensagemError("avatarLvMd");
		}
	}elseif(isset($_POST['usar'])){
		$avatar_imagem = strip_tags($_POST['avatar_imagem']);
		$avatar_id = strip_tags($_POST['avatar_id']);
		$usuario_id = $db['id'];
		$sqlveravatt = mysqli_query(conexao(), "SELECT * FROM usuarios_avatars WHERE usuario_id='$usuario_id' AND $avatar_id='1'");	
		if(mysqli_num_rows($sqlveravatt)>0){
			mysqli_query(conexao(), "UPDATE usuarios SET avatar='$avatar_imagem' WHERE id='$usuario_id'");
			$db['avatar']=$avatar_imagem;
			$success = MensagemSuccess("avatarUtilizar");
		}else{
			$error = MensagemError("avatarNoPss");
		}	

	}