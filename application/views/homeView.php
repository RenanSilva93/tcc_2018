<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>
<br>
<div class="container">

    <div class="text-center">
        <div id="aviso">
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div><br>

    <?php echo form_open('login/analisarLogin'); ?>

    <div class="row">
        <div class="col-sm-6">
            <p><strong>Para Professores:</strong></p>
            <p>Se você é professor (a) e deseja usar o GAMEQUIZ em suas aulas, 
                envie um e-mail para o administrador.</p>
            <p>Nome: Renan Silva</p>
            <p>E-mail: renan.costas@hotmail.com</p>

            <p>Você receberá um perfil de professor que te dará acesso privilegiado ao GAMEQUIZ.</p>
        </div>

        <div class="col-sm-6">


            <h3>Login: </h3>
            <div class="form-inline">
                <label class="col-sm-1">Usuário: </label>
                <div class="col-sm-2"> 
                    <input class="form-control" id="username" name="username" type="text" placeholder="Digite seu usuário"/>
                </div>
            </div>

            <div class="form-inline">
                <label class="col-sm-1">Senha: </label>
                <div class="col-sm-2">
                    <input class="form-control" id="senha" name="senha" type="password" placeholder="Digite sua senha"/>
                </div>
            </div>

            <div class="form-inline">
                <div class="col-sm-3">
                    <a href="<?php echo base_url() . 'index.php/usuario/trocarSenha'; ?>">Trocar senha</a>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    <button class="btn btn-success" type="submit">Acessar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<?php echo form_close(); ?>

<?php
$this->load->view('templates/footer');
?>