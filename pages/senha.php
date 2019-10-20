<?php

	// REQUIRES;
    include_once 'require/functions_nivel.php';
    include_once 'require/senha.php';
    require_once 'pages/database.php';

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Alterar Senha</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">password</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Alterar senha de usuário</div>
            <div class="card-body card-block">
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
            <div class="fa-hover col-lg-12 col-md-6">
                <div class="tab-content pl-3 p-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h5>Alterar senha</h5>
                        <p>Atualize sua senha.</p>
                        <div class="card-body p-0">
                        <hr>
                        	<form accept-charset="utf-8" method="post" action="?p=senha">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Senha atual
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <input type="password" id="company" name="senha_original" placeholder="Informe sua senha" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nova senha
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <input type="password" id="company" name="senha_nova" placeholder="Informe a nova senha" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Confirmar nova senha
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <input type="password" id="company" name="confirmar" placeholder="Confirme a nova senha" class="form-control">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" name="senha" class="btn btn-success btn-lg btn-block">Salvar</button>
                             </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>