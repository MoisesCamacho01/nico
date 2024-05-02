<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php load_file('resources/img/logotipo/NICO.png');?>" type="image/x-icon">
    <title>Nico</title>
    <?php load_css('estilos');?>
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        body{
            background-color: rgba(226, 226, 226, 0.267);
        }
        section{
            width: 400px;
            background-color: white;
            padding: 20px;
            margin: auto;
        }
        .titulo{
            background-color: brown;
            color: white;
            padding: 0.1px;
            text-align: center;
            font-weight:normal;
        }
        .cuerpo{
            text-align: justify;
        }
        .cuerpo h2{
            color: red;
        }
        .img{
            width: 90%;
            height: 60vh;
            margin-top: 20px; 
            margin-left: auto;
            margin-right: auto;
            background-color: transparent;
        }
        .error{
           width: 300px;
        }
    </style>
</head>
<body>
    <section>
        <div class="titulo">
            <h1>PAGINA NO ENCONTRADA</h1>
        </div>
        <div class="cuerpo">
            <h2>Error 403</h2>
            <p>Lo lamentamos el sitio web no se encuentra disponible o usted no tiene accesos a este contenido</p>
        </div>
    </section>
    <section class="img">
        <center>
            <img class="error" src="<?php load_file('./resources/img/img_errors/error_403.png')?>"/>
        </center>
    </section>
</body>
</html>