<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

echo form_open('atividade/responderQuiz/');

?>
<div id="corpo" style="background: url(<?php echo base_url('include/imagem/capa'.$nivel.'.png'); ?>)">
<input type="hidden" name="<?php echo 'denovo'; ?>" value="<?php echo $denovo; ?>">
<center><h3><?php echo 'Fase '.$nivel.' - '.$texto; ?></h3></center>

<div class="container" style="background-color: white; padding-left: 30px">
    <?php $i=1; $j=0;
    
    $num = array();
    while($i < 4) {    
    $rand = rand(0, count($perguntas)-1);
    if(in_array($rand, $num)) {
        $i = $i - 1;
    } else {
    $num[$j++] = $rand;?>
    <div class="row">
        <strong>Pergunta <?php echo $i; ?>: </strong><br> <?php echo $perguntas[$rand]['descricao'] ?>       
    </div><br>
    
    <?php $k = 1;$l=0;
    $perg = array();
    while($k < 5) {
        $rand2 = rand(1, 4);
        if(in_array($rand2, $perg)) {
        $k = $k - 1;
        } else {
        $perg[$l++] = $rand2;
        if($rand2 == 1) { ?>
            <div class="row">
        <input type="radio" name="<?php echo $i; ?>" value="<?php echo $i.'1'; ?>"> <?php echo $perguntas[$rand]['alternativa1'] ?>
        </div><br>
        <?php } else if($rand2 == 2) {?>
            <div class="row">
        <input type="radio" name="<?php echo $i; ?>" value="<?php echo $i.'2'; ?>"> <?php echo $perguntas[$rand]['alternativa2'] ?>
        </div><br>
        <?php } else if($rand2 == 3) {?>
        <div class="row">
        <input type="radio" name="<?php echo $i; ?>" value="<?php echo $i.'3'; ?>"> <?php echo $perguntas[$rand]['alternativa3'] ?>
        </div><br>
        <?php } else if($rand2 == 4) {?>
        <div class="row">
        <input type="radio" name="<?php echo $i; ?>" value="<?php echo $i.'4'; ?>"> <?php echo $perguntas[$rand]['alternativa_certa'] ?>
        </div><br>
         <?php }?>
        <?php }
        $k++;
    } ?>
        <input type="hidden" name="<?php echo $i.'Pergunta'; ?>" value="<?php echo $perguntas[$rand]['id']; ?>">
        <input type="hidden" name="<?php echo $i.'Valor'; ?>" value="<?php echo $perguntas[$rand]['valor']; ?>">
        <input type="hidden" name="<?php echo $i.'Nivel'; ?>" value="<?php echo $perguntas[$rand]['nivel']; ?>">
    
    <?php }
    $i++;
    
    } ?>
</div>

<br>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 text-center">
        <button class="btn btn-success" type="submit" id="botao-salvar">Responder Todas as Perguntas</button>
    </div>
    <div class="col-sm-2"></div>
</div><br>
<?php echo form_close(); ?>
</div>
<?php $this->load->view('templates/footer'); ?>
