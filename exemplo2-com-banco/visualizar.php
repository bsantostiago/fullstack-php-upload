<?php
require "src/Imagem.php";
$imagem = new Imagem;
$listaDeImagens = $imagem->lerImagens();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Upload - Visualização </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>    
      
<div class="container">
    
    <h1>Visualizando</h1>
    <hr>

    <p><a class="btn btn-primary" href="index.php">Voltar</a></p>    

    <hr>

    <div class="row">
<?php foreach( $listaDeImagens as $imagem ){ ?>

        <div class="col-md-4">
            <!-- Indicação da referência do arquivo -->
            <img src="imagens/<?=$imagem['arquivo']?>" alt="" class="img-fluid">
            <p><?=$imagem['nome']?> </p>
        </div>

<?php } ?>
    </div>
        
</div>


</body>
</html>