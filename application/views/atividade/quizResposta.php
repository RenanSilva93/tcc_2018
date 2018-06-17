<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

?>

<center><h3><?php echo 'Fase '.$nivel.' - Pontuação conquistada: '.$soma.' pontos' ; ?></h3></center>

<div class="container">
    <?php $i=0; $z = 1;
    
    while($i < 3) { ?>
    <div class="row">
        <strong>Pergunta <?php echo $z++; ?>: </strong><br> <?php echo $perguntas[$i]->descricao; ?>       
    </div><br>
   
    
        <?php if($gamificacao[$i]['resposta'] == 11 || $gamificacao[$i]['resposta'] == 21 || 
                $gamificacao[$i]['resposta'] == 31) { ?>
    <div class="row" style="background-color: #B22222">
        <input type="radio" checked > <?php echo $perguntas[$i]->alternativa1 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa2 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa3 ?>
        </div><br>
        <div class="row" style="background-color: #90EE90">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa_certa ?>
        </div><br>
        <?php } else if($gamificacao[$i]['resposta'] == 12 || $gamificacao[$i]['resposta'] == 22 || 
                $gamificacao[$i]['resposta'] == 32) {?>
        <div class="row" style="background-color: #B22222">
        <input type="radio" checked > <?php echo $perguntas[$i]->alternativa2 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa1 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa3 ?>
        </div><br>
        <div class="row" style="background-color: #90EE90">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa_certa ?>
            </div><br>
        <?php } else if($gamificacao[$i]['resposta'] == 13 || $gamificacao[$i]['resposta'] == 23 || 
                $gamificacao[$i]['resposta'] == 33) {?>
            <strong>Você errou esta pergunta.</strong> <br>
        <div class="row" style="background-color: #B22222">
        <input type="radio" checked > <?php echo $perguntas[$i]->alternativa3 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa2 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa1 ?>
        </div><br>
        <div class="row" style="background-color: #90EE90">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa_certa ?>
        </div><br>
        <?php } else if($gamificacao[$i]['resposta'] == 14 || $gamificacao[$i]['resposta'] == 24 || 
                $gamificacao[$i]['resposta'] == 34 ) { ?>
        <strong>Você acertou essa pergunta. Parabéns!!</strong> <br>
        <div class="row" style="background-color: #90EE90">
        <input type="radio" checked > <?php echo $perguntas[$i]->alternativa_certa ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa2 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa3 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa1 ?>
        </div><br>
         <?php } else {?>
        <font style="color: #B22222">Não respondeu a esta pergunta.</font>
        <br>
        <strong>A resposta certa era esta.</strong> <br>
        <div class="row" style="background-color: #90EE90">
        <input type="radio"> <?php echo $perguntas[$i]->alternativa_certa ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa2 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa3 ?>
        </div><br>
        <div class="row">
        <input type="radio" > <?php echo $perguntas[$i]->alternativa1 ?>
        </div><br>
         <?php } $i++; } ?>
</div>

<?php $this->load->view('templates/footer'); ?>
