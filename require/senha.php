<?php 
  // REQUIRES
  include_once 'require/functions.php';
  include_once 'require/conexao.php';
  include_once 'database.php';

	if(isset($_POST['senha'])){
	  	$senha0 = strip_tags($_POST['senha_original']);
	  	$senha1 = strip_tags($_POST['senha_nova']);
	  	$senha2 = strip_tags($_POST['confirmar']);

	  	if(($senha0 != '') && ($senha1 != '') && ($senha2 != '')){
	  		if(md5($senha0) == $db['senha']){
			  	if($senha1 == $senha2){
			  		$senha3 = md5($senha1);
			 		$sql = mysqli_query(conexao(), "UPDATE usuarios SET senha='$senha3' WHERE id='".$db['id']);
			    	$success = MensagemSuccess('alteracaosucesso');
			  	}else{
			  		$error = MensagemError('senhaNaoIgual');
			  	}
			}else{
				$error = MensagemError('semjaAtualIncorreta');
			}
		}else{
		  	$error = MensagemError('camposvazios');
		}
	}