<?php
  	
  	// REQUERIMENTOS E INCLUDES;
    include_once 'conexao.php';
    include_once 'functions.php';

    // LOGOUT
    if(isset($_SESSION['id'])){
    	session_unset();
    	session_destroy();
    	retorno('logoutsuccess');
    }