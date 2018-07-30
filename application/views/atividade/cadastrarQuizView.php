<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

if(isset($dados_quiz)) {
    $edicao = TRUE;
    echo form_open('atividade/inserirQuiz/'.$dados_quiz->id);
} else {
    $edicao = FALSE;
    echo form_open('atividade/inserirQuiz/');
}

?>

<div class="text-center">
    <div id="aviso">
        <?php if(isset($mensagem)) {
            echo $mensagem;
        } ?>
    </div>
</div><br>

<div class="container">
    <div class="form-horizontal">
    
    <center><h3><?php echo "Cadastrar Quiz"; ?></h3></center>
    
    <div class="form-inline">
        <label class="col-sm-4" for="nome">Nome:</label>
        <input class="form-control col-sm-5" id="nome" name="nome" type="text" value="<?php echo ($edicao) ? $dados_quiz->nome : set_value('nome'); ?>" required/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="descricao">Descrição:</label>
        <textarea class="form-control col-sm-5" id="descricao" name="descricao" cols="5" rows="5" required><?php echo ($edicao) ? $dados_quiz->descricao : set_value('descricao'); ?></textarea>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="tema">Tema 1:</label>
        <input class="form-control col-sm-5" id="tema1" name="tema1" type="text" value="<?php echo ($edicao) ? $dados_quiz->tema1 : set_value('tema1'); ?>" required/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="tema">Tema 2:</label>
        <input class="form-control col-sm-5" id="tema2" name="tema2" type="text" value="<?php echo ($edicao) ? $dados_quiz->tema2 : set_value('tema2'); ?>" required/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="tema">Tema 3:</label>
        <input class="form-control col-sm-5" id="tema3" name="tema3" type="text" value="<?php echo ($edicao) ? $dados_quiz->tema3 : set_value('tema3'); ?>" required/>
    </div>
    
    <?php if(!$edicao) {?>
        <div class="form-inline">
            <label class="col-sm-4" for="time">Nome Time 1:</label>
            <input class="form-control col-sm-5" id="time1" name="time1" type="text" value="<?php echo ($edicao) ? $dados_quiz->time1 : set_value('time1'); ?>" required/>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="time">Nome Time 2:</label>
            <input class="form-control col-sm-5" id="time2" name="time2" type="text" value="<?php echo ($edicao) ? $dados_quiz->time2 : set_value('time2'); ?>" required/>
        </div>
    <?php } ?>
    
    <div class="form-inline">
        <label class="col-sm-4" for="ativo">Ativo: </label>
            <select class="form-control col-sm-5" name="ativo" id="ativo" required>
                <?php if($edicao) {
                    if($dados_quiz->ativo) { ?>
                        <option value="<?php echo TRUE; ?>" selected >SIM</option>
                        <option value="<?php echo FALSE; ?>">NÃO</option>
                    <?php } else { ?>
                        <option value="<?php echo TRUE; ?>">SIM</option>
                        <option value="<?php echo FALSE; ?>" selected >NÃO</option>
                   <?php }
                } else { ?>
                    <option value="<?php echo TRUE; ?>">SIM</option>
                    <option value="<?php echo FALSE; ?>">NÃO</option>
                <?php } ?>
            </select> 
    </div>

    <div class="form-inline">
        <div class="col-sm-12">
            <button class="btn btn-success" type="submit" id="botao-salvar">Salvar</button>
			
            <div class="btn btn-success">
                    <a href="<?php echo base_url().'index.php/atividade/index'; ?>" style="text-decoration: none;  color: white; ">Voltar</a>
            </div>
        </div>
    </div>
</div>
    </div>
<br>

<?php echo form_close(); ?>

<?php $this->load->view('templates/footer'); ?>

