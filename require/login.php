<?php
  // SESSION START

  // REQUIRES
  require_once 'require/functions.php';
  require_once 'require/conexao.php';
  
  // COMMANDS
  if(isset($_POST['login'])){
    $nick = $_POST['nick'];
    $senha = md5($_POST['password']);
    $ip_ultimologin = $_SERVER['REMOTE_ADDR'];
    if($nick == ""){
      $msg=MensagemError('campoLoginVazio');
    }
    if($senha == ""){
      $msg=MensagemError('campoSenhaVazio');
    }
    if($nick && $senha){
      $sql0 = "SELECT nick FROM USUARIOS WHERE nick='".antiinjection($nick)."' AND senha!='".antiinjection($senha)."'";
      $sql1 = "SELECT id, nome, nick FROM USUARIOS WHERE nick='".antiinjection($nick)."' AND senha='".antiinjection($senha)."'";
      $result0 = mysqli_query(conexao(),$sql0);
      $result1 = mysqli_query(conexao(),$sql1);
      $sess = mysqli_fetch_assoc($result1);
      $sql2 = "UPDATE USUARIOS SET ip_ultimologin='".$ip_ultimologin."' WHERE id='".$sess['id']."'";
      if(mysqli_num_rows($result1) > 0){
        if(!session_id()) session_start();
        setcookie("user", $sess['nick'], time()+3600); //1 hour
        $_SESSION['id']   = $sess['id'];
        mysqli_query(conexao(), $sql2);
        require_once("iniciar_usuario.php");
        retorno('home');
        exit();
      }elseif(mysqli_num_rows($result0) > 0){
        $msg=Mensagem('errologin-3');
      }else{
        $msg=Mensagem('errologin-4');
      }
    }
  }