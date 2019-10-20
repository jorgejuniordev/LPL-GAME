<?php 

	if(isset($_SESSION['id'])){
		include_once("functions.php");

		//operação
		$sql_qs = "SELECT * FROM usuarios_aprendizado WHERE id_usuario='".antiinjection($_SESSION['id'])."' AND questionario='ativado' ";
		$rslt_qs = mysqli_query(conexao(), $sql_qs);

		if(mysqli_num_rows($rslt_qs)>0 && $_GET['p']!='prova'){
			retorno("aprendizadoProvaObrigação");
		}
	}