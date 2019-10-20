<?php 
	
	if(isset($_POST['submit'])){
		if(isset($_POST['resposta_01']) && ($_POST['resposta_01']!='') && ($_POST['resposta_02']) && ($_POST['resposta_02']!='') && ($_POST['resposta_03']) && ($_POST['resposta_03']!='') && ($_POST['resposta_04']) && ($_POST['resposta_04']!='') && ($_POST['resposta_05']) && ($_POST['resposta_05']!='')){
			$id_aula = strip_tags($_POST['id_aula']);
			$id_questão_01 = strip_tags($_POST['questão_01']);
			$id_questão_02 = strip_tags($_POST['questão_02']);
			$id_questão_03 = strip_tags($_POST['questão_03']);
			$id_questão_04 = strip_tags($_POST['questão_04']);
			$id_questão_05 = strip_tags($_POST['questão_05']);
			$resposta_01 = strip_tags($_POST['resposta_01']);
			$resposta_02 = strip_tags($_POST['resposta_02']);
			$resposta_03 = strip_tags($_POST['resposta_03']);
			$resposta_04 = strip_tags($_POST['resposta_04']);
			$resposta_05 = strip_tags($_POST['resposta_05']);
			$sqlprv = mysqli_query(conexao(), "SELECT * FROM usuarios_aprendizado WHERE id_usuario='".antiinjection($_SESSION['id'])."' AND questionario='ativado' AND id_aula=$id_aula ");
			$rowprv = mysqli_fetch_assoc($sqlprv);
			$select_prova_q1 = mysqli_query(conexao(), "SELECT * FROM aprendizado_questões WHERE id=$id_questão_01 AND id_aula_aprendizado=$id_aula");
			$select_prova_q2 = mysqli_query(conexao(), "SELECT * FROM aprendizado_questões WHERE id=$id_questão_02 AND id_aula_aprendizado=$id_aula");
			$select_prova_q3 = mysqli_query(conexao(), "SELECT * FROM aprendizado_questões WHERE id=$id_questão_03 AND id_aula_aprendizado=$id_aula");
			$select_prova_q4 = mysqli_query(conexao(), "SELECT * FROM aprendizado_questões WHERE id=$id_questão_04 AND id_aula_aprendizado=$id_aula");
			$select_prova_q5 = mysqli_query(conexao(), "SELECT * FROM aprendizado_questões WHERE id=$id_questão_05 AND id_aula_aprendizado=$id_aula");
			$dbp1 = mysqli_fetch_assoc($select_prova_q1);
			$dbp2 = mysqli_fetch_assoc($select_prova_q2);
			$dbp3 = mysqli_fetch_assoc($select_prova_q3);
			$dbp4 = mysqli_fetch_assoc($select_prova_q4);
			$dbp5 = mysqli_fetch_assoc($select_prova_q5);

			$corretas = 0;
			$exp = 0;
			$moedas = rand(0, 10);
			$exp = $exp+rand(0, 10);

			if($rowprv['primeira_vez']=='sim'){
				if($dbp1[$dbp1['questão_correta']] == $resposta_01){
					$corretas++;
					$exp=$exp+rand(0,10);
					$moedas=$moedas+20;
				}
				if($dbp2[$dbp2['questão_correta']] == $resposta_02){
					$corretas++;
					$exp=$exp+rand(0,10);
					$moedas=$moedas+20;
				}
				if($dbp3[$dbp3['questão_correta']] == $resposta_03){
					$corretas++;
					$exp=$exp+rand(0,10);
					$moedas=$moedas+20;
				}
				if($dbp4[$dbp4['questão_correta']] == $resposta_04){
					$corretas++;
					$exp=$exp+rand(0,10);
					$moedas=$moedas+20;
				}
				if($dbp5[$dbp5['questão_correta']] == $resposta_05){
					$corretas++;
					$exp=$exp+rand(0,10);
					$moedas=$moedas+20;
				}
			}else{
				if($dbp1[$dbp1['questão_correta']] == $resposta_01){
					$corretas++;
					$exp=$exp+rand(0,3);
					$moedas=$moedas+5;
				}
				if($dbp2[$dbp2['questão_correta']] == $resposta_02){
					$corretas++;
					$exp=$exp+rand(0,3);
					$moedas=$moedas+5;
				}
				if($dbp3[$dbp3['questão_correta']] == $resposta_03){
					$corretas++;
					$exp=$exp+rand(0,3);
					$moedas=$moedas+5;
				}
				if($dbp4[$dbp4['questão_correta']] == $resposta_04){
					$corretas++;
					$exp=$exp+rand(0,3);
					$moedas=$moedas+5;
				}
				if($dbp5[$dbp5['questão_correta']] == $resposta_05){
					$corretas++;
					$exp=$exp+rand(0,3);
					$moedas=$moedas+5;
				}	
			}

			if($corretas>$rowprv['estrelas']){
				if($corretas==1){
					$estrelas = 1;
				}elseif($corretas==2){
					$estrelas = 2;
				}elseif($corretas==3){
					$estrelas = 3;
				}elseif($corretas==4){
					$estrelas = 4;
				}elseif($corretas>=5){
					$estrelas = 5;
				}
			}else{
				$estrelas = $rowprv['estrelas'];
			}

			$new_id = $id_aula+1;

			mysqli_query(conexao(), "UPDATE usuarios SET exp=exp+$exp, moedas=moedas+$moedas, moedas_faturadas=moedas_faturadas+$moedas WHERE id='".$_SESSION['id']."'");
			
			mysqli_query(conexao(), "UPDATE usuarios_aprendizado SET estrelas='$estrelas', questionario='desativado', primeira_vez='não' WHERE id_aula='$id_aula' AND id_usuario='".$_SESSION['id']."'");

			$verifi = mysqli_query(conexao(), "SELECT * FROM usuarios_aprendizado WHERE id_aula='$id_aula' AND id_usuario='".$_SESSION['id']."'");
			$dbverf = mysqli_fetch_assoc($verifi);

			if(mysqli_num_rows($verifi)==0){
				mysqli_query(conexao(), "INSERT INTO usuarios_aprendizado(id_usuario, id_aula, estrelas, liberação) VALUES ('".$_SESSION['id']."', '$new_id', '0', 'sim')");
			}

			echo" <script>document.location.href='?p=aprendizado&wins=finalizado&exp=$exp&moedas=$moedas&estrelas=$estrelas&corretas=$corretas'</script>";

		}else{
			$error = MensagemError("provaNoSelected");
		}
	}
