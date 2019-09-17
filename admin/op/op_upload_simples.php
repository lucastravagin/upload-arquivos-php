<?php 
    $nome_arquivo = $_FILES['arquivo']['name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];

    echo "nome: " . $nome_arquivo . "<br> tamanho: " . $tamanho_arquivo . "<br> temp: " . $arquivo_temporario
?>
