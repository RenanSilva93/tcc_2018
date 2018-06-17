<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

echo form_open('usuario/inserir/');
?>

<div class="text-center">
    <div id="aviso">
        <?php echo $this->session->flashdata('msg'); ?>
    </div>
</div><br>

<script src="<?php echo base_url('include/jquery/maskedinput.js') ?>"></script>

<div class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-5">
            <a href="<?php echo base_url(); ?>" class="btn btn-success">Entrar no Sistema</a>
        </div>
    </div>
    
    <center><h3><?php echo "Cadastro de Usuário"; ?></h3></center>
    
    <br>
    <center>(*) - Campos Obrigatórios</center>
    <br>

    <div class="form-inline">
        <label class="col-sm-4" for="nome">Nome:*</label>
        <input class="form-control col-sm-5" placeholder="Nome" id="nome" name="nome" type="text" required/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="username">Usuário:*</label>
        <input class="form-control col-sm-5" placeholder="Usuário" id="username" name="username" type="text" required/>
    </div>
	
    <div class="form-inline">
        <label class="col-sm-4" for="sexo">Sexo:*</label>
            <select class="form-control col-sm-5" name="sexo" id="sexo" required>
                <option value="" selected>Selecione...</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
            </select> 
    </div>

    <div class="form-inline">
        <label class="col-sm-4" for="telefone">Telefone:</label>
        <input class="form-control col-sm-5" placeholder="Telefone" id="telefone" name="telefone" type="text"/>
    </div>

    <div class="form-inline">
        <label class="col-sm-4" for="email">E-mail:</label>
        <input class="form-control col-sm-5" placeholder="E-mail" id="email" name="email" type="text"/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="data_nascimento">Data de Nascimento:*</label>
        <input class="form-control col-sm-5" placeholder="Data de Nascimento" id="data_nascimento" name="data_nascimento" type="date" required/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="nome_responsavel">Nome do Responsável:</label>
        <input class="form-control col-sm-5" placeholder="Nome do Responsável" id="nome_responsavel" name="nome_responsavel" type="text"/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="ano_escolar">Ano Escolar:*</label>
            <select class="form-control col-sm-5" name="ano_escolar" id="ano_escolar">
                <option value="" selected>Selecione...</option>
                    <option value="B">3ºB</option>
                    <option value="C">3ºC</option>
            </select> 
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="senha">Senha:*</label>
        <input class="form-control col-sm-5" placeholder="Senha" id="senha" name="senha" type="password" required/>
    </div>
    
    <div class="form-inline">
        <label class="col-sm-4" for="repetir_senha">Repetir Senha:*</label>
        <input class="form-control col-sm-5" placeholder="Repetir Senha" id="senha2" name="senha2" type="password" required/>
    </div>

    <div class="form-inline">
        <div class="col-sm-12">
            <button class="btn btn-success" type="submit" id="botao-salvar">Salvar</button>
			
            <div class="btn btn-success">
                    <a href="<?php echo base_url(); ?>" style="text-decoration: none;  color: white; ">Voltar</a>
            </div>
        </div>
    </div>
</div>
</center>
<?php echo form_close(); ?>

<?php $this->load->view('templates/footer'); ?>

<script>
    //$('#telefone').mask('(99)99999-9999');
</script>