<?php

    $titulo = str_replace('*|*','_',$_POST['titulo']);
    $categoria = str_replace('*|*','_',$_POST['categoria']);
    $descricao = str_replace('*|*','_',$_POST['descricao']);

    // implode('sinal','array');

    $texto = $titulo .'*|*'. $categoria .'*|*'. $descricao.PHP_EOL;

    $arquivo = fopen('dados.txt','a');
    fwrite ($arquivo,$texto);
    fclose ($arquivo);

    echo '<p>salvo!</p>';
    header('Location: abrir_chamado.php?salvar=ok');

?>