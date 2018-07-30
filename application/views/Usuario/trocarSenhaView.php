<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>

<?php echo form_open('usuario/mudarSenha'); ?>

<div class="text-center">
    <div id="aviso">
        <?php if(isset($mensagem)) {
            echo $mensagem;
        } ?>
    </div>
</div><br>

<div class="form-group">
        <div class="col-sm-5">
            <a href="<?php echo base_url(); ?>" class="btn btn-success">Entrar no Sistema</a>
        </div>
    </div>

<div class="container">
    
    <p><h2>Trocar Senha de Usuário</h2></p>
<br>

<div class="row">
    <label class="col-sm-3">Usuário: </label>
    <div class="col-sm-2"> 
        <input class="form-control" id="username" name="username" type="text" placeholder="Digite seu usuário"/>
    </div>
</div>
<br>
<div class="row">
    <label class="col-sm-3">Nova Senha: </label>
    <div class="col-sm-2"> 
        <input class="form-control" id="senha" name="senha" type="password" placeholder="Digite sua nova senha"/>
    </div>
</div>
<br>

<div class="row">
    <label class="col-sm-3">Nova Senha Novamente: </label>
    <div class="col-sm-2"> 
        <input class="form-control" id="senha2" name="senha2" type="password" placeholder="Digite sua nova senha"/>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        <button class="btn btn-success" type="submit">Mudar Senha</button>
    </div>
</div>
</div>
<!--</div>-->
<br>
<br>

<?php echo form_close(); ?>

<?php
$this->load->view('templates/footer');
?>
