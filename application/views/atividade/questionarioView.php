<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

echo form_open('atividade/responderQuestionario/');

?>
<div id="corpo" style="background: url(<?php echo base_url('include/imagem/capaQuestionario.png'); ?>)">

<div class="text-center">
    <div id="aviso">
        <?php if($mensagem) {
            echo $mensagem;
        } ?>
    </div>
</div><br>


<center><h3><?php echo 'Pesquisa de Avaliação'; ?></h3></center>

<div class="container" style="background-color: white; padding-left: 30px">
    <div class="row">
        <strong> <?php echo 'Pergunta 1'; ?> </strong> <?php echo ': Você gostou de participar desse quiz? '; ?>
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg1" value="sim"> Sim.
    </div><br>

    <div class="row">
        <input type="radio" name="perg1" value="nao"> Não.
    </div><br>

    <div class="row">
        <input type="radio" name="perg1" value="naosei"> Não sei responder.
    </div><br>
    
    <div class="row">
        <strong> <?php echo 'Pergunta 2'; ?> </strong> <?php echo ': Teve dificuldade em usar o sistema? '; ?> 
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg2" value="sim"> Sim, bastante.
    </div><br>

    <div class="row">
        <input type="radio" name="perg2" value="pouco"> Um pouco.
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg2" value="nenhuma"> Nenhuma dificuldade.
    </div><br>

    <div class="row">
        <input type="radio" name="perg2" value="naosei"> Não sei responder.
    </div><br>
    
    <div class="row">
        <strong> <?php echo 'Pergunta 3'; ?> </strong> <?php echo ': Você acessa a internet com que frequência? '; ?> 
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg3" value="todos"> Todos os dias.
    </div><br>

    <div class="row">
        <input type="radio" name="perg3" value="5dias"> Pelo menos 5 dias da semana.
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg3" value="3dias"> Pelo menos 3 dias da semana.
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg3" value="1dia"> 1 dia da semana.
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg3" value="nao"> Não tenho acesso a internet.
    </div><br>

    <div class="row">
        <input type="radio" name="perg3" value="naosei"> Não sei responder.
    </div><br>
    
    <div class="row">
        <strong> <?php echo 'Pergunta 4'; ?> </strong> <?php echo ': Você se sentiu mais motivado em realizar '
        . 'esta atividade? '; ?> 
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg4" value="sim"> Sim.
    </div><br>

    <div class="row">
        <input type="radio" name="perg4" value="nao"> Não.
    </div><br>

    <div class="row">
        <input type="radio" name="perg4" value="naosei"> Não sei responder.
    </div><br>
    
    <div class="row">
        <strong> <?php echo 'Pergunta 5'; ?> </strong> <?php echo ': Que nota você daria para esta atividade? '; ?> 
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg5" value="5"> 5
    </div><br>

    <div class="row">
        <input type="radio" name="perg5" value="4"> 4
    </div><br>

    <div class="row">
        <input type="radio" name="perg5" value="3"> 3
    </div><br>
    
    <div class="row">
        <input type="radio" name="perg5" value="2"> 2
    </div><br>

    <div class="row">
        <input type="radio" name="perg5" value="1"> 1
    </div><br>
    
    <div class="row">
        <strong> <?php echo 'Deseja escrever uma sugestão, crítica ou opinião?'; ?> </strong>
    </div><br>
    
    <div class="row">
        <textarea class="form-control col-sm-5" id="texto" name="texto" cols="100" rows="5"></textarea>
    </div><br>

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

