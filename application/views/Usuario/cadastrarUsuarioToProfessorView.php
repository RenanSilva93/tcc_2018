<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');

echo form_open('usuario/inserirUsuario/'.$quiz->id);
?>

<div class="text-center">
    <div id="aviso">
        <?php if(isset($mensagem)) {
            echo $mensagem;
        } ?>
    </div>
</div><br>

<div class="form-horizontal">
    
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
        <label class="col-sm-4" for="ano_escolar">Time:*</label>
            <select class="form-control col-sm-5" name="time" id="time">
                <option value="" selected>Selecione...</option>
                    <option value="<?php echo $quiz->time1 ?>"><?php echo $quiz->time1 ?></option>
                    <option value="<?php echo $quiz->time2 ?>"><?php echo $quiz->time2 ?></option>
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
<br>
<br>

<?php $this->load->view('templates/footer'); ?>

