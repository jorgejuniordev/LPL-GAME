<?php 

    // REQUIRES;
    include_once('require/mensagens_enviar.php');

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


<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Enviar mensagens</div>
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
                            <form accept-charset="utf-8" method="post" action="?p=mensagens_enviar">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Nick do destinatário
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="company" name="nick" placeholder="Nick do usuário" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Assunto
                                            </td>
                                            <td>
                                                <basix-switch type="30" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <input type="text" id="company" name="assunto" placeholder="Assunto" maxlength="20" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Mensagem
                                            </td>
                                            <td>
                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
                                            </td>
                                            <td>
                                                <textarea name="mensagem" id="textarea-input" rows="9" placeholder="Mensagem..." class="form-control"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" name="enviar" class="btn btn-success btn-lg btn-block">Enviar</button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>