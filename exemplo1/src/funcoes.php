<?php
function upload($arquivo){
    /* Array contendo os tipos válidos (mime types) */
    $tiposValidos = [
        "image/jpeg",
        "image/png",
        "image/gif",
        "image/svg+xml"
    ];

    /* Validando os tipos
    Se NÃO for um tipo válido existente no array 
    de tipos... */
    if( !in_array($arquivo["type"], $tiposValidos) ){
    // pare o script e exiba a mensagem:
        exit("<p>Formato não permitido - <a href='index.php'>Voltar</a></p>");
    } 

    /* Processo de upload */

    // Acessando propriedades do arquivo
    $nome = $arquivo["name"]; 
    $temporario = $arquivo["tmp_name"];

    // Determinar o local para onde o arquivo será enviado
    $destino = "imagens/".$nome; // imagens/ideias.jpg

    // Fazendo a transferência
    if(move_uploaded_file($temporario, $destino)){
        return true;
    } else {
        return false;
    }
}