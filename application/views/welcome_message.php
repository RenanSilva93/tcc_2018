<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>           

<?php if(isset($mensagem)) { ?>
<div id="resposta" style="position:fixed;
                 z-index:999;
                 left:0%;
                 right: 0%;
                 top:0;
                 overflow:hidden;
                 width: 100%;padding-top: 2%">
    <div class="container" style="background-color: white; padding-bottom: 2%;">
        <div style="padding-top: 1%"><center><?php echo $mensagem; ?></center></div>
    </div>
        </div>
<?php } ?>

<div style="background-color: #DCDCDC; ">
    <div class="container">
        <br>

        <div id="oficina" style="background-color: #2F4F4F; padding: 2%;">
            <p style="color: white; font-size: 30px"><strong>Oficina de Redação</strong> - Exclusiva para o ENEM 2018!</p>
        </div>
        <div id="vagas" style="color: red; font-size: 20px">
            <p><strong><center>Vagas Limitadas!</center></strong></p>
        </div>
        <br>
        <p><strong>Carga Horária: </strong>14 Horas</p>
        <p><strong>Dias: </strong>18/09/2018, 25/09/2018, 02/10/2018 e 09/10/2018</p>
        <p><strong>Horário: </strong>18h30 às 22h</p>
        <p><strong>Local: </strong>3255 Coworking - Av. Rio Branco, 3.480, 3° andar. Alto dos Passos (prédio do Sírio Libanês).
            Juiz de Fora, Minas Gerais - 36025-020</p>

        <br>
        <div class="row">
            <div class="col-md-4">
                <div id="preco" style="border: 3px solid; padding: 3px; background-color: #E6E6FA; border-top-left-radius: 14px;
                     border-top-right-radius: 14px; border-bottom-left-radius: 14px;
                     border-bottom-right-radius: 14px;">
                    <div style="border-bottom: 1px solid;">
                        <p><center><strong>Oficina de Redação</strong></center></p>
                    </div>


                    <div style="padding-left: 5px; padding-right: 5px; padding-top: 5px">
                        <p style="color: red; background-color: yellow; text-align: center">Valor promocional até dia 18/08/2018</p>

                        <img class="img-responsive" style="width: 80%; height: 40%" src="<?php echo base_url('include/imagem/preco_promocao.png'); ?>">

                        <br><br>
                        <center>
                            <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
                            <form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post" onsubmit="PagSeguroLightbox(this); return false;">
                                <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                                <input type="hidden" name="itemCode" value="AFCFE0418181FBE004A7EF997C358C86" />
                                <input type="hidden" name="iot" value="button" />
                                <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/99x61-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                            </form>
                            <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                            <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <P><strong>O que você irá aprender nesta oficina: </strong></P>
                <li>aprender o que é a redação proposta pelo ENEM: o objetivo, a estrutura e o estilo;</li>
                <li>entender o que é argumentar e refutar argumentos;</li>
                <li>interpretar, de forma eficiente, textos argumentativos;</li>
                <li>produzir, de maneira inovadora, textos dissertativo-argumentativos.</li>
                <br>
                <p>O diferencial da Oficina de Redação do Curso e Aulas de Reforços Fare é a utilização de 
                    recursos tecnológicos no processo de ensino e aprendizagem. O aluno terá acesso ao 
                    sistema “Saber Mais”, que possui, além dos materiais do curso, outras fontes para a 
                    fixação do conteúdo.</p>
            </div>
        </div><div id="quem_somos"></div>
    </div><br>
</div>

