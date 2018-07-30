<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <a href="<?php echo base_url() . 'index.php/atividade/index'; ?>" class="btn btn-success">Voltar para o jogo</a>
        </div>

        <div class="col-sm-8 text-center">
            <a href="<?php echo base_url() . 'index.php/atividade/index'; ?>">
                <?php if ($sucesso) { ?>
                    <img style="width: 50%;" src="<?php echo base_url('include/imagem/faseConcluida.png'); ?>" class="img-responsive"/>
                <?php } else { ?>
                    <img style="width: 50%;" src="<?php echo base_url('include/imagem/faseNaoConcluida.png'); ?>" class="img-responsive"/>
                <?php } ?>
            </a>
        </div>

        <div class="col-sm-3">
            <strong>Sua Pontuação: </strong><br>
            <font style="color: red; font-size: 200px"><?php echo $pontuacao; ?></font>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
