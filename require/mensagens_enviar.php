<?php 
  	// REQUERIMENTOS E INCLUDES;
    include_once 'conexao.php';
    include_once 'functions.php';

	if(isset($_POST['enviar'])){
		if($_POST['nick']!='' || $_POST['assunto']!='' || $_POST['mensagem']!=''){
			$nick = strip_tags($_POST['nick']);
			$assunto = strip_tags($_POST['assunto']);
			$mensagem = strip_tags($_POST['mensagem']);
			$sqlvernick = mysqli_query(conexao(), "SELECT id FROM usuarios WHERE nick='$nick'");
			$rowsqlvernick = mysqli_fetch_assoc($sqlvernick);
			$user = $rowsqlvernick['id'];
			$data = date("Y-m-d H-i-s");
			if($_SESSION['id'] != $user){
				if(mysqli_num_rows($sqlvernick) > 0){
					if(strlen($assunto)<=30){
						mysqli_query(conexao(), "INSERT INTO mensagens(origem, destino, assunto, mensagem, data) VALUES('".antiinjection($_SESSION['id'])."', '".antiinjection($user)."', '".antiinjection($assunto)."', '".antiinjection($mensagem)."', '".antiinjection($data)."')");
						//mysqli_query(conexao(), "INSERT INTO mensagens(origem, destino, assunto, mensagem, data) VALUES('')");
						$success = MensagemSuccess("mensagemEnviada");
					}else{
						$error = MensagemError("mensagemEnCmpAss30Crc");
					}
				}else{
					$error = MensagemError("mensagemEmNckInex");
				}
			}else{
				$error = MensagemError("mensagemEnVCxVC");
			}
		}else{
			$error = MensagemError("mensagemEnCmpVz");
		}
	}