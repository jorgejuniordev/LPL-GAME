<?php

    // REQUIRES;
    require_once 'require/notificações.php';
    require_once 'database.php';
	
    //A quantidade de valor a ser exibida
    $quantidade = 10;
    //a pagina atual
    $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    //Calcula a pagina de qual valor será exibido
    $inicio     = ($quantidade * $pagina) - $quantidade;
    $id=$db['id'];
    $sql2 = mysqli_query(conexao(), "SELECT * FROM notificações WHERE destinatario='$id'") or die();
    $res2 = mysqli_num_rows($sql2);
    $sql = mysqli_query(conexao(), "SELECT * FROM notificações WHERE destinatario='$id' ORDER BY data DESC LIMIT $inicio, $quantidade") or die();
    $res = mysqli_num_rows($sql);
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Notificações</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Notifications</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Lista de notificações</strong></br>
        </div>
        <div class="card-body card-block">
<?php 
    if(isset($_GET["pagina"])){
        if($res>=1){
            while($row = mysqli_fetch_array($sql)){
                mysqli_query(conexao(), "UPDATE notificações SET lida='sim' WHERE destinatario='$id'");
?>
                <div class="fa-hover col-lg-3 col-md-6" align="right">
                    <strong>
                        <code>
                            [<?=strtoupper($row['remetente']);?>]
                        </code> 
                        <?=ucfirst($row['nome']);?>
                    </strong>
                </br>
                    <small>
                        <?=$row['data'];?>
                            
                        </small>
                </div>
                <div class="fa-hover col-lg-9 col-md-6">
                    <div class="alert alert-<?=$row['tipo'];?>" role="alert">
                        <?=$row['mensagem'];?>
                    </div>
                </div>
<?php 
            }
        }else{
            $error = MensagemError("notificaNoEnc");
        }

    //Total de Registro na tabela
    $numTotal   = mysqli_num_rows($sql2);
    //O calculo do Total de página ser exibido
    $totalPagina= ceil($numTotal/$quantidade);
    /**
    * Defini o valor máximo a ser exibida na página tanto para direita quando para esquerda
    */
    $exibir = 6;
    /**
    * Aqui montará o link que voltará uma pagina
    * Caso o valor seja zero, por padrão ficará o valor 1
    */
    $anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;
    /**
    * Aqui montará o link que ir para proxima pagina
    * Caso pagina +1 for maior ou igual ao total, ele terá o valor do total
    * caso contrario, ele pegar o valor da página + 1
    */
    $posterior = (($pagina+1) >= $totalPagina) ? $totalPagina : $pagina+1;
    /**
    * Agora monta o Link paar Primeira Página
    * Depois O link para voltar uma página
    */
    /**
    * Agora monta o Link para Próxima Página
    * Depois O link para Última Página
    */
    if(isset($error)){ ?> 
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-danger">Falha</span>
            <?=$error;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php 
    } 
    echo '  
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <a href="?p=notificações&pagina=1">
                    <button type="button" class="btn btn-primary btn-sm btn-block">
                        Primeira
                    </button>
                </a>
            </div>
    ';    

    echo '  
            <div class="col-md-2">
                <a href="?p=notificações&pagina='.$anterior.'">
                    <button type="button" class="btn btn-primary btn-sm btn-block">
                        Anterior
                    </button>
                </a>
            </div>
    ';  
    /**
    * O loop para exibir os valores à esquerda
    */
echo '<div class="col-md-2 text-sm-center btn btn-light">';
    for($i = $pagina-$exibir; $i <= $pagina-1; $i++){
        if($i > 0){
            echo '  
                <a href="?p=notificações&pagina='.$i.'">
                    <span class="badge btn-dark">
                        '.$i.'
                    </span>
                </a>
            ';
        }
    }
    echo '  
        <a href="?p=notificações&pagina='.$pagina.'">
            <span class="badge badge-danger">
                '.$pagina.'
            </span>
        </a>
    ';

    for($i = $pagina+1; $i < $pagina+$exibir; $i++){
        if($i <= $totalPagina){
            echo '  
                <a href="?p=notificações&pagina='.$i.'">
                    <span class="badge btn-dark">
                        '.$i.'
                    </span>
                </a>
            ';
        }
    }
echo '</div>';







       /**
        * Depois o link da página atual
        */
       /**
        * O loop para exibir os valores à direita
        */
    echo '  
        <div class="col-md-2">
            <a href="?p=notificações&pagina='.$posterior.'">
                <button type="button" class="btn btn-primary btn-sm btn-block">
                    Proxima
                </button>
            </a>
        </div>
    ';

    echo '  
        <div class="col-md-2">
            <a href="?p=notificações&pagina='.$totalPagina.'">
                <button type="button" class="btn btn-primary btn-sm btn-block">
                    Última
                </button>
            </a>
        </div>
        <div class="col-md-1"></div>
    ';











    }else{

        retorno("notificaçõesPaginação");
    }
?>
        </div>
    </div>
</div>