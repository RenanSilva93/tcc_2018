<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

echo form_open($funcao);
?>

<div class="form-horizontal">

    <center><h3><?php echo "Escolha o Quiz"; ?></h3></center>
    <br>

    <?php if (isset($quizzes)) { ?>

        <div class="form-inline">
            <label class="col-sm-4" for="quiz">Selecionar Quiz:</label>
            <select class="form-control col-sm-5" name="quiz" id="quiz" required>
                <option value="" selected>Selecione...</option>
                <?php foreach ($quizzes as $quiz) { ?>
                    <option value="<?php echo $quiz['id'] ?>"><?php echo $quiz['nome']; ?></option>
                <?php } ?>
            </select> 
        </div>

        <div class="form-inline">
            <div class="col-sm-12">
                <button class="btn btn-success" type="submit" id="botao-salvar">Próximo</button>

                <div class="btn btn-success">
                    <a href="<?php echo base_url() . 'index.php/atividade/index'; ?>" style="text-decoration: none;  color: white; ">Voltar</a>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>
    É necessário cadastrar quiz.
<?php } ?>
</center>
<?php echo form_close(); ?>
<br>
<br>

<?php $this->load->view('templates/footer'); ?>
