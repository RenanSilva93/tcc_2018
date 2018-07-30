<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header'); ?>

<script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

<div class="container">
<?php if (!empty($perguntas)) { ?>
    <div class="table-responsive">
        <table id="tabelaPergunta" border="1" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Fase</th>
                    <th>Resposta Certa</th>
                    <th>Alternativa 1</th>
                    <th>Alternativa 2</th>
                    <th>Alternativa 3</th>
                    <th>Ativo</th>
                    <th>Editar</th>
                    
                </tr>
            <thead>
            <tbody>
                <?php foreach ($perguntas as $pergunta) { ?>
                    <tr>
                        <td><?php echo $pergunta['descricao']; ?></td>
                        <td><?php echo $pergunta['valor']; ?></td>
                        <td><?php echo $pergunta['nivel']; ?></td>
                        <td><?php echo $pergunta['alternativa_certa']; ?></td>
                        <td><?php echo $pergunta['alternativa1']; ?></td>
                        <td><?php echo $pergunta['alternativa2']; ?></td>
                        <td><?php echo $pergunta['alternativa3']; ?></td>
                        <td><?php if($pergunta['ativo']) {
                            echo 'SIM';
                        } else {
                            echo 'NÃO';
                            } ?></td>
                        <td><a href="<?php echo site_url('atividade/editarPergunta/' . $pergunta['id'].'/'.$pergunta['id_quiz']) ?>" title='Editar'>Editar</a></td>
                        
                    </tr>
    <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div id='alertas'>
        Não há perguntas cadastradas.
    </div>
<?php } ?>
    </div>
<br><br>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tabelaPergunta").DataTable();
    });
</script>

<?php $this->load->view('templates/footer'); ?>

