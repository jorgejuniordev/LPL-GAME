<?php

    // REQUIRES;
    require_once 'require/cadastro.php';
	
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Página de Cadastro</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Register</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
	<div class="card">
	  	<div class="card-header">Formulário de Cadastro</div>
	 	<div class="card-body card-block">
		    <form id="login-form" accept-charset="utf-8" method="post" action="?p=cadastro">
			    <div class="form-group">
			    	<div class="input-group">
			        	<div class="input-group-addon"><i class="fa fa-user"></i></div>
			          	<input type="text" id="nick" name="nick" placeholder="Nome de usuário" class="form-control">
			        </div>
			    </div>
			    <div class="form-group">
			    	<div class="input-group">
			        	<div class="input-group-addon"><i class="fa fa-user"></i></div>
			          	<input type="text" id="nome" name="nome" placeholder="Nome Completo" class="form-control">
			        </div>
			    </div>
		    	<div class="form-group">
		        	<div class="input-group">
		         		<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
		          		<input type="email" id="email" name="email" placeholder="E-mail" class="form-control">
		        	</div>
		      	</div>
		      	<div class="form-group">
		        	<div class="input-group">
		         		<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
		          		<input type="password" id="password" name="password" placeholder="Senha" class="form-control">
		        	</div>
		      	</div>		      	
		      	<div class="form-group">
		        	<div class="input-group">
		         		<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
		          		<input type="password" id="password" name="password-confirm" placeholder="Confirmar Senha" class="form-control">
		        	</div>
		      	</div>
		      	<div class="form-actions form-group">
		      		<center>
		      			<?php if(isset($msg)){ ?>
							<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
								<span class="badge badge-pill badge-danger">Falha</span>
                                	<?=$msg;?>
                                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    	<span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
						<?php } ?>
		      			<button type="submit" name="cadastro" class="btn btn-success btn-lg btn-block">Cadastrar</button>
		      		</center>
		      	</div>
		    </form>
	  	</div>
	</div>
</div>