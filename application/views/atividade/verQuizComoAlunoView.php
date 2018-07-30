<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
$liberado2 = FALSE;
$liberado3 = FALSE;
$fim = false;
?>

<br>

<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <p><strong>Seja bem vindo(a) ao Quiz Literário,</strong></p>

            <p><?php echo $quiz->descricao; ?></p>

            <?php echo '<p><strong>Sua pontuação: 0 pontos</strong></p>' ?>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <div class="row">
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/inicio.png'); ?>" class="img-responsive"/></div>
        <div class="col-sm-8">

            <img style="width: 100%;" src="<?php echo base_url('include/imagem/fase1jogar.png'); ?>" class="img-responsive"/><br>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 style="text-align: center;"><?php echo 'Fase 1: ' . $quiz->tema1; ?></h3>
                </div>
            </div>


        </div>
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/setadireita.png'); ?>" class="img-responsive"/></div>
    </div><br>


    <div class="row">
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/setaesquerda.png'); ?>" class="img-responsive"/></div>
        <div class="col-sm-8">

            <img style="width:100%;" src="<?php echo base_url('include/imagem/fase2jogar.png'); ?>" class="img-responsive"/>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 style="text-align: center;"><?php echo 'Fase 2: ' . $quiz->tema2; ?></h3>
                </div>
            </div>


        </div>
        <div class="col-sm-2"></div>
    </div><br>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <img style="width:100%;" src="<?php echo base_url('include/imagem/fase3jogar.png'); ?>" class="img-responsive"/>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 style="text-align: center;"><?php echo 'Fase 3: ' . $quiz->tema3; ?></h3>
                </div>
            </div>


        </div>
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/final.png'); ?>" class="img-responsive"/></div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-sm-12 text-center">
            <strong>PLACAR ATUAL: </strong><br>
            <font style="color: red; font-size: 150px"><?php echo $quiz->time1 . ' 0'; ?></font>
            <font style="color: red; font-size: 100px"><?php echo 'x';
            ; ?></font>
            <font style="color: red; font-size: 150px"><?php echo '0 ' . $quiz->time2; ?></font>
        </div>
    </div>

</div>
<br>

<?php $this->load->view('templates/footer'); ?>

