<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

if (isset($dados_pergunta)) {
    $edicao = TRUE;
    echo form_open('atividade/inserirPergunta/' . $dados_pergunta->id);
} else {
    $edicao = FALSE;
    echo form_open('atividade/inserirPergunta/');
}
?>

<div class="text-center">
    <div id="aviso">
        <?php
        if (isset($mensagem)) {
            echo $mensagem;
        }
        ?>
    </div>
</div><br>

<div class="container">
    <div class="form-horizontal">

        <center><h3><?php echo "Cadastro de Pergunta"; ?></h3></center>

        <div class="form-inline">
            <label class="col-sm-4" for="descricao">Descrição:</label>
            <textarea class="form-control col-sm-5" id="descricao" name="descricao" cols="5" rows="5" required><?php echo ($edicao) ? $dados_pergunta->descricao : set_value('descricao'); ?></textarea>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="valor">Valor da questão:</label>
            <input class="form-control col-sm-5" id="valor" name="valor" type="number" value="<?php echo ($edicao) ? $dados_pergunta->valor : set_value('valor'); ?>" required/>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="fase">Fase:</label>
            <input class="form-control col-sm-5" id="fase" name="fase" type="number" value="<?php echo ($edicao) ? $dados_pergunta->nivel : set_value('nivel'); ?>" required/>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="certa">Alternativa Certa:</label>
            <textarea class="form-control col-sm-5" id="certa" name="certa" cols="5" rows="5" required><?php echo ($edicao) ? $dados_pergunta->alternativa_certa : set_value('alternativa_certa'); ?></textarea>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="alternativa1">Alternativa 1: </label>
            <textarea class="form-control col-sm-5" id="alternativa1" name="alternativa1" cols="5" rows="2" required><?php echo ($edicao) ? $dados_pergunta->alternativa1 : set_value('alternativa1'); ?></textarea>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="alternativa2">Alternativa 2: </label>
            <textarea class="form-control col-sm-5" id="alternativa2" name="alternativa2" cols="5" rows="2" required><?php echo ($edicao) ? $dados_pergunta->alternativa2 : set_value('alternativa2'); ?></textarea>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="alternativa3">Alternativa 3: </label>
            <textarea class="form-control col-sm-5" id="alternativa3" name="alternativa3" cols="5" rows="2" required><?php echo ($edicao) ? $dados_pergunta->alternativa3 : set_value('alternativa3'); ?></textarea>
        </div>

        <div class="form-inline">
            <label class="col-sm-4" for="ativo">Ativo: </label>
            <select class="form-control col-sm-5" name="ativo" id="ativo" required>
                <?php if ($edicao) {
                    if ($dados_pergunta->ativo) {
                        ?>
                        <option value="<?php echo TRUE; ?>" selected >SIM</option>
                        <option value="<?php echo FALSE; ?>">NÃO</option>
                    <?php } else { ?>
                        <option value="<?php echo TRUE; ?>">SIM</option>
                        <option value="<?php echo FALSE; ?>" selected >NÃO</option>
    <?php }
} else {
    ?>
                    <option value="<?php echo TRUE; ?>">SIM</option>
                    <option value="<?php echo FALSE; ?>">NÃO</option>
<?php } ?>
            </select> 
        </div>

        <input type="hidden" name="quiz" id="quiz" value="<?php echo $quiz; ?>">

        <div class="form-inline">
            <div class="col-sm-12">
                <button class="btn btn-success" type="submit" id="botao-salvar">Salvar</button>

                <div class="btn btn-success">
                    <a href="<?php echo base_url() . 'index.php/atividade/index'; ?>" style="text-decoration: none;  color: white; ">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<?php echo form_close(); ?>

<?php $this->load->view('templates/footer'); ?>

