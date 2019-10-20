<?php 
  // REQUIRES
  include_once 'require/functions.php';
  include_once 'require/conexao.php';
  include_once 'database.php';

  if(isset($_POST['config'])){

  	$nome = strip_tags($_POST['nome']);
  	$email = strip_tags($_POST['email']);
  	$sexo = strip_tags($_POST['sexo']);
  	$telefone = strip_tags($_POST['telefone']);
  	$cidade = strip_tags($_POST['cidade']);
  	$uf = strip_tags($_POST['uf']);
  	$data_nascimento = strip_tags($_POST['data_nascimento']);
	$usuario=ucfirst(strtolower(str_replace(array('/','^','[','-',']','+','$','(',')','?','\'','|','°','ª','#','@','.','?','!','<','>'),'',$nome)));
	$id = $db['id'];
  	if(($_POST['nome'] !='') && ($_POST['email'] !='')){
	  	if(strpos($email, "@" ) !== 0){
	  		if($sexo == "Indefinido" || $sexo == "Masculino" || $sexo == "Feminino"){
				$sql = mysqli_query(conexao(), "UPDATE usuarios SET nome='$usuario', email='$email', sexo='$sexo', telefone='$telefone', cidade='$cidade', uf='$uf', data_nascimento='$data_nascimento' WHERE id='$id'");
	            $success = MensagemSuccess('alteracaosucesso');
	  		}else{
	  			$error = MensagemError('campSexo');
	  		}	
	  	}else{
	  		$error = MensagemError('emailInvalid');
	  	}
	  }else{
	  	$error = MensagemError('camposvazios');
	  }
  }