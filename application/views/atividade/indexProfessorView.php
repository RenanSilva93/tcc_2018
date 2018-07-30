<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

?>

<script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

<div class="container">
<div class="row">
        <div class="col-md-2">
            <a href="<?php echo base_url() . 'index.php/atividade/cadastrarQuiz'; ?>"><img src="<?php echo base_url('include/imagem/botaoCadastrarQuiz.png') ?>" alt="Cadastrar Quiz" class="img-responsive" style="width: 100%;height: 160px"></a>
        </div>
    
        <div class="col-md-2">
            <a href="<?php echo base_url() . 'index.php/atividade/cadastrarPerguntaToProfessor'; ?>"><img src="<?php echo base_url('include/imagem/botaoCadastrarPergunta.png') ?>" alt="Cadastrar Pergunta" class="img-responsive" style="width: 100%;height: 160px "></a>
        </div>
        
        <div class="col-md-2">
            <a href="<?php echo base_url() . 'index.php/atividade/verListaPergunta'; ?>"><img src="<?php echo base_url('include/imagem/botaoListarPergunta.png') ?>" alt="Listar Perguntas" class="img-responsive" style="width: 100%;height: 160px"></a>
        </div>
    
        <div class="col-md-2">
            <a href="<?php echo base_url() . 'index.php/usuario/cadastrarUsuarioToProfessor'; ?>"><img src="<?php echo base_url('include/imagem/botaoCadastrarUsuario.png') ?>" alt="Cadastrar Usuário" class="img-responsive" style="width: 100%; height: 160px"></a>
        </div>
        
        <div class="col-md-2">
           <a href="<?php echo base_url() . 'index.php/usuario/verQuizComoAluno'; ?>"><img src="<?php echo base_url('include/imagem/verQuiz.png') ?>" alt="Ver Quiz" class="img-responsive" style="width: 100%;height: 160px"></a>
        </div>
        <div class="col-md-2">
            <!--<a href="https://www.instagram.com/botafogooficial/?hl=pt-br" target="_blank"><img src="<?php echo base_url('include/imagem/instagrambotafogo.png') ?>" alt="Instagram do Botafogo" class="img-responsive" style="width: 100%;height: 160px"></a>-->
        </div>
    </div>

<?php if (!empty($quizzes)) { ?>
    <div class="table-responsive">
        <table id="tabelaPergunta" border="1" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tema 1</th>
                    <th>Tema 2</th>
                    <th>Tema 3</th>
                    <th>Time 1</th>
                    <th>Time 2</th>
                    <th>Ativo</th>
                    <th>Editar</th>
                    
                </tr>
            <thead>
            <tbody>
                <?php foreach ($quizzes as $quiz) { ?>
                    <tr>
                        <td><?php echo $quiz['nome']; ?></td>
                        <td><?php echo $quiz['tema1']; ?></td>
                        <td><?php echo $quiz['tema2']; ?></td>
                        <td><?php echo $quiz['tema3']; ?></td>
                        <td><?php echo $quiz['time1']; ?></td>
                        <td><?php echo $quiz['time2']; ?></td>
                        
                        <td><?php if($quiz['ativo']) {
                            echo 'SIM';
                        } else {
                            echo 'NÃO';
                            } ?></td>
                        <td><a href="<?php echo site_url('atividade/editarQuiz/' . $quiz['id']) ?>" title='Editar'>Editar</a></td>
                        
                    </tr>
    <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div id='alertas'>
        Não há quizzes cadastrados.
    </div>
<?php } ?>
</div><br><br>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tabelaPergunta").DataTable();
    });
</script>

<?php $this->load->view('templates/footer'); ?>


