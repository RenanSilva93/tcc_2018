<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>

<script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

<div class="container">
    <?php if (!empty($usuarios)) { ?>
        <div class="table-responsive">
            <table id="tabela" border="1" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Equipe</th>
                    </tr>
                <thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <tr>
                            <td><?php echo $usuario['nome']; ?></td>
                            <td><?php echo $usuario['username']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['ano_escolar']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div id='alertas'>
            Não há usuários cadastrados.
        </div>
    <?php } ?>
</div>
<br><br>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tabela").DataTable();
    });
</script>

<?php $this->load->view('templates/footer'); ?>