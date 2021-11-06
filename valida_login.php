<?php
    session_start(); 

    $lista_users = array(
        array('email'=>'adm@adm.com','senha'=>'1234'),
        array('email'=>'user@user.com','senha'=>'123'),
        array('email'=>'test@test.com','senha'=>'12'),
    );

    $autenticado = false;

    foreach($lista_users as $usuario){ 
        if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
            $autenticado = true;
            $_SESSION['nome'] = $_POST['email'];
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
        header('Location: index.php?login=erroLogin');
    }
?>