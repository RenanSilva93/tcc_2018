<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
    <head>
        <meta charset="iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'include/css/estilo.css'; ?>">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
        <title>GAMEQUIZ</title>

    </head>
    <body>
        <header>
            <div class="header-banner img-responsive" style="width: 100%; height: 30%; background: url(<?php echo base_url('include/imagem/capa.png'); ?>);">
                <div class="row">
                    
                    <div class="col-md-12 text-center">
                        <h1 style="font-style: oblique; padding-top: 4%;text-align: center;font-family: Sunday; font-size: 100px;">GAME QUIZ</h1>
                    </div>
                    
                </div>
            </div>
    <?php if ($this->session->userdata('loginuser')) { ?>
        <div class="nav-container">
            <div class="container">
                <div class="row">
                    <ul class="nav nav-pills">
                        <li class="text-left">
                            <a href="<?php echo base_url(). 'index.php/atividade/index'; ?>">Página Principal</a>
                        </li>
                        
                        <?php if ($this->session->userdata('tipo_usuario') == '1') { ?>
                        
                        <li class="text-left">
                            <a href="<?php echo base_url(). 'index.php/atividade/cadastrarPergunta'; ?>">Cadastro de Pergunta</a>
                        </li>
                        <?php } ?>
                        
                        <li class="text-left">
                            <?php if ($this->session->userdata('loginuser')) { ?>
                                    <a href="<?php echo base_url() . 'index.php/login/closeSession'; ?>">Sair</a>                    
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>
        </header>

