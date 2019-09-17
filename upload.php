<?php
    var_dump($_FILES);

    $tamanho_maximo = 200000;
    $nome_arquivo = $_FILES['arquivo']['name'];
    $extensao = strrchr($nome_arquivo, '.');
    $extensoes = array('.gif','.png','.jpg','.PNG');
    $caminho_absoluto = 'C:\wamp64\www\upload-arquivos\destino';
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];

    //Validações do arquivo
    if(!empty($nome_arquivo)) {
        if(!in_array($extensao, $extensoes))
            die("Extensão inválida");
        if($tamanho_arquivo > $tamanho_maximo)
            die("Arquivo muito grande");
        if(file_exists($caminho_absoluto."/".$nome_arquivo))
            die("Arquivo já existe");
        
            if(move_uploaded_file($arquivo_temporario,$caminho_absoluto."/".$nome_arquivo)) {
                echo 'Arquivo enviado com sucesso';
            } else {
                echo 'Erro ao enviar arquivo';
            }
    } else {
        die("O arquivo não tem um nome");
    }


    echo $nome_arquivo;
    echo $extensao;
?>