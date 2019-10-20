<?php

	// REQUIRES;
    require_once 'require/functions_nivel.php';
    require_once 'require/functions.php';
	include_once 'require/player.php';
    include_once 'database.php';
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Usuários</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Users</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php     
    if(isset($_GET['user'])){
    $user = strip_tags($_GET['user']);
    $sqlxplayer = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE nick='$user'");
    if(mysqli_num_rows($sqlxplayer)>0){ 
        while($dbxplayer = mysqli_fetch_assoc($sqlxplayer)){
            $max = $dbxplayer['exp_max'];
            $exp = $dbxplayer['exp'];
            $rsl = (($max * $exp) / 100);

    $success = MensagemSuccess("playerEncontrado");
    if(isset($success)){ 
?> 
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-success">Sucesso</span>
            <?=$success;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php } ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Visualizar Perfil</div>
            <div class="card-body card-block">
                <div class="fa-hover col-lg-3 col-md-6">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$dbxplayer['avatar'];?>" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1"><?=$dbxplayer['nick']; ?></h5>
                        <div class="text-sm-center"><?=$dbxplayer['nivel']; ?> - <?=nivelNome($dbxplayer['nivel']); ?></div>
                        <div class="progress mb-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?=$rsl;?>%" aria-valuenow="<?=$rsl;?>" aria-valuemin="0" aria-valuemax="<?=$db['exp_max'];?>"><?=$rsl;?>%</div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <?=ucfirst($dbxplayer['tipo_de_conta']);?>
                    </div>
                    <hr>
                </div>
                <div class="fa-hover col-lg-9 col-md-6">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pessoais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estatisticos</a>
                        </li>
                    </ul>
                    <div class="tab-content pl-3 p-1" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledbxplayery="home-tab">
                            <div class="card-body p-0">
                            <hr>
                                <table class="table table-hover table-striped table-align-middle mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Nick
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=ucfirst($dbxplayer['nick']);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nome
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=ucfirst($dbxplayer['nome']);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Sexo
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=ucfirst($dbxplayer['sexo']);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Cidade/UF
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=ucfirst($dbxplayer['cidade']);?> / <?=strtoupper($dbxplayer['uf']);?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledbxplayery="profile-tab">
                            <div class="card-body p-0">
                            <hr>
                                <table class="table table-hover table-striped table-align-middle mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Nivel
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=$dbxplayer['nivel'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Rank
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=nivelNome($dbxplayer['nivel']);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Experiência
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=$dbxplayer['exp'];?>/<?=$dbxplayer['exp_max'];?>
                                            </td>
                                        </tr>                         
                                        <tr>
                                            <td>
                                                Pontos
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=$dbxplayer['pontos'];?> pts
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Moedas
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=$dbxplayer['moedas'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Moedas Faturadras
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <?=$dbxplayer['moedas_faturadas'];?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
        }
    }else{ 
        $error = MensagemError("playerNoEnctr");
    } 
} 
?>
<?php if(isset($error)){ ?> 
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