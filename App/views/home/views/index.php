<?php

// use config\component\Component as COMP;

load_css('index');?>

<section class="">
    <!-- <h1>HOLA MUNDO</h1> -->
    <?php 
    // component('headers1');
    $componete = new COMP();

    // $componete->rutaComponent('./Api/components/headers/header2/','headers2');
    $componete->component('headers2', 'headers/header2/');

    ?>