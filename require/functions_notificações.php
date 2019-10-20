<?php 
	
	if(isset($_SESSION['id'])){
		//operação
		$sql_s = "SELECT * FROM notificações WHERE lida='não' AND destinatario='".antiinjection($_SESSION['id'])."' ";
		$rslt_s = mysqli_query(conexao(), $sql_s);
		$numero_notificações = mysqli_num_rows($rslt_s);	

		$sql_m = "SELECT * FROM mensagens WHERE lida='não' AND destino='".antiinjection($_SESSION['id'])."' ";
		$rslt_m = mysqli_query(conexao(), $sql_m);
		$numero_mensagens = mysqli_num_rows($rslt_m);
	}