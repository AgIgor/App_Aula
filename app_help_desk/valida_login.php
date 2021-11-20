<?php
    session_start(); 

    $lista_users = array(
        array('email'=>'maui@maui.com','senha'=>'1234','id'=>'maui'),
        array('email'=>'igor@igor.com','senha'=>'1234','id'=>'igor'),
        array('email'=>'mari@mari.com','senha'=>'1234','id'=>'mari'),
    );

    $autenticado = false;

    foreach($lista_users as $usuario){ 
        if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
            $autenticado = true;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $usuario['id'];
            break;
        }else{
            $autenticado = false;
        }//end if else
    }//end for each

    if($autenticado){
        $_SESSION['AUTENTICADO'] = 'SIM';
        header('Location: home.php');
    }else{
        $_SESSION['AUTENTICADO'] = 'NAO';
        header('Location: /app_help_desk/index.php?login=erroLogin');
    }
?>