<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
$liberado2 = FALSE;
$liberado3 = FALSE;
$fim = false;
?>

<div class="text-center">
    <div id="aviso">
        <?php
        if ($mensagem) {
            echo $mensagem;
        }
        ?>
    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <p><strong>Seja bem vindo(a) ao Quiz Literário,</strong></p>

            <p><?php echo $quiz->descricao; ?></p>

<?php echo '<p><strong>Sua pontuação: ' . $pontosUsuario . ' pontos</strong></p>' ?>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <div class="row">
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/inicio.png'); ?>" class="img-responsive"/></div>
        <div class="col-sm-8">
<?php if (empty($gamificacao1)) { ?>
                <a href="<?php echo base_url() . 'index.php/atividade/jogarFase/' . 1; ?>"><img style="width: 100%;" src="<?php echo base_url('include/imagem/fase1jogar.png'); ?>" class="img-responsive"/></a><br>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 style="text-align: center;"><?php echo 'Fase 1: ' . $quiz->tema1; ?></h3>
                    </div>
                </div>

            <?php
            } else {
                $qtdZero = 0;
                foreach ($gamificacao1 as $gamificacao) {
                    if ($gamificacao['pontuacao'] == 0) {
                        $qtdZero++;
                    }
                }

                if ($qtdZero > 1) { //precisa fazer de novo
                    ?>
                    <a href="<?php echo base_url() . 'index.php/atividade/jogarFase/' . '1/true'; ?>"><img style="width: 100%;" src="<?php echo base_url('include/imagem/fase1jogar.png'); ?>" class="img-responsive"/></a>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 style="text-align: center;"><?php echo 'Fase 1: ' . $quiz->tema1; ?></h3>
                        </div>
                    </div>

    <?php } else {
        $liberado2 = TRUE;
        ?>

                    <a href="<?php echo base_url() . 'index.php/atividade/verResposta/' . '1/' . $this->session->userdata('id'); ?>"><img style="width: 100%;" src="<?php echo base_url('include/imagem/fase1resposta.png'); ?>" class="img-responsive"/></a>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 style="text-align: center;"><?php echo 'Fase 1: ' . $quiz->tema1; ?></h3>
                        </div>
                    </div>

    <?php } ?>
<?php } ?>
        </div>
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/setadireita.png'); ?>" class="img-responsive"/></div>
    </div><br>


    <div class="row">
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/setaesquerda.png'); ?>" class="img-responsive"/></div>
        <div class="col-sm-8">
