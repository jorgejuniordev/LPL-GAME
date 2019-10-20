<?php if(isset($_GET['wins'])){ ?>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<input type="hidden" class="btn btn-primary btn-lg" class="nav-link" id="show" data-toggle="modal" data-target="#mediumModalLevelUp"/>

<div class="modal fade" id="mediumModalLevelUp" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Parabéns, você respondeu a prova!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img align="center" width="50%" src="images/success.png"/></br>
                <o></o>
                Você ganhou <b><?=$_GET['exp'];?></b> de experiência e <b><?=$_GET['moedas'];?></b> moedas.</br>
                Acertou <b><?=$_GET['corretas'];?></b> questões de <b>5</b> e suas estrelas agora/continuam são/em: <b><?=$_GET['estrelas'];?></b>.
                <p>
                    <small>
                        “Aprender é a única coisa que a mente nunca se cansa, nunca tem medo e nunca se arrepende”.
                    </small>
                </p>
            </div>

        </div>
    </div>
</div>

<!-- Have fun using Bootstrap JS -->
<script type="text/javascript">
    $(window).load(function() {
        $('#show').trigger('click'); 
    });
</script>
<?php } ?>