<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<input type="hidden" class="btn btn-primary btn-lg" class="nav-link" id="show" data-toggle="modal" data-target="#mediumModalLevelUp"/>

<div class="modal fade" id="mediumModalLevelUp" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Parabéns, você avançou de nível!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img align="center" width="50%" src="images/level_up.png"/></br>
                <o></o>
                Além de alcançar o nível <b><?=$db['nivel'];?></b>, você ganhou <b>100</b> moedas.</br>
                E sua stamina voltou para <b>100%</b> de seu potencial.
                <p>
                    <small>
                        "Se a vida está ficando difícil, parabéns! Você está avançando para um próximo nivel".
                        </br>
                         - Afonso Cardozo Neto
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