<?php 

    require '../config/config_upload.php';
    set_time_limit(0);
    $nome_arquivo = $_FILES['arquivo']['name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];

    // echo "nome: " . $nome_arquivo . "<br> tamanho: " . $tamanho_arquivo . "<br> temp: " . $arquivo_temporario;

    if(!empty($nome_arquivo)) {
        $ext = strrchr($nome_arquivo, '.');
        $nome_final = ($config_upload['renomeia']) ? md5(time()) .$ext : $nome_arquivo;
        $caminho = $config_upload['caminho_absoluto'] .$nome_final;

        if(($config_upload['verifica_tamanho']) && ($tamanho_arquivo > $config_upload['tamanho'])) {
            die('O arquivo é maior que o permitido');
        }

        if(($config_upload['verifica_extensao']) && (!in_array($ext, $config_upload['extensoes']))) {
            die('O arquivo não possui uma extensão válida');
        }

        if(move_uploaded_file($arquivo_temporario, $caminho)) {
            echo  "Arquivo enviado com sucesso";
        }else{
            echo "Erro ao fazer Upload";
        }

    }else {
        echo "Está vazio";
    }
    echo $nome_final;
?>


