<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>
<br>
<div class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-5">
            <a href="<?php echo base_url() . 'index.php/usuario/cadastrar'; ?>" class="btn btn-success">Realizar Cadastro</a>
        </div>
    </div>

    <div class="text-center">
        <div id="aviso">
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div><br>

    <?php echo form_open('login/analisarLogin'); ?>

    <center>
        <h3>Login: </h3>
        <div class="form-inline justify-content-center">
            <label class="col-sm-1">Usuário: </label>
            <div class="col-sm-2"> 
                <input class="form-control" id="username" name="username" type="text" placeholder="Digite seu usuário"/>
            </div>
        </div>

        <div class="form-inline justify-content-center">
            <label class="col-sm-1">Senha: </label>
            <div class="col-sm-2">
                <input class="form-control" id="senha" name="senha" type="password" placeholder="Digite sua senha"/>
            </div>
        </div>

        <div class="form-inline justify-content-center">
            <div class="col-sm-2">
                <a href="<?php echo base_url(). 'index.php/usuario/trocarSenha'; ?>">Trocar senha</a>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                <button class="btn btn-success" type="submit">Acessar</button>
            </div>
        </div>
    </center>
    <br>

    <?php echo form_close(); ?>

    <?php
    $this->load->view('templates/footer');
    ?>