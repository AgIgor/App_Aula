<?php
  session_start();
  if(!isset($_SESSION['AUTENTICADO'])||$_SESSION['AUTENTICADO'] !='SIM'){
    header('Location: index.php?login=erro2');
  }
?>