<?php


	// defines
	define("titulo", "LPL Game", true);	 //Learn Programming Logic - Game
	define("subtitulo", "Learn Programing Logic Game", true);	 //Learn Programming Logic - Game
	define("startup", "IFBA Jacobina", true);  

	// meta auto-defines
	define("author", "Jorge Junior", true);
	define("description", "Aprenda a programar por meio desse game online e gratis.", true);
	define("keywords", "LPL, LPL GAME, GAME, Jogo de Programação, Programação Jogo, Promagramação Game", true);
	define("copyright", "@".titulo.date('Y')." - ".startup, true);


	// conexão
	$mysql_host = "localhost";
	$mysql_base = "projeto_ferias";
	$mysql_user = "root";
	$mysql_pass = "";



	function conexao(){
		$GLOBALS['con'] = mysqli_connect($GLOBALS['mysql_host'],$GLOBALS['mysql_user'],$GLOBALS['mysql_pass'],$GLOBALS['mysql_base']) or die (mysqli_error());
		mysqli_select_db($GLOBALS['con'], $GLOBALS['mysql_base']);
		mysqli_query($GLOBALS['con'], "SET NAMES 'utf8'");
		mysqli_query($GLOBALS['con'],'SET character_set_connection=utf8');
		mysqli_query($GLOBALS['con'],'SET character_set_client=utf8');
		mysqli_query($GLOBALS['con'],'SET character_set_results=utf8');
		if(mysqli_connect_errno()){
			echo "Erro ao conectar: " . mysqli_connect_errno();
			die();
		}else{
			return $GLOBALS['con'];
		}
	}

	function antiinjection($sql){
		$sql = addslashes($sql);
		$sql = str_replace("'","",$sql);
		$sql = str_replace("select","",$sql);
		$sql = str_replace("insert","",$sql);
		$sql = str_replace("delete","",$sql);
		$sql = str_replace("where","",$sql);
		$sql = str_replace("drop table","",$sql);
		$sql = str_replace("show tables","",$sql);
		$sql = str_replace("truncate","",$sql);
		$sql = str_replace("SELECT","",$sql);
		$sql = str_replace("INSERT","",$sql);
		$sql = str_replace("DELETE","",$sql);
		$sql = str_replace("WHERE","",$sql);
		$sql = str_replace("DROP TABLE","",$sql);
		$sql = str_replace("SHOW TABLES","",$sql);
		$sql = str_replace("TRUNCATE","",$sql);
		$sql = str_replace("from","",$sql);
		$sql = str_replace("FROM","",$sql);
		return $sql;
	}

	function protecao($sql){
		$sql = str_replace("select","",$sql);
		$sql = str_replace("insert","",$sql);
		$sql = str_replace("delete","",$sql);
		$sql = str_replace("where","",$sql);
		$sql = str_replace("drop table","",$sql);
		$sql = str_replace("show tables","",$sql);
		$sql = str_replace("truncate","",$sql);
		$sql = str_replace("SELECT","",$sql);
		$sql = str_replace("INSERT","",$sql);
		$sql = str_replace("DELETE","",$sql);
		$sql = str_replace("WHERE","",$sql);
		$sql = str_replace("DROP TABLE","",$sql);
		$sql = str_replace("SHOW TABLES","",$sql);
		$sql = str_replace("TRUNCATE","",$sql);
		$sql = str_replace("from","",$sql);
		$sql = str_replace("FROM","",$sql);
		return $sql;
	}