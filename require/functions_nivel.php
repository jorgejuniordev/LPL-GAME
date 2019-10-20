<?php 

	//includes
	include_once("database.php");

	function novoNivel($exp, $expmax){
		if($exp >= $expmax){
			$sql = "SELECT * FROM USUARIOS WHERE id='".antiinjection($_SESSION['id'])."'";
		    $result = mysqli_query(conexao(), $sql);
		    $db = mysqli_fetch_assoc($result);
			$novaexpmax = $db['exp_max'] + $db['nivel'] * 10;
			$difexp=$db['exp']-$db['exp_max'];
			$db['nivel']=$db['nivel']+1;
			$db['exp']=$difexp;
			$db['exp_max']=$novaexpmax;
			$db['moedas']=$db['moedas']+100;
			$db['moedas_faturadas']=$db['moedas_faturadas']+100;
			$db['stamina']=100;
			mysqli_query(conexao(), "UPDATE usuarios SET nivel=nivel+1, exp=$difexp, exp_max=$novaexpmax, moedas=moedas+100, moedas_faturadas=moedas_faturadas+100, stamina=100 WHERE id=".$db['id']);
			require_once("pages/nivel_up.php");
		}
	}

	
	function nivelNome($nivel){
		switch ($nivel) {
			case 1: echo "Newbie V"; break;
			case 2: echo "Newbie IV"; break;
			case 3: echo "Newbie III"; break;
			case 4: echo "Newbie II"; break;
			case 5: echo "Newbie I"; break;
			case 6: echo "Newbie"; break;
			case 7: echo "Principiante V"; break;
			case 8: echo "Principiante IV"; break;
			case 9: echo "Principiante III"; break;
			case 10: echo "Principiante II"; break;
			case 11: echo "Principiante I"; break;
			case 12: echo "Principiante"; break;
			case 13: echo "Aprendiz V"; break;
			case 14: echo "Aprendiz IV"; break;
			case 15: echo "Aprendiz III"; break;
			case 16: echo "Aprendiz II"; break;
			case 17: echo "Aprendiz I"; break;
			case 18: echo "Aprendiz"; break;
			case 19: echo "Aluno V"; break;
			case 20: echo "Aluno IV"; break;
			case 21: echo "Aluno III"; break;
			case 22: echo "Aluno II"; break;
			case 23: echo "Aluno I"; break;
			case 24: echo "Aluno"; break;
			case 25: echo "Ambicioso V"; break;
			case 26: echo "Ambicioso IV"; break;
			case 27: echo "Ambicioso III"; break;
			case 28: echo "Ambicioso II"; break;
			case 29: echo "Ambicioso I"; break;
			case 30: echo "Ambicioso"; break;
			case 31: echo "Muito bom V"; break;
			case 32: echo "Muito bom IV"; break;
			case 33: echo "Muito bom III"; break;
			case 34: echo "Muito bom II"; break;
			case 35: echo "Muito bom I"; break;
			case 36: echo "Muito bom"; break;
			case 37: echo "Excelente V"; break;
			case 38: echo "Excelente IV"; break;
			case 39: echo "Excelente III"; break;
			case 40: echo "Excelente II"; break;
			case 41: echo "Excelente I"; break;
			case 42: echo "Excelente"; break;
			case 43: echo "Especialista V"; break;
			case 44: echo "Especialista IV"; break;
			case 45: echo "Especialista III"; break;
			case 46: echo "Especialista II"; break;
			case 47: echo "Especialista I"; break;
			case 48: echo "Especialista"; break;
			case 49: echo "Gênio V"; break;
			case 50: echo "Gênio IV"; break;
			case 51: echo "Gênio III"; break;
			case 52: echo "Gênio II"; break;
			case 53: echo "Gênio I"; break;
			case 54: echo "Gênio"; break;
			case 55: echo "Ótimo V"; break;
			case 56: echo "Ótimo IV"; break;
			case 57: echo "Ótimo III"; break;
			case 58: echo "Ótimo II"; break;
			case 59: echo "Ótimo I"; break;
			case 60: echo "Ótimo"; break;
			case 61: echo "Crânio V"; break;
			case 62: echo "Crânio IV"; break;
			case 63: echo "Crânio III"; break;
			case 64: echo "Crânio II"; break;
			case 65: echo "Crânio I"; break;
			case 66: echo "Crânio"; break;
			case 67: echo "Sábio V"; break;
			case 68: echo "Sábio IV"; break;
			case 69: echo "Sábio III"; break;
			case 70: echo "Sábio II"; break;
			case 71: echo "Sábio I"; break;
			case 72: echo "Sábio"; break;
			case 73: echo "Incrível V"; break;
			case 74: echo "Incrível IV"; break;
			case 75: echo "Incrível III"; break;
			case 76: echo "Incrível II"; break;
			case 77: echo "Incrível I"; break;
			case 78: echo "Incrível"; break;
			case 79: echo "Mestre V"; break;
			case 80: echo "Mestre IV"; break;
			case 81: echo "Mestre III"; break;
			case 82: echo "Mestre II"; break;
			case 83: echo "Mestre I"; break;
			case 84: echo "Mestre"; break;
			case 85: echo "Mestre Supremo V"; break;
			case 86: echo "Mestre Supremo IV"; break;
			case 87: echo "Mestre Supremo III"; break;
			case 88: echo "Mestre Supremo II"; break;
			case 89: echo "Mestre Supremo I"; break;
		   default: echo "Mestre Supremo"; break;
		}
	}
