<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>

<div class="ranking">
    <img width="100%" src="<?php echo base_url('include/imagem/ranking.png'); ?>" class="img-responsive"/>
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <tbody>
    <?php for($i=1; $i<11; $i++) { 
        if($i % 2 == 0) {?>
                <tr>
                    <td>Conteúdo</td>
          <td>Conteúdo</td>
          <td>Conteúdo</td>
                </tr>
        <?php } else { ?>
                <tr>
                    <td>Conteúdo</td>
          <td>Conteúdo</td>
          <td>Conteúdo</td>
                </tr>
    <?php }
    }?>
        <tbody></table></div>
</div> <br>

<div class="ranking">
    <img width="100%" src="<?php echo base_url('include/imagem/ranking.png'); ?>" class="img-responsive"/>
    <?php for($i=1; $i<11; $i++) { 
        if($i % 2 == 0) {?>
    <div class="nome_ranking_par">
    <img style="width:10%; padding: 3px" src="<?php echo base_url('include/imagem/'.$i.'.png'); ?>" class="img-responsive"/>
    <font style="color: white; font-size: 1em;"><?php echo 'Nome do aluno'; ?></font>  
    <!--<div class="nome_ranking_par">
                <img style="width:10%; height:30px; padding: 3px" src="<?php //echo base_url('include/imagem/'.$i.'.png'); ?>"/>
                <font style="color: white"><?php //echo 'Nome do aluno'; ?></font>
                <div class="ponto_ranking"><?php //echo 'X pontos'; ?></div>
            </div>-->
            </div>
        <?php } else { ?>
    <div class="nome_ranking_impar">
            <img style="width:10%; padding: 3px" src="<?php echo base_url('include/imagem/'.$i.'.png'); ?>" class="img-responsive"/>
            <font style="color: white"><?php //echo 'Nome do aluno'; ?></font>
            <!--<div class="nome_ranking_impar">
                <img style="width:10%; height:30px; padding: 3px" src="<?php //echo base_url('include/imagem/'.$i.'.png'); ?>"/>
                <font style="color: white"><?php //echo 'Nome do aluno'; ?></font>
            </div>-->
            </div>
    <?php }
    }?>
</div> <br>

<?php $this->load->view('templates/footer'); ?>
