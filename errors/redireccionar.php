<?php
   $error_url = $_SERVER["REDIRECT_STATUS"];
    
   header('Location: '.dominio($error_url));
   exit;
