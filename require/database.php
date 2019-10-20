<?php 
    // CONECTAR AO BANCO DE DADOS COM A CONTA DO USUARIO;
    if(isset($_SESSION['id'])){
	    $sql = "SELECT * FROM USUARIOS WHERE id='".antiinjection($_SESSION['id'])."'";
	    $result = mysqli_query(conexao(), $sql);
	    $db = mysqli_fetch_assoc($result);
	}