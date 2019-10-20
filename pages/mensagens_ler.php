<?php 

    // REQUIRES;
    include_once('require/functions.php');
    include_once('database.php');
    //include_once('require/mensagens.php');
    if(isset($_GET['id'])){
        $mensagem_id = strip_tags($_GET['id']);
    }    
    if(isset($_GET['apagar'])){
        $mensagem_deletar = strip_tags($_GET['apagar']);
    }
    $id = $db['id'];
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Mensagens</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Posts</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div>

<div class="card">
    <div class="card-header">
        <strong>Visualizar Mensagem</strong></br>
    </div>
    <div class="card-body card-block ">
<?php
    if(isset($mensagem_id) || isset($mensagem_deletar)){
        $sqlmsgv1 = mysqli_query(conexao(), "SELECT * FROM mensagens WHERE destino='$id' AND id='$mensagem_id'") or die();
        if(mysqli_num_rows($sqlmsgv1)>0){
            mysqli_query(conexao(), "UPDATE mensagens SET lida='sim' WHERE destino='$id' AND id='$mensagem_id'");
            if(isset($mensagem_deletar) && ($mensagem_deletar=='pergunta')){ 
                $danger = MensagemDanger("mensagemApagar");
            }
            if(isset($mensagem_deletar) && ($mensagem_deletar=='apagar')){ 
                //função para apagar mensagem
                mysqli_query(conexao(),"DELETE FROM mensagens WHERE destino='$id' AND id='$mensagem_id'");
                retorno('mensagensExclusãoSuccess');
            }
            while($row = mysqli_fetch_array($sqlmsgv1)){
                $origem = $row['origem'];
                $sqlorg = mysqli_query(conexao(), "SELECT nick, avatar FROM usuarios WHERE id='$origem'");
                $roworig = mysqli_fetch_assoc($sqlorg);

?>







<div class="card border-secundary">
    <div class="col-md-12">
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right"> </div>
    </div>
    <div class="col-md-12 bg-secundary">
        <div class="col-md-2">
            <div class="mx-auto d-block">
                <a href="?p=player&user=<?=$roworig['nick'];?>">
                    <img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$roworig['avatar'];?>" alt="Card image cap">
                    <center>
                        <?=ucfirst($roworig['nick']);?></br>
                        <?=$row['data'];?>                        
                    </center>
                </a>
            </div>
        </div>
        <div class="col-md-10 bg-secundary">
            <div class="user-header bg-secundary">
                <i class="mr-2 ti-email"></i>
                <strong class="card-title"><?=ucfirst($row['assunto']);?></strong>
            </div>   
            <div class="user-header bg-secundary">
                <?=strip_tags($row['mensagem']);?>
            </div>
        </div>
    </div></br>
</div>


<?php 
    if(!isset($mensagem_deletar)){ 
?>
<div class="text-right">
    <a href="?p=mensagens&pagina=1">
        <button type="button" class="btn btn-primary btn-sm">Voltar a página de Mensagens</button>
    </a>    
    <a href="?p=mensagens_ler&id=<?=$mensagem_id;?>&apagar=pergunta">
        <button type="button" class="btn btn-danger btn-sm">Deletar Mensagem</button>
    </a>
</div>
<hr>
<?php 
    }

            } //end while

        }else{ 
            $error = MensagemError("mensagemNoCx");
        }  
    }else{ 
        retorno('mensagensPaginação');
    } 
 ?>






 <?php if(isset($danger) && $mensagem_deletar=='pergunta'){ ?> 
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <center>
                <?=$danger;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></br>
                <a class="btn btn-primary" style="color: white" data-dismiss="alert" aria-label="Close">Cancelar</a>
                <a class="btn btn-danger" href="?p=mensagens_ler&id=<?=$mensagem_id;?>&apagar=apagar" role="button">Excluir</a>
            </center>
        </div>
    </div>
<?php }elseif(isset($error)){ ?> 
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-danger">Falha</span>
            <?=$error;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php } ?>

        </div>
    </div>
</div>
