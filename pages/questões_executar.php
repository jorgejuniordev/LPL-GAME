<?php 
	
	//includes
	include_once("database.php");

    $sqlaprsmajksndsa = mysqli_query(conexao(), "SELECT * FROM usuarios_aprendizado WHERE id_usuario='".$db['id']."'");

    // verifica se já existe a linha
    if(mysqli_num_rows($sqlaprsmajksndsa)>0){
        mysqli_query(conexao(), "INSERT INTO usuarios_aprendizado(id_usuario, id_aula, estrelas, liberação) VALUES ('".$db['id']."', '1', '0', 'sim')");
    }

    echo "executouuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";