<?php 

	//include
	include_once("require/functions.php");
	include_once("database.php");

	if(isset($_GET['id'])){
		$id = strip_tags($_GET['id']);

		$sql_apraula = mysqli_query(conexao(), "SELECT * FROM modo_aprendizado WHERE id_aula='".$id."'");
		$sql_apraul2 = mysqli_query(conexao(), "SELECT * FROM usuarios_aprendizado WHERE id_usuario='".$db['id']."' AND id_aula='".$id."'");
		$sql_apraul3 = mysqli_query(conexao(), "SELECT * FROM usuarios_aprendizado WHERE id_usuario='".$db['id']."' AND id_aula='".$id."' AND questionario='desativado'");


		if(mysqli_num_rows($sql_apraula)>0){

			if(isset($_POST['iniciar_enabled'])){
			    if(mysqli_num_rows($sql_apraul3)>0){
				    mysqli_query(conexao(), "UPDATE usuarios_aprendizado SET questionario='ativado' WHERE id_usuario='".$db['id']."' AND id_aula='".$id."' AND questionario='desativado'");
				    retorno("aprendizadoProva");
				}
			}

			$row = mysqli_fetch_assoc($sql_apraula);

			if(mysqli_num_rows($sql_apraul2)==0){
		        mysqli_query(conexao(), "INSERT INTO usuarios_aprendizado(id_usuario, id_aula, estrelas, liberação, questionario) VALUES ('".$db['id']."', '$id', '0', 'sim', 'ativado')");
		    }

?>
<div class="animated fadeIn">
	<div class="col-lg-12">
	    <div class="card">
			<div class="card-header">
			    <strong style="text-transform:uppercase">Aula <?=$row['id_aula'];?></strong>
			    <small><b><?=$row['titulo'];?></b></small></br>
			    <small><?=$row['subtitulo'];?></small>
			</div>
			<form method="post" action="#">
				<div class="card-body card-block">
					<br>
		            <center>
						<video id="video_ctrl" width="70%" controls>
							<source src="<?=$row['video'];?>" type="video/mp4" />
						</video>
						</br>
						<small>Obs.: Ao finalizar o vídeo o botão de questões será liberado.</small>
						<hr>
							<button type="submit" id="iniciar_disabled" class="btn btn-secundary btn-block" disabled>Iníciar Prova</button>
							<button type="submit" name="iniciar_enabled" id="iniciar_enabled" class="btn btn-success btn-block">Iníciar Prova</button>
						<br>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>/*<![CDATA[*/
  $(document).ready(function(){
  	$('#iniciar_enabled').hide();
    $('video').on('ended',function(){
	  $('#iniciar_disabled').hide();
	  $('#iniciar_enabled').show();
    });
  });
/*]]>*/
</script>
<?php 
		}else{
			retorno('aprendizadoRetornoFalhaId');
		}
	}else{
		retorno('aprendizadoRetornoFalhaId');
	} 

?>