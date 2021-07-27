<?php
session_start();
require '../vendor/autoload.php';
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >-->

     <link rel="stylesheet" href="<?=CONF_URL_BASE ?>/_cdn/node_modules/bootstrap/dist/css/bootstrap.min.css" >

    <link rel="stylesheet" href="<?=CONF_URL_BASE ?>/_cdn/css/bootstrap-custom.css" />
    <link rel="stylesheet" href="<?=CONF_URL_BASE ?>/_cdn/css/admin.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
        <title><?=CONF_SITE_NAME ?></title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 

        <!------ Include the above in your HEAD tag ---------->
       
        </style>
    </head>
    <body>
        
        <!--<div class="load">  <img src="https://www.blogson.com.br/wp-content/uploads/2017/10/loading-gif-transparent-10.gif" /></br> Carregando ... </div>-->

        <div id="wrapper" class="active">  
            <!-- Sidebar -->

            <?php 
            include './nav.php';
            ?>

            <div id="page-content-wrapper">
                <!-- Keep all page content within the page-content inset div! -->
                <div class="page-content ">
                    <div class="row">
                        <div class="col-md-12 bg bg-front text-left">
                            <p class="text-left" style="padding: 5px; color:#fff; font-size: 1.5em; float: left;"><span style="color:red;">M</span>otor</span><span style="color:red;">R</span>ace</p>
                            <p class="text-right" style="padding: 5px; margin-top:1px; color:#fff; font-size: 1.2em; float: right;"> Seja Bem Vindo   <b style="color: orange;"><?= $_SESSION["nome"]; ?></b> </br> <b></b> <img src="<?= CONF_URL_BASE ?>/uploads/<?php 
                            
                            $avatar = new \Source\Models\Read();
                            $avatar->ExeRead("usuarios","WHERE id = :a", "a={$_SESSION["user_id"]}");
                           echo $avatar->getResult()[0]["foto"];
                            
                            ?>" class="float-right rounded-circle" style="width: 30px; "> </p>






                        </div>
                        <div class="col-md-12">
                            <?php
                            
                            
                            if(empty($_GET["p"])){
                                include 'inc/home.php';
                            }else{
                                include "inc/{$_GET["p"]}.php";
                            }

                            ?>
                        </div>

                     

                    </div>
                </div>
            </div>

        </div>

        <script>

            $(document).ready(function () {
                $('#summernote').summernote();
            });

            $(function () {



                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("active");
                });


            });

        </script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >




        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

        <script src="<?= LINK_ASSETS_APP ?>/js/Chart.min.js" ></script>

<!--        <script src="<?= LINK_ASSETS_APP ?>/js/jquery.js"></script>
        <script src="<?= LINK_ASSETS_APP ?>/js/jquery.min.js" type="text/javascript"></script>-->
        <script src="<?= LINK_ASSETS_APP ?>/js/jquery.maskMoney.js" type="text/javascript"></script>




    </body>

</html>