<div style="background-color: #C0C0C0">
    <div class="container">
        <br>
        <div id="oficina" style="background-color: #2F4F4F; padding: 2%">
            <p style="color: white; font-size: 30px"><strong>Quem Somos</strong></p>
        </div>
        <br>
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" style="width: 60%; height: 40%" src="<?php echo base_url('include/imagem/missao.png'); ?>">
            </div>
            <div class="col-md-6">
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Oferecer aos nossos alunos uma alternativa para o reforço de redação de uma maneira simplificada 
                    de fácil compreendimento.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Uma oficina de redação prática, fazendo com que os estudantes possam exercer todo o 
                    conhecimento adquirido durante a oficina.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Levar uma nova metodologia de ensino, com uso de Tecnologias de Informação e Comunicação.</li>
            </div>
        </div>
        
        <div class="visao1">
        <div class="row">
            <div class="col-md-6">
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Ser um lugar de estudo em que os alunos possam 
                se inspirar. Um espaço acolhedor, seguro e moderno.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Ser o primeiro espaço de estudo 
                    que utiliza tecnologia em sua metodologia de ensino.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Ser reconhecido como a melhor 
                    oficina de redação da cidade.</li>
            </div><br>
            <div class="col-md-6">
                <img class="img-responsive" style="width: 60%; height: 40%" src="<?php echo base_url('include/imagem/visao.png'); ?>">
            </div>
        </div>
        </div>
        
        <div class="visao2" style="display: none">
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" style="width: 60%; height: 40%" src="<?php echo base_url('include/imagem/visao.png'); ?>">
            </div><br>
            <div class="col-md-6">
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Ser um lugar de estudo em que os alunos possam 
                se inspirar. Um espaço acolhedor, seguro e moderno.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Ser o primeiro espaço de estudo 
                    que utiliza tecnologia em sua metodologia de ensino.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Ser reconhecido como a melhor 
                    oficina de redação da cidade.</li>
            </div><br>
        </div>
        </div>
    
        <div class="row">
            
            <div class="col-md-6">
                <img class="img-responsive" style="width: 60%; height: 40%" src="<?php echo base_url('include/imagem/valores.png'); ?>">
            </div>
            <div class="col-md-6"><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Compromisso com educação.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Ética e honestidade.</li><br>
                <li style="list-style-image: url(<?php echo base_url('include/imagem/lapis.png'); ?>)">Inovação na educação.</li>
            </div>
        </div>
  
        </div>
        
    </div>

<div id="contato"></div>
<div style="background-color: #D3D3D3">
    <div class="container">
        <br>
        
        <div id="oficina" style="background-color: #2F4F4F; padding: 2%">
            <p style="color: white; font-size: 30px"><strong>Contato</strong></p>
        </div>
        <br>
        
        <div class="row">
            <div class="col-md-4">
                <p><strong>Espaço para Estudo FARE</strong></p>
                <p><img class="img-responsive" style="width: 5%; height: 3%" src="<?php echo base_url('include/imagem/email.png'); ?>">
                espacofare@gmail.com</p>
                
                <p><img class="img-responsive" style="width: 5%; height: 3%" src="<?php echo base_url('include/imagem/whatsapp.png'); ?>">
                (32) 98897-2654</p>
            </div>
            <div class="col-md-8">
                <?php echo form_open('welcome/formulario'); ?>
                <p>Preencha o formulário:</p>
                
                <div class="form-inline">
                    <strong class="col-md-2">Nome:</strong>
                    <input class="form-control col-md-9" type="text" name="nome" id="nome" required />
                </div>
                <div class="form-inline">
                    <strong class="col-md-2">E-mail:</strong>
                    <input class="form-control col-md-9" type="email" name="email" id="email" required />
                </div>
                
                <div class="form-inline">
                    <strong class="col-md-2">Assunto:</strong>
                    <select class="form-control col-md-9" name="assunto" id="assunto" required>
                        <option value="opiniao">Opinião</option>
                        <option value="duvida">Dúvida</option>
                        <option value="sugestao">Sugestão</option>
                        <option value="critica">Crítica</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
                <div class="form-inline">
                    <strong class="col-md-2">Descrição:</strong>
                    <textarea class="form-control col-sm-9" id="descricao" name="descricao" cols="5" rows="5" required></textarea>
                </div>
                
                <button class="btn btn-success col-md-2" type="submit" id="botao-salvar">Salvar</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    
    setTimeout(function() {
        $('#resposta').css('display', 'none');
    }, 5000);
</script>
