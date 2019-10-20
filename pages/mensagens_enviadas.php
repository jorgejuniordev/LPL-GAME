<?php 

    // REQUIRES;
    include_once('database.php');
    
    //A quantidade de valor a ser exibida
    $quantidade = 10;
    //a pagina atual
    $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    //Calcula a pagina de qual valor será exibido
    $inicio     = ($quantidade * $pagina) - $quantidade;

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
            <strong>Lista de mensagen enviadas</strong></br>
        </div>
        <div class="card-body card-block ">
            <div class="text-left">              
                 <a href="?p=mensagens&pagina=1">
                    <button type="button" class="btn btn-success btn-sm">Mensagens</button>
                </a>
                <a href="?p=mensagens_enviar">
                    <button type="button" class="btn btn-primary btn-sm">Enviar Mensagem</button>
                </a> 
            </div>
            <hr>
        
<?php 
    $sqlvttr = mysqli_query(conexao(), "SELECT * FROM mensagens WHERE origem='$id' ORDER BY data AND lida='sim' ASC LIMIT $inicio, $quantidade") or die();
    $sqlrvvt = mysqli_query(conexao(), "SELECT * FROM mensagens WHERE origem='$id' AND lida='não' ORDER BY data DESC LIMIT $inicio, $quantidade") or die();
    $sqlrmnt = mysqli_query(conexao(), "SELECT * FROM mensagens WHERE origem='$id' AND lida='sim' ORDER BY data DESC LIMIT $inicio, $quantidade") or die();
    if(isset($_GET["pagina"])){
        if(mysqli_num_rows($sqlvttr)>0){
            while($row = mysqli_fetch_array($sqlvttr)){
                $destino = $row['destino'];
                $sqlorg = mysqli_query(conexao(), "SELECT nick, avatar FROM usuarios WHERE id='$destino'");
                $roworig = mysqli_fetch_assoc($sqlorg);
?>
    <div class="card border-secundary alert-info">
        <div class="col-md-12">
            <div class="col-md-8"></div>
            <div class="col-md-4 text-right"> </div>
        </div>
        <div class="col-md-12 bg-secundary">
            <div class="col-md-2">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$roworig['avatar'];?>" alt="Card image cap">
                    <center>
                        <?=ucfirst($roworig['nick']);?></br>
                        <?=$row['data'];?>                            
                    </center>
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

    } 

   //Total de Registro na tabela
    $numTotal   = mysqli_num_rows($sqlvttr);
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





    echo '  
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <a href="?p=mensagens_enviadas&pagina=1">
                    <button type="button" class="btn btn-primary btn-sm btn-block">
                        Primeira
                    </button>
                </a>
            </div>
    ';    

    echo '  
            <div class="col-md-2">
                <a href="?p=mensagens_enviadas&pagina='.$anterior.'">
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
                <a href="?p=mensagens_enviadas&pagina='.$i.'">
                    <span class="badge btn-dark">
                        '.$i.'
                    </span>
                </a>
            ';
        }
    }
    echo '  
        <a href="?p=mensagens_enviadas&pagina='.$pagina.'">
            <span class="badge badge-danger">
                '.$pagina.'
            </span>
        </a>
    ';

    for($i = $pagina+1; $i < $pagina+$exibir; $i++){
        if($i <= $totalPagina){
            echo '  
                <a href="?p=mensagens_enviadas&pagina='.$i.'">
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
            <a href="?p=mensagens_enviadas&pagina='.$posterior.'">
                <button type="button" class="btn btn-primary btn-sm btn-block">
                    Proxima
                </button>
            </a>
        </div>
    ';

    echo '  
        <div class="col-md-2">
            <a href="?p=mensagens_enviadas&pagina='.$totalPagina.'">
                <button type="button" class="btn btn-primary btn-sm btn-block">
                    Última
                </button>
            </a>
        </div>
        <div class="col-md-1"></div>
    ';





 ?>
<?php }else{ ?>
    <span>Nenhuma mensagem foi encontrada.</span>
<?php 
    }


    }else{
        retorno("mensagensEnviadasPaginação");
    }
?>








            </div>
        </div>
    </div>
</div>