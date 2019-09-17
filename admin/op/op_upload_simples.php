<?php 

require '../config/config_upload.php';

    $nome_arquivo = $_FILES['arquivo']['name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];

    // echo "nome: " . $nome_arquivo . "<br> tamanho: " . $tamanho_arquivo . "<br> temp: " . $arquivo_temporario;

    if(!empty($nome_arquivo)) {
        $ext = strrchr($nome_arquivo, '.');
        $nome_final = $nome_arquivo;
        if($config_upload['renomeia']) {
            $nome_final = md5(time()) .$ext;
        }else{
            $nome_final = $nome_arquivo;
        }
    }else {
        echo "Está vazio";
    }
    echo $nome_final;
?>


