<?php

	// REQUIRES;
	require_once 'require/login.php';

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Página de Login</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
	<div class="card">
	  	<div class="card-header">Formulário de Login</div>
	 	<div class="card-body card-block">
		    <form id="login-form" accept-charset="utf-8" method="post" action="?p=login">
			    <div class="form-group">
			    	<div class="input-group">
			        	<div class="input-group-addon"><i class="fa fa-user"></i></div>
			          	<input type="text" id="nick" name="nick" placeholder="Nome de usuário" autocomplete="off" class="form-control">
			        </div>
			    </div>
			   
		      	<div class="form-group">
		        	<div class="input-group">
		         		<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
		          		<input type="password" id="password" name="password" placeholder="Senha" autocomplete="off" class="form-control">
		        	</div>
		      	</div>		      	
		      	<div class="form-actions form-group">
		      		<center>
		      			<?php if(isset($_GET['msg']) && $_GET['msg']=='msgsuccessregister'){ ?> 
						<div class="col-sm-12">
			                <div class="alert  alert-success alert-dismissible fade show" role="alert">
			                  <span class="badge badge-pill badge-success">Sucesso</span>
			                  	<?=Mensagem($_GET['msg']); ?>
			                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                        <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>
			            </div>
			        	<?php }elseif(isset($msg)){ ?>
							<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
								<span class="badge badge-pill badge-danger">Falha</span>
                                	<?=$msg;?>
                                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    	<span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
						<?php }elseif(isset($_GET['msg']) && $_GET['msg']=='msgsuccesslogout'){ ?>
						<div class="col-sm-12">
			                <div class="alert  alert-warning alert-dismissible fade show" role="alert">
			                  <span class="badge badge-pill badge-warning">Sucesso</span>
			                  	<?=Mensagem($_GET['msg']); ?>
			                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                        <span aria-hidden="true">&times;</span>
			                    </button>
			                </div>
			            </div>
						<?php } ?>
		      		</center>
		      		<button type="submit" name="login" class="btn btn-success btn-lg btn-block">Login</button>
		      	</div>
		    </form>
	  	</div>
	</div>
</div>