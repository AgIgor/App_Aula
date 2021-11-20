<?php
    session_start();
    session_destroy();

    header ('Location: /app_help_desk/index.php?logout=sair');
?>