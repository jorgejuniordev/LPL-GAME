<?php
    // REQUIRES
    require_once 'require/functions.php';
    require_once 'require/conexao.php';

    if(isset($_POST['cadastro']) && ($_POST['nick'] !='') && ($_POST['nome'] !='') && ($_POST['email'] !='') && ($_POST['password'] !='') && ($_POST['password-confirm'] !='')){
        $nick       =   strip_tags($_POST['nick']);
        $nome       =   strip_tags($_POST['nome']);
        $email      =   strip_tags($_POST['email']);
        $senha1     =   strip_tags($_POST['password']);
        $senha2     =   strip_tags($_POST['password-confirm']);
        $ip         =   $_SERVER['REMOTE_ADDR'];

        if($senha1 == $senha2){
            $sql = "SELECT * FROM USUARIOS WHERE nick = '$nick'";
            $res = mysqli_query(conexao(), $sql);
            if(mysqli_num_rows($res) == 0){
                    $senha = md5($senha1);
                    $sql = "INSERT INTO USUARIOS(nick, nome, email, senha, ip_cadastro) VALUES('".antiinjection($nick)."','".antiinjection($nome)."','".antiinjection($email)."','".antiinjection($senha)."', '".$ip."')";
                    $result = mysqli_query(conexao(), $sql);
                    if($result){
                        retorno('loginregister');
                        exit();
                    }else{
                        $msg=Mensagem('errocadastro-1');
                    }
            }else{
                $msg=Mensagem('errocadastro-2');
            }
        }else{
            $msg=Mensagem('errocadastro-3');
        }
    }

