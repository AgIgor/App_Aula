<?php
  session_start();
  if(!isset($_SESSION['AUTENTICADO'])||$_SESSION['AUTENTICADO'] !='SIM'){
    header('Location: /app_help_desk/index.php?login=erro2');
  }
?>