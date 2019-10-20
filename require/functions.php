<?php

	// FUNÇÃO PARA LOGAR;
	function retorno($var){
		switch ($var) {
			case 'home':
				echo" <script>document.location.href='home.php?p=home'</script>";
				break;
			
			case 'login':
				echo" <script>document.location.href='index.php?p=login'</script>";
				break;
		
			case 'loginregister':
				echo" <script>document.location.href='index.php?p=login&msg=msgsuccessregister'</script>";
				break;
			
			case 'logoutsuccess':
				echo" <script>document.location.href='index.php?p=login&msg=msgsuccesslogout'</script>";
				break;
				
			case 'logoutcookie':
				echo" <script>document.location.href='index.php?p=login&msg=logoutcookie'</script>";
				break;

			case 'logout':
				echo" <script>document.location.href='home.php?p=logout'</script>";
				break;			

			case 'alteraçãosucesso':
				echo" <script>document.location.href='home.php?p=logout&msg=alteraçãosucesso'</script>";
				break;



			case 'notificaçõesPaginação':
				echo" <script>document.location.href='?p=notificações&pagina=1'</script>";
				break;			
			case 'mensagensPaginação':
				echo" <script>document.location.href='?p=mensagens&pagina=1'</script>";
				break;				
			case 'mensagensEnviadasPaginação':
				echo" <script>document.location.href='?p=mensagens_enviadas&pagina=1'</script>";
				break;			
			case 'mensagensExclusãoSuccess':
				echo" <script>document.location.href='?p=mensagens&pagina=1&msg=success'</script>";
				break;
			case 'aprendizadoRetornoFalhaId':
				echo" <script>document.location.href='?p=aprendizado&msg=idnull'</script>";
				break;
			case 'aprendizadoProva':
				echo" <script>document.location.href='?p=prova'</script>";
				break;			
			case 'aprendizadoProvaObrigação':
				echo" <script>document.location.href='?p=prova&msg=obrigação'</script>";
				break;			
			case 'aprendizadoProvaFinalizado':
				echo" <script>document.location.href='?p=provafinal'</script>";
				break;
			default:
				echo" <script>document.location.href='home.php?p=home'</script>";
				break;
		}		
	}

	function MensagemError($msg){
		switch($msg){
			case 'campoLoginVazio':
				$error = "Alguns campos obrigatórios estão vázios.";
				break;				
			case 'campoSenhaVazio':
				$error = "Alguns campos obrigatórios estão vázios.";
				break;	
			case 'camposvazios':
				$error = "Alguns campos obrigatórios estão vázios.";
				break;		
			case 'campSexo':
				$error = "O campo sexo está incorreto.";
				break;
			case 'emailInvalid':
				$error = "E-mail digitado é inválido";
				break;			
			case 'semjaAtualIncorreta':
				$error = "Senha atual incorreta.";
				break;			
			case 'senhaNaoIgual':
				$error = "Senha de confirmação incorreta.";
				break;
			case 'avatarLvIns':
				$error = "Level insuficiente para comprar o avatar.";
				break;
			case 'avatarMdIns':
				$error = "Moedas insuficientes para comprar o avatar.";
				break;
			case 'avatarPss':
				$error = "Você já possui esse avatar.";
				break;
			case 'avatarLvMd':
				$error = "Level e Moedas não correspondem ao avatar atual.";
				break;			
			case 'avatarNoPss':
				$error = "Você não possui esse avatar.";
				break;
			case 'playerNoEnctr':
				$error = "Nenhum usuário com esse nick foi encontrado.";
				break;			
			case 'notificaNoEnc':
				$error = "Nenhuma notificação encontrada";
				break;			
			case 'mensagemNoCx':
				$error = "Essa mensagem não corresponde a sua caixa de mensagens.";
				break;
			case 'mensagemEnCmpAss30Crc':
				$error = "O campo assunto não pode ser maior que 30 caracteres.";
				break;			
			case 'mensagemEmNckInex':
				$error = "Não existe nenhum usuário com o nick informado.";
				break;			
			case 'mensagemEnCmpVz':
				$error = "Existem campos vázios.";
				break;
			case 'mensagemEnVCxVC':
				$error = "Não é possível enviar uma mensagem para você mesmo.";
				break;			
			case 'provaNoSelected':
				$error = "Você esqueceu de responder alguma questão.";
				break;
			default:
				$error = "";
				break;
		}
		return $error;
	}


	function MensagemSuccess($msg){
		switch($msg){
			case 'alteracaosucesso':
				$success = "Alteração realizada com sucesso.";
				break;				
			case 'avatarSuccess':
				$success = "Compra de avatar realizada com sucesso.";
				break;	
			case 'avatarUtilizar':
				$success = "Avatar atualizado com sucesso.";
				break;	
			case 'playerEncontrado':
				$success = "Usuário encontrado com sucesso.";
				break;
			case 'mensagemEnviada':
				$success = "Mensagem enviada com sucesso.";
				break;
			default:
				$success = "";
				break;
		}
		return $success;
	}


	function MensagemDanger($msg){
		switch($msg){
			case 'mensagemApagar':
				$danger = "Você tem certeza que deseja apagar a mensagem?";
				break;
			default:
				$danger = "";
				break;
		}
		return $danger;
	}









	// FUNÇÃO PARA RETORNAR AS MENSAGENS DE AÇÕES
	function Mensagem($msg){
		switch($msg){
			case 'alteracaosucesso':
				$html = "Alteração realizada com sucesso.";
				break;	

			case 'camposvazios':
				$html = "Alguns campos obrigatórios estão vázios.";
				break;	

			case 'errologin-2':
				$html = "Por favor preecha o campo senha.";
				break;
			
			case 'errologin-3':
				$html = "Senha incorreta.";
				break;
			
			case 'errologin-4':
				$html = "Usuário não existe.";
				break;
			
			// ERROS DE CADASTRO
			case 'errocadastro-1':
				$html = "Erro ao Registrar!.";
				break;
						
			case 'errocadastro-2':
				$html = "Já existe um usuario com esse nick.";
				break;

			case 'errocadastro-3':
				$html = "As senhas não conferem.";
				break;
			
			// MENSAGEM DE SUCESSO NO CADASTRO
			case 'msgsuccessregister':
				$html = "Conta criada com sucesso.";
				break;
			
			case 'msgsuccesslogout':
				$html = "Saiu com sucesso.";
				break;

			case 'erro404':
				$html = "Erro na alteração dos dados.";
				break;

			case 'campSexo':
				$html = "O campo sexo está incorreto.";
				break;

			case 'emailInvalid':
				$html = "E-mail digitado é inválido";
				break;

			default:
				$html = "";
				break;
		}

		return $html;
	}


	function VerificarSession($status){
		if($status == 1){
			if(isset($_SESSION['id'])){
		   		retorno('home');
		    }
		}else{
			if(!isset($_SESSION['id'])){
		   		retorno('login');
		    }
		}
	}


	function MensagemSession(){
		if(isset($_SESSION['mensagem']) && $_SESSION['mensagem'] != ""){
			switch ($_SESSION['mensagem']) {
				case 'login':
					echo '<script>toastr.success("Logado com sucesso.");</script>';
					break;
				case 'ativar':
					echo '<script>toastr.success("Conta ativada com sucesso.");</script>';
					break;
				case 'desativar':
					echo '<script>toastr.success("Conta desativada com sucesso.");</script>';
					break;
				case 'bloquear':
					echo '<script>toastr.success("Conta loqueada com sucesso.");</script>';
					break;
				case 'atualizado':
					echo '<script>toastr.info("Sua conta já está atualizada.");</script>';
					break;
				case 'atualizada':
					echo '<script>toastr.success("Sua conta foi atualizada com sucesso.");</script>';;
					break;				
				case 'cidade':
					echo '<script>toastr.success("Cidade adicionada com sucesso.");</script>';;
					break;
				case 'cidadedelet':
					echo '<script>toastr.success("Cidade deletada com sucesso.");</script>';;
					break;
				case 'erroradmin00':
					echo '<script>toastr.warning("Você não pode alterar uma conta admin.");</script>';;
					break;						
				case 'erroradmin01':
					echo '<script>toastr.warning("Você digitou seu cpf.");</script>';;
					break;	
				case 'erroradmin02':
					echo '<script>toastr.error("o campo cpf precisar ter 11 digitos e conter apenas números.");</script>';;
					break;
				case 'successadmin03':
					echo '<script>toastr.success("Conta atualizada como: Supervisor.");</script>';;
					break;
				case 'successadmin04':
					echo '<script>toastr.success("Conta atualizada como: Acs.");</script>';;
					break;
				case 'errorpessoa01':
					echo '<script>toastr.error("Você precisa digitar o cartão do sus.");</script>';;
					break;
				case 'errorpessoa02':
					echo '<script>toastr.error("Não existe nenhuma pessoa cadastrada por você com esse número de cartão do sus.");</script>';;
					break;
				case 'successpessoaatualizar1':
					echo '<script>toastr.success("Atualizado com sucesso.");</script>';;
					break;
				case 'successpessoaatualizar2':
					echo '<script>toastr.success("Adicionado obito para a pessoa com sucesso.");</script>';;
					break;
				case 'successpessoaatualizar3':
					echo '<script>toastr.success("Adicionado a saida de territorio para a pessoa com sucesso.");</script>';
					break;
				case 'successpessoaatualizar4':
					echo '<script>toastr.success("Conta voltou ao normal.");</script>';
					break;
				default:
					# code...
					break;
			}

			unset($_SESSION['mensagem']);
		}
	}

	// INDEX - RECEBER PÁGINAS;
	function IndexPaginas(){
	    if(isset($_GET['msg'])){
	        Mensagem($_GET['msg']);
	    }
	    if(!isset($_GET['p'])){
	        require_once('pages/home.php');
	    }else{
	        switch($_GET['p']){
	            case 'home': require_once('pages/home.php'); break;
	            case 'login': require_once('pages/login.php'); break;
	            case 'cadastro': require_once('pages/cadastro.php'); break;
	            case 'recuperar': require_once('pages/recuperar.php'); break;
	            default: require_once('pages/login.php'); break;
	        }
	    }
	}	

	// HOME - RECEBER PÁGINAS;
	function HomePaginas(){
	    if(isset($_GET['msg'])){
	        Mensagem($_GET['msg']);
	    }
	    if(!isset($_GET['p'])){
	        require_once('pages/home.php');
	    }else{
	        switch($_GET['p']){
	            case 'home': require_once('pages/homelogado.php'); break;
	            case 'perfil': require_once('pages/perfil.php'); break;
	            case 'configurações': require_once('pages/configurações.php'); break;
	            case 'avatar': require_once('pages/avatar.php'); break;
	            case 'senha': require_once('pages/senha.php'); break;
	            case 'player': require_once('pages/player.php'); break;
	            case 'notificações': require_once('pages/notificações.php'); break;
	            case 'mensagens': require_once('pages/mensagens.php'); break;
	            case 'mensagens_ler': require_once('pages/mensagens_ler.php'); break;
	            case 'mensagens_enviar': require_once('pages/mensagens_enviar.php'); break;
	            case 'mensagens_enviadas': require_once('pages/mensagens_enviadas.php'); break;
	            case 'aprendizado': require_once('pages/aprendizado.php'); break;
	            case 'aprendizado_aula': require_once('pages/aprendizado_aula.php'); break;
	            case 'prova': require_once('pages/prova.php'); break;
	            case 'sair': require_once('pages/sair.php'); break;
	            default: require_once('pages/home.php'); break;
	        }
	    }
	}