<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
    <head>
        <meta charset="iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'include/css/estilo.css'; ?>" media="screen">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>Espaço para estudo Fare</title>

        <style>
            @media screen and (max-width: 500px) 
            {
                .carousel 
                {
                    height: 43%!important;
                }
                
                .visao1 {
                    display: none;
                }
                
                .visao2 {
                    display: block!important;
                }
                
                #topo_fixo {
                   display: none!important;
                }
            };

        </style>

    </head>
    <body>
        <header>

            <div id="topo_fixo" style="display: none; position:fixed;
                 z-index:999;
                 left:0%;
                 right: 0%;
                 top:0;
                 overflow:hidden;
                 width: 100%; height: 50%;">
                <div class="header-banner img-responsive" 
                     style="padding-top: 2%; width: 100%; height: 30%; background: url(<?php echo base_url('include/imagem/fundo.png'); ?>);}">


                    <div class="container">

                        <div class="row">

                            <div class="col-md-2">
                                <img src="<?php echo base_url('include/imagem/logo2.png'); ?>" style="width: 100%; height: 75%">
                            </div>

                            <ul class="nav nav-pills navbar-right">
                                <li style="padding-top: 5%">
                                    <a href="#quem_somos">QUEM SOMOS</a>
                                </li>

                                <li style="padding-top: 5%">
                                    <a href="#comeco">OFICINA DE REDAÇÃO</a>
                                </li>

                                <li style="padding-top: 5%">
                                    <a href="#contato">CONTATO</a>
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>


            <div class="header-banner img-responsive" style="padding-top: 2%; width: 100%; height: 80%; background: url(<?php echo base_url('include/imagem/fundo.png'); ?>);}">


                <div class="container">

                    <div class="row">

                        <div class="col-md-2">
                            <img src="<?php echo base_url('include/imagem/logo2.png'); ?>" style="width: 100%; height: 25%">
                        </div>

                        <div class="col-md-8">
                        <ul class="nav nav-pills navbar-right">
                            <li style="padding-top: 8%">
                                <a href="#quem_somos">QUEM SOMOS</a>
                            </li>

                            <li style="padding-top: 8%">
                                <a href="#comeco">OFICINA DE REDAÇÃO</a>
                            </li>

                            <li style="padding-top: 8%">
                                <a href="#contato">CONTATO</a>
                            </li>
                        </ul></div>


                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-md-10">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%; height: 65%;
                                 ">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 h-100" src="<?php echo base_url('include/imagem/banner1.png'); ?>" alt="Oficina de Redação">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 h-100" src="<?php echo base_url('include/imagem/banner2.png'); ?>" alt="FARE">
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div><div id="comeco"></div>
                </div>
            </div>

        </header>

        <script>
            var $w = $(window);

            $w.on("scroll", function () {
                if ($w.scrollTop() > 300) {
                    $('#topo_fixo').css("display", "block");
                } else {
                    $('#topo_fixo').css("display", "none");
                }
            });
        </script>
        
        
