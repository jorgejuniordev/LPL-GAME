<?php

	// REQUIRES;
    require_once 'require/functions_nivel.php';
	include_once 'database.php';
	include_once 'require/avatar.php';
	

  $sql_avatar = mysqli_query(conexao(), "SELECT * FROM avatars");


?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Avatar</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Character</li>
                </ol>
            </div>
        </div>
    </div>
</div>
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
<?php } ?>
<?php 
    while($aux = mysqli_fetch_assoc($sql_avatar)){
        if($aux['level'] <= $db['nivel']){
            $idaux = $db['id'];
            $avaidaux = $aux['avatar_id'];
            $avaidaxx = $aux['avatar_imagem'];
            $sqlver = mysqli_query(conexao(), "SELECT * FROM usuarios_avatars WHERE usuario_id='$idaux' AND $avaidaux='1'");
            $srlust = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE id='$idaux' AND avatar='$avaidaxx'");

?>
    <form accept-charset="utf-8" method="post" action="?p=avatar">
        <input type="hidden" name="avatar_id" value="<?=$aux['avatar_id'];?>">
        <input type="hidden" name="avatar_level" value="<?=$aux['level'];?>">
        <input type="hidden" name="avatar_moedas" value="<?=$aux['moedas'];?>">
        <input type="hidden" name="avatar_imagem" value="<?=$aux['avatar_imagem'];?>">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3"><center><?=ucfirst($aux['nome']);?></center></strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$aux['avatar_imagem'];?>">
                        <h6 class="text-sm-center mt-2 mb-1">
                            Preço:
                            <i class="ti-money"></i>
                            <span class="count"><?=$aux['moedas'];?></span>
                        </h6>                
                        <h6 class="text-sm-center mt-2 mb-1">
                            Nível:
                            <i class="ti-user"></i>
                            <span class="count"><?=$aux['level'];?></span>
                        </h6>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <?php if(mysqli_num_rows($sqlver)>0){ ?>
                            <button type="submit" name="comprar" class="btn btn btn-outline-secondary btn-sm btn-block" disabled>Comprar</button>
                        <?php }else{ ?>
                            <button type="submit" name="comprar" class="btn btn-outline-success btn-sm btn-block">Comprar</button>
                        <?php } ?>
                    </div>
                    </br>
                    <div class="card-text text-sm-center">
                        <?php if(mysqli_num_rows($srlust)>0){ ?>
                            <button type="submit" name="usar" class="btn btn-primary btn-sm btn-block" disabled>Usar</button>
                        <?php }else{ ?>
                            <button type="submit" name="usar" class="btn btn-primary btn-sm btn-block">Usar</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }else{ ?>
    <div class="col-md-2 opacity">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3"><center><?=ucfirst($aux['nome']);?></center></strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$aux['avatar_imagem'];?>">
                    <h6 class="text-sm-center mt-2 mb-1">
                        Preço:
                        <i class="ti-money"></i>
                        <span class="count"><?=$aux['moedas'];?></span>
                    </h6>                
                    <h6 class="text-sm-center mt-2 mb-1">
                        Nível:
                        <i class="ti-user"></i>
                        <span class="count"><?=$aux['level'];?></span>
                    </h6>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <button type="button" class="btn btn-outline-success btn-sm btn-block" disabled>Comprar</button>
                </div>
                </br>
                <div class="card-text text-sm-center">
                    <button type="button" class="btn btn-primary btn-sm btn-block" disabled>Usar</button>
                </div>
            </div>
        </div>
    </div>
<?php } } ?>
</div>