<?php if (empty($gamificacao2) && $liberado2) { ?>
                <a href="<?php echo base_url() . 'index.php/atividade/jogarFase/' . 2; ?>"><img style="width:100%;" src="<?php echo base_url('include/imagem/fase2jogar.png'); ?>" class="img-responsive"/></a>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 style="text-align: center;"><?php echo 'Fase 2: ' . $quiz->tema2; ?></h3>
                    </div>
                </div>

            <?php
            } else {
                $qtdZero = 0;
                foreach ($gamificacao2 as $gamificacao) {
                    if ($gamificacao['pontuacao'] == 0) {
                        $qtdZero++;
                    }
                }

                if ($qtdZero > 1) { //precisa fazer de novo
                    ?>
                    <a href="<?php echo base_url() . 'index.php/atividade/jogarFase/' . '2/true'; ?>"><img style="width:100%;" src="<?php echo base_url('include/imagem/fase2jogar.png'); ?>" class="img-responsive"/></a>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 style="text-align: center;"><?php echo 'Fase 2: ' . $quiz->tema2; ?></h3>
                        </div>
                    </div>

    <?php
    } else {
        if (!$liberado2) {
            //$liberado3 = FALSE; 
            ?>
                        <img style="width:100%;" src="<?php echo base_url('include/imagem/fase2bloqueada.png'); ?>" class="img-responsive"/>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 style="text-align: center;"><?php echo 'Fase 2: ' . $quiz->tema2; ?></h3>
                            </div>
                        </div>

                    <?php } else {
                        $liberado3 = TRUE;
                        ?>
                        <a href="<?php echo base_url() . 'index.php/atividade/verResposta/' . '2/' . $this->session->userdata('id'); ?>"><img style="width: 100%;" src="<?php echo base_url('include/imagem/fase2resposta.png'); ?>" class="img-responsive"/><br></a>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 style="text-align: center;"><?php echo 'Fase 2: ' . $quiz->tema2; ?></h3>
                            </div>
                        </div>

        <?php }
        ?>

    <?php } ?>
<?php } ?>
        </div>
        <div class="col-sm-2"></div>
    </div><br>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <?php if (empty($gamificacao3) && $liberado3) { ?>
                <a href="<?php echo base_url() . 'index.php/atividade/jogarFase/' . 3; ?>"><img style="width:100%;" src="<?php echo base_url('include/imagem/fase3jogar.png'); ?>" class="img-responsive"/></a>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 style="text-align: center;"><?php echo 'Fase 3: ' . $quiz->tema3; ?></h3>
                    </div>
                </div>

<?php
} else {
    $qtdZero = 0;
    foreach ($gamificacao3 as $gamificacao) {
        if ($gamificacao['pontuacao'] == 0) {
            $qtdZero++;
        }
    }

    if ($qtdZero > 1) { //precisa fazer de novo
        ?>
                    <a href="<?php echo base_url() . 'index.php/atividade/jogarFase/' . '3/true'; ?>"><img style="width:100%;" src="<?php echo base_url('include/imagem/fase3jogar.png'); ?>" class="img-responsive"/></a>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 style="text-align: center;"><?php echo 'Fase 3: ' . $quiz->tema3; ?></h3>
                        </div>
                    </div>

    <?php } else {
        if (!$liberado3) {
            ?>
                        <img style="width:100%;" src="<?php echo base_url('include/imagem/fase3bloqueada.png'); ?>" class="img-responsive"/>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 style="text-align: center;"><?php echo 'Fase 3: ' . $quiz->tema3; ?></h3>
                            </div>
                        </div>

                    <?php } else {
                        $fim = true;
                        ?>
                        <a href="<?php echo base_url() . 'index.php/atividade/verResposta/' . '3/' . $this->session->userdata('id'); ?>"><img style="width: 100%;" src="<?php echo base_url('include/imagem/fase3resposta.png'); ?>" class="img-responsive"/><br></a>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 style="text-align: center;"><?php echo 'Fase 3: ' . $quiz->tema3; ?></h3>
                            </div>
                        </div>

        <?php } ?>

    <?php } ?>
<?php } ?>
        </div>
        <div class="col-sm-2"><img style="width: 100%;" src="<?php echo base_url('include/imagem/final.png'); ?>" class="img-responsive"/></div>
    </div>

<?php if ($fim) { ?>
        <br><br>
        <div class="row" style="background-color: greenyellow;">
            <div class="col-sm-12 text-center">
                <strong>Parabéns, você completou todoas as fases do quiz. Agora é só 
                    esperar o resultado final. </strong><br>

                <strong>É PRECISO RESPONDER O QUESTIONÁRIO DE AVALIAÇÃO PARA CONQUISTAR MAIS 
                    10 PONTOS. <a href="<?php echo base_url() . 'index.php/atividade/questionario/'; ?>">RESPONDER QUESTIONÁRIO</a> </strong>
            </div>
        </div>
<?php } ?>

    <br><br>
    <div class="row">
        <div class="col-sm-12 text-center">
            <strong>PLACAR ATUAL: </strong><br>
            <font style="color: red; font-size: 150px"><?php echo $quiz->time1 . ' ' . intval($pontosB); ?></font>
            <font style="color: red; font-size: 100px"><?php echo 'x';
; ?></font>
            <font style="color: red; font-size: 150px"><?php echo intval($pontosC) . ' ' . $quiz->time2; ?></font>
        </div>
    </div>

</div>
<br>

<?php $this->load->view('templates/footer'); ?>
