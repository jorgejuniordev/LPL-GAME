<?php 
    // REQUIRES;
    include_once('require/database.php');
    include_once('require/functions_notificações.php');

    $id_usuario = $db['id'];

    $sql_notf = mysqli_query(conexao(), "SELECT * FROM notificações WHERE destinatario='$id_usuario' AND lida='não' ORDER BY data DESC LIMIT 3") or die();
    $res_notf = mysqli_num_rows($sql_notf);
?>
<header id="header" class="header">
    <div class="header-menu">
        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline ">
                    <form class="search-form" accept-charset="utf-8" method="get" action="?p=configurações">
                        <input type="hidden" name="p" value="player">
                        <input class="form-control mr-sm-2" name="user" type="text" placeholder="Pesquisar nick de usuário..." aria-label="Search" autocomplete="off">
                        <button class="search-submit" type="submit" style="display:none"/>
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>

                <div class="dropdown for-notification">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <?php if($numero_notificações>0){ ?>
                    <span class="count bg-danger"><?=$numero_notificações;?></span>
                    <?php } ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="notification">

                    <?php         
                        if($res_notf>=1){ 
                    ?>
                    <a href="?p=notificações&pagina=1">
                        <button type="button" class="btn btn-light btn-sm btn-block red">
                            <?php if($res_notf==1){ ?>
                                Sua última notificação
                            <?php }elseif($res_notf==2){ ?>
                                Suas 2 últimas notificações
                            <?php }else{ ?>
                                Suas 3 últimas notificações
                            <?php } ?>
                        </button>
                    </a>
                    <?php 
                        while($row = mysqli_fetch_array($sql_notf)){
                    ?>
                    <a href="?p=notificações&pagina=1" class="dropdown-item media alert-<?=$row['tipo'];?> bg-flat-color" href="#">
                        <?php if($row['tipo'] == 'success'){ ?>
                            <i class="fa fa-check"></i>
                        <?php }elseif($row['tipo'] == 'warning'){ ?>
                            <i class="fa fa-info"></i>
                        <?php }elseif($row['tipo'] == 'danger'){ ?>
                            <i class="fa fa-warning"></i>
                        <?php } ?>
                        <span><b>[<?=strtoupper($row['remetente']);?>]</b> <?=ucfirst($row['nome']);?> ...</span>
                    </a>
                    <?php 
                            }
                            if($numero_notificações>=3){
                    ?>
                                <a href="?p=notificações&pagina=1">
                                    <button type="button" class="btn btn-light btn-sm btn-block red">
                                        Ver todas as notificações
                                    </button>
                                </a>
                    <?php
                            }
                        }else{
                    ?>
                    <a href="?p=notificações&pagina=1">
                        <button type="button" class="btn btn-light btn-sm btn-block red">
                            Nenhuma nova notificação encontrada.</br>
                            <span>Clique para ver todas as notificações</span>
                        </button>
                    </a>
                    <?php
                        }
                    ?>
                  </div>
                </div>
                <a href="?p=mensagens&pagina=1">
                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message">
                            <i class="ti-email"></i>
                            <?php if($numero_mensagens>0){ ?>
                                <span class="count bg-primary"><?=$numero_mensagens;?></span>
                            <?php } ?>
                        </button>
                    </div>                    
                </a>
                <div class="dropdown for-message">
                  <button class="btn btn-secondary dropdown-toggle" type="button"
                        id="message"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-gift"></i>
                    <span class="count bg-success">0</span>
                  </button>
                </div>

                <div class="dropdown for-message">
                    <button type="button" class="btn btn-light m-l-10 m-b-10">
                        <span class="badge badge-warning count">
                        <?=$db['moedas'];?></span> Moedas
                    </button>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="images/avatar/<?=$db['avatar'];?>" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="?p=perfil"><i class="fa fa- user"></i>Meu Perfil</a>

                        <a class="nav-link" href="?p=mensagens&pagina=1"><i class="fa fa- user"></i>Mensagens 
                        <?php if($numero_mensagens>0){ ?>
                            <span class="count bg-primary"><?=$numero_mensagens;?></span>
                        <?php } ?>
                        </a>
                        <a class="nav-link" href="?p=notificações&pagina=1"><i class="fa fa- user"></i>Notificações 
                        <?php if($numero_notificações>0){ ?>
                            <span class="count bg-danger"><?=$numero_notificações;?></span>
                        <?php } ?>
                        </a>

                        <a href="#" class="nav-link" data-toggle="modal" data-target="#mediumModal">
                            <i class="fa fa-power -off"></i>Sair</a>
                </div>
            </div>

            <div class="language-select dropdown" id="language-select">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                    <i class="flag-icon flag-icon-br"></i>
                </a>
            </div>

        </div>
    </div>
</header>

<!-- SAIR -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Sair</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <o>
                    Ao clicar em sair sua conta será deslogada do sistema e você será redirecionado a página inicial do site.
                </o>
                <p>
                    Tem certeza que deseja sair do sistema?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar operação</button>
                <a href="?p=sair"><button type="button" class="btn btn-primary">Sair</button></a>
            </div>
        </div>
    </div>
</div>