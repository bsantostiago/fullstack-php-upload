<?php
require_once "src/Imagem.php";
if(isset($_POST['enviar'])){
    $imagem = new Imagem;
    $imagem->setNome($_POST['nome']);    
    $imagem->setArquivo($_FILES['arquivo']['name']);
    
    if($imagem->upload($_FILES['arquivo'])){
        $imagem->inserirImagem();
        header("location:visualizar.php");
    } else {
        $status = "Ocorreu algum erro, tente novamente mais tarde!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Upload</h1>
        <hr>
        <p><a href="visualizar.php" class="btn btn-info">Visualizar</a></p>
        <hr>

        <?php if(isset($status)){ ?>
            <p class="alert alert-danger"><?=$status?></p>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto">
            <p class="form-group">
                <label for="arquivo" class="form-label">Selecione a imagem em seu computador:</label>

                <input class="form-control" type="file" name="arquivo" id="arquivo" 
                accept="image/jpeg, image/gif, image/svg+xml, image/png" required>
            </p>
            <p class="form-group">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome" required>
            </p>
            <button class="my-4 btn btn-primary" name="enviar">Enviar</button>
        </form>
    </div>
</body>
</html>