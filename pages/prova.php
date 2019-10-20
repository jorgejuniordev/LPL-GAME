<?php 



    $rslt_qs = mysqli_query(conexao(), "SELECT * FROM usuarios_aprendizado WHERE id_usuario='".antiinjection($_SESSION['id'])."' AND questionario='ativado' ");
    if(mysqli_num_rows($rslt_qs)!=0){
        $row_rslt_qs = mysqli_fetch_assoc($rslt_qs);
        $sql_prova = mysqli_query(conexao(), "SELECT * FROM aprendizado_questões WHERE id_aula_aprendizado='".$row_rslt_qs['id_aula']."' ORDER BY RAND()");

        require_once("require/prova.php");


?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Prova</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Proof</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<?php    
    if(isset($_GET['msg']) && ($_GET['msg']=='obrigação')){
?> 
    <div class="col-sm-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-danger">Aviso</span>
            Você precisa responder todas questões para acessar o sistema.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php 
    }elseif(isset($success)){ 
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





<form method="post" action="?p=prova">
    <input type="hidden" name="id_aula" value="<?=$row_rslt_qs['id_aula'];?>"/>
    <?php
        $ijk=0;
        $ijl = 0;
        while($row_prova = mysqli_fetch_array($sql_prova)){
            $ijk++;
            $ijl++;
    ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="pb-2 display-5"><?=$ijk;?>ª Questão</h6>
                </div>
                <div class="card-body card-block">
                    <li>
                        <?=$row_prova['questão_enredo'];?>
                    </li>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                            <?php 
                                $array_questões=Array(  
                                    $row_prova['alternativa-01'],
                                    $row_prova['alternativa-02'],
                                    $row_prova['alternativa-03'],
                                    $row_prova['alternativa-04'],
                                    $row_prova['alternativa-05']
                                );

                                shuffle($array_questões);

                                
                                echo "<div class='col-md-12'>".PHP_EOL;
                                echo "<div class='example'>".PHP_EOL;
                                echo "<input type='hidden' name='questão_0".$ijl."' value='".$row_prova['id']."'/>".PHP_EOL;

                                $a = 0;
                                for($i=0; $i<5; $i++){
                                    $a++;
                                    echo "<input type='radio' name='resposta_0".$ijl."' value='".$array_questões[$i]."'/>".PHP_EOL;
                                    echo "<label for='radio'><span><span></span></span>".$array_questões[$i]."</label></br>".PHP_EOL;
                                }
                                echo "</div></div>".PHP_EOL;
                            ?>
                        </tbody>
                        </br>
                    </table>
                </div>
            </div>
        </div>
    <?php 
        }
    ?>
    <div class="card-body text-center">
        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Responder</button>
        <small>Você pode ganhar de 0 a 10 moedas por assistir o vídeo e 20 moedas e até 60 de experiência por cada questão respondida corretamente. Lembrando que as 20 moedas e 60 de experiência só se aplicam se essa for sua primeira vez respondendo a respectiva prova, se essa não for sua primeira vez, você pode ganhar até 25 de experiência e até 35 de moedas. Obs: você não irá perder medalhas caso atinga um rendimento menor. 
</small>
        </br></br></br>
    </div>
</form>

           

<?php 
    }else{
        echo "você não pode acessar essa página sem visualizar a video aula.";
    }
?>