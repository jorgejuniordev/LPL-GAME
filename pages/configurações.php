<?php

	// REQUIRES;
    include_once 'require/functions_nivel.php';
    include_once 'require/configurações.php';
    require_once 'pages/database.php';

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Configurações</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">settings</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Alterar configurações do perfil de usuário</div>
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
                <div class="card-body card-block">
                <div class="fa-hover col-lg-3 col-md-6">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$db['avatar'];?>" alt="Card image cap">
                    </div>
                    <hr>
                    <a href="?p=avatar">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Alterar Avatar</button>
                    </a>
                    <hr>
                </div>



                <div class="fa-hover col-lg-9 col-md-6">
                    <div class="tab-content pl-3 p-1" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h5>Alterar configurações</h5>
                            <p>Atualize seus dados de cadastro.</p>
                            <div class="card-body p-0">
                            <hr>
                            	<form accept-charset="utf-8" method="post" action="?p=configurações">
	                                <table class="table">
	                                    <tbody>
	                                        <tr>
	                                            <td>
	                                                Nome
	                                            </td>
	                                            <td>
	                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
	                                            </td>
	                                            <td>
	                                                <input type="text" id="company" name="nome" placeholder="<?=isset($db['nome']) ? ucfirst($db['nome']) : 'Informe seu nome';?>" class="form-control" value="<?=isset($db['nome']) ? ucfirst($db['nome']) : '';?>">
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
	                                                <input type="text" id="company" name="email" placeholder="<?=isset($db['email']) ? $db['email'] : 'Informe seu email';?>" class="form-control" value="<?=isset($db['email']) ? $db['email'] : '';?>">
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
	                                                <select name="sexo" id="select" class="form-control">
	                                                    <option value="Indefinido" <?=$db['sexo']=='Indefinido' ? 'selected' : '';?>>Indefinido</option>
	                                                    <option value="Masculino" <?=$db['sexo']=='Masculino' ? 'selected' : '';?>>Masculino</option>
	                                                    <option value="Feminino" <?=$db['sexo']=='Feminino' ? 'selected' : '';?>>Feminino</option>
	                                                  </select>
	                                            </td>
	                                        </tr>                         
	                                        <tr>
	                                            <td>
	                                                Telefone
	                                            </td>
	                                            <td>
	                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
	                                            </td>
	                                            <td>
	                                                <input type="text" id="company" name="telefone" placeholder="<?=isset($db['telefone']) ? $db['telefone'] : 'Informe seu telefone';?>" class="form-control" value="<?=isset($db['telefone']) ? $db['telefone'] : '';?>">
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td>
	                                                Cidade
	                                            </td>
	                                            <td>
	                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
	                                            </td>
	                                            <td>
	                                                <input type="text" id="company" name="cidade" placeholder="<?=isset($db['cidade']) ? $db['cidade'] : 'Informe o nome de sua cidade';?>" class="form-control" value="<?=isset($db['cidade']) ? ucfirst($db['cidade']) : '';?>">
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td>
	                                                UF/Estado
	                                            </td>
	                                            <td>
	                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
	                                            </td>
	                                            <td>
	                                                <select name="uf" id="select" class="form-control">
	                                                    <option value="AC" <?=$db['uf']=='AC' ? 'selected' : '';?>>Acre</option>
	                                                    <option value="AL" <?=$db['uf']=='AL' ? 'selected' : '';?>>Alagoas</option>
	                                                    <option value="AP" <?=$db['uf']=='AP' ? 'selected' : '';?>>Amapá</option>
	                                                    <option value="AM" <?=$db['uf']=='AM' ? 'selected' : '';?>>Amazonas</option>
	                                                    <option value="BA" <?=$db['uf']=='BA' ? 'selected' : '';?>>Bahia</option>
	                                                    <option value="CE" <?=$db['uf']=='CE' ? 'selected' : '';?>>Ceará</option>
	                                                    <option value="DF" <?=$db['uf']=='DF' ? 'selected' : '';?>>Distrito Federal</option>
	                                                    <option value="ES" <?=$db['uf']=='ES' ? 'selected' : '';?>>Espírito Santo</option>
	                                                    <option value="GO" <?=$db['uf']=='GO' ? 'selected' : '';?>>Goiás</option>
	                                                    <option value="MA" <?=$db['uf']=='MA' ? 'selected' : '';?>>Maranhão</option>
	                                                    <option value="MT" <?=$db['uf']=='MT' ? 'selected' : '';?>>Mato Grosso</option>
	                                                    <option value="MS" <?=$db['uf']=='MS' ? 'selected' : '';?>>Mato Grosso do Sul</option>
	                                                    <option value="MG" <?=$db['uf']=='MG' ? 'selected' : '';?>>Minas Gerais</option>
	                                                    <option value="PA" <?=$db['uf']=='PA' ? 'selected' : '';?>>Pará</option>
	                                                    <option value="PB" <?=$db['uf']=='PB' ? 'selected' : '';?>>Paraíba</option>
	                                                    <option value="PR" <?=$db['uf']=='PR' ? 'selected' : '';?>>Paraná</option>
	                                                    <option value="PE" <?=$db['uf']=='PE' ? 'selected' : '';?>>Pernambuco</option>
	                                                    <option value="PI" <?=$db['uf']=='PI' ? 'selected' : '';?>>Piauí</option>
	                                                    <option value="RJ" <?=$db['uf']=='RJ' ? 'selected' : '';?>>Rio de Janeiro</option>
	                                                    <option value="RN" <?=$db['uf']=='RN' ? 'selected' : '';?>>Rio Grande do Norte</option>
	                                                    <option value="RS" <?=$db['uf']=='RS' ? 'selected' : '';?>>Rio Grande do Sul</option>
	                                                    <option value="RO" <?=$db['uf']=='RO' ? 'selected' : '';?>>Rondônia</option>
	                                                    <option value="RR" <?=$db['uf']=='RR' ? 'selected' : '';?>>Roraima</option>
	                                                    <option value="SC" <?=$db['uf']=='SC' ? 'selected' : '';?>>Santa Catarina</option>
	                                                    <option value="SP" <?=$db['uf']=='SP' ? 'selected' : '';?>>São Paulo</option>
	                                                    <option value="SE" <?=$db['uf']=='SE' ? 'selected' : '';?>>Sergipe</option>
	                                                    <option value="TO" <?=$db['uf']=='TO' ? 'selected' : '';?>>Tocantins</option>
	                                                </select>
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
	                                                <input type="date" id="company" name="data_nascimento" placeholder="<?=isset($db['data_nascimento']) ? $db['data_nascimento'] : 'Informe sua data de nascimento';?>" class="form-control" value="<?=isset($db['data_nascimento']) ? $db['data_nascimento'] : '';?>">
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td>
	                                                Senha
	                                            </td>
	                                            <td>
	                                                <basix-switch type="3d" variant="primary" size="lg" :checked="true"/>
	                                            </td>
	                                            <td>
	                                                <a href="?p=senha">
	                                                    <button type="button" name="config" class="btn btn-outline-success btn-sm btn-block ">Alterar senha</button>
	                                                </a>
	                                            </td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                                <button type="submit" name="config" class="btn btn-success btn-lg btn-block">Salvar</button>
	                             </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>