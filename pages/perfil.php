<?php

	// REQUIRES;
    require_once 'require/functions_nivel.php';
    include_once 'require/perfil.php';
	include_once 'database.php';
    
    // 
    $max = $db['exp_max'];
    $exp = $db['exp'];
    $rsl = (($max * $exp) / 100);

    $sta = 100;
    $stb = $db['stamina'];
    $stl = (($sta * $stb) / 100);

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Perfil</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Visualizar Perfil</div>
        <div class="card-body card-block">
            <div class="fa-hover col-lg-3 col-md-6">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$db['avatar'];?>" alt="Card image cap">
                    <h5 class="text-sm-center mt-2 mb-1"><?=$db['nick']; ?></h5>
                    <div class="text-sm-center"><?=$db['nivel']; ?> - <?=nivelNome($db['nivel']); ?></div>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?=$rsl;?>%" aria-valuenow="<?=$rsl;?>" aria-valuemin="0" aria-valuemax="<?=['exp_max'];?>"><?=$rsl;?>%</div>
                    </div>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$stl;?>%" aria-valuenow="<?=$stl;?>" aria-valuemin="0" aria-valuemax="100"><?=$stl;?></div>
                    </div>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <?=ucfirst($db['tipo_de_conta']);?>
                </div>
                <hr>
                <a href="?p=configurações">
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block">Editar Perfil</button>
                </a>
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
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body p-0">
                        <hr>
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            Nome
                                        </td>
                                        <td>
                                            <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                        </td>
                                        <td>
                                            <?=ucfirst($db['nome']);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            E-mail
                                        </td>
                                        <td>
                                            <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                        </td>
                                        <td>
                                            <?=$db['email'];?>
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
                                            <?=ucfirst($db['sexo']);?>
                                        </td>
                                    </tr>                         
                                    <tr>
                                        <td>
                                            telefone
                                        </td>
                                        <td>
                                            <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                        </td>
                                        <td>
                                            <?=$db['telefone'];?>
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
                                            <?=ucfirst($db['cidade']);?> / <?=strtoupper($db['uf']);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Data de Nascimento
                                        </td>
                                        <td>
                                            <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                        </td>
                                        <td>
                                            <?=$db['data_nascimento'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Data de Cadastro
                                        </td>
                                        <td>
                                            <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                        </td>
                                        <td>
                                            <?=$db['data_cadastro'];?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                            <?=$db['nivel'];?>
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
                                            <?=nivelNome($db['nivel']);?>
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
                                            <?=$db['exp'];?>/<?=$db['exp_max'];?>
                                        </td>
                                    </tr>                         
                                    <tr>
                                        <td>
                                            Stamina
                                        </td>
                                        <td>
                                            <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                        </td>
                                        <td>
                                            <?=$db['stamina'];?>
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
                                            <?=$db['pontos'];?> pts
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
                                            <?=$db['moedas'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Moedas Faturadas
                                        </td>
                                        <td>
                                            <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                        </td>
                                        <td>
                                            <?=$db['moedas_faturadas'];?>
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