<?php

    // REQUIRES;
    require_once 'require/functions_nivel.php';
    include_once 'database.php';
    

    $sql_aprendizado = mysqli_query(conexao(), "SELECT * FROM modo_aprendizado");
    $sql_aprendizado_user = mysqli_query(conexao(), "SELECT * FROM usuarios_aprendizado WHERE id_usuario='".$db['id']."'");


    // verifica se já existe a linha
    if(mysqli_num_rows($sql_aprendizado_user)==0){
        mysqli_query(conexao(), "INSERT INTO usuarios_aprendizado(id_usuario, id_aula, estrelas, liberação) VALUES ('".$db['id']."', '1', '0', 'sim')");
    }
    

    require_once("pages/prova_finalizada.php");

?>
<div class="content mt-3">
    <div class="col-sm-12">
        <div class="animated fadeIn">
            <?php if(isset($success)){ ?> 
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                      <span class="badge badge-pill badge-success">Sucesso</span>
                        <?=$success;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
            <?php }elseif(isset($_GET['msg']) && $_GET['msg']=='idnull'){ ?>
                <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                      <span class="badge badge-pill badge-danger">Falha</span>
                        Não foi encontrado essa aula selecionado no sistema.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } 
                while($row = mysqli_fetch_assoc($sql_aprendizado)){
                    $sqlaprnd = mysqli_query(conexao(), "SELECT estrelas FROM usuarios_aprendizado WHERE id_aula='".$row['id_aula']."' AND id_usuario='".$db['id']."'");
                    $rowaprn = mysqli_fetch_assoc($sqlaprnd);                    
                    $sqlaprn2 = mysqli_query(conexao(), "SELECT estrelas FROM usuarios_aprendizado WHERE id_aula='".$row['id_aula']."' AND id_usuario='".$db['id']."' AND liberação='sim'");
                    if(mysqli_num_rows($sqlaprn2)>0){
            ?>
            <div class="col-md-3">
                <section class="card">
                    <div class="twt-feed <?=$row['cor'];?>-bg">
                        <div class="corner-ribon black-ribon">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <div class="mx-auto d-block">
                            <h1>#<?=$row['id_aula'];?> Aula</h1>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <h5 class="text-white display-6"><?=$row['titulo'];?></h5>
                                <p class="text-light"><?=$row['subtitulo'];?></p>
                                Estrelas Necessárias: <i class="fa"><span class="bg-dark"> <?=$row['estrelas_necessárias'];?> </span></i>
                            </div>
                        </div>
                    </div>
                    <footer class="twt-footer text-sm-center">
                        <?php if($rowaprn['estrelas'] == 5){ ?>
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_on.png"> 
                        <?php }elseif($rowaprn['estrelas'] == 4){ ?>
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_off.png">
                        <?php }elseif($rowaprn['estrelas'] == 3){ ?>
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                        <?php }elseif($rowaprn['estrelas'] == 2){ ?>
                            <img src="images/star_on.png">
                            <img src="images/star_on.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                        <?php }elseif($rowaprn['estrelas'] == 1){ ?>
                            <img src="images/star_on.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                        <?php }else{ ?>
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                            <img src="images/star_off.png">
                        <?php } ?>

                        <hr>
                        <a href="?p=aprendizado_aula&id=<?=$row['id_aula'];?>">
                            <button type="button" class="btn btn-dark btn-sm btn-block">Iníciar</button>
                        </a>
                    </footer>
                </section>
            </div>
            <?php }else{ ?>
            <div class="col-md-3 opacity" style="display: blocked">
                <section class="card">
                    <div class="twt-feed <?=$row['cor'];?>-bg">
                        <div class="corner-ribon black-ribon">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <div class="mx-auto d-block">
                            <h1>#<?=$row['id_aula'];?> Aula</h1>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <h5 class="text-white display-6"><?=$row['titulo'];?></h5>
                                <p class="text-light"><?=$row['subtitulo'];?></p>
                                Estrelas Necessárias: <i class="fa"><span class="bg-dark"> <?=$row['estrelas_necessárias'];?> </span></i>
                            </div>
                        </div>
                    </div>
                    <footer class="twt-footer text-sm-center">
                        <img src="images/star_off.png">
                        <img src="images/star_off.png">
                        <img src="images/star_off.png">
                        <img src="images/star_off.png">
                        <img src="images/star_off.png">
                        <hr>
                        <button type="button" class="btn btn-dark btn-sm btn-block disabled">Iníciar</button>
                    </footer>
                </section>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
