<?php
require_once "src/funcoes.php";
if(isset($_POST['enviar'])){
    $imagem = $_FILES['arquivo'];
    
    if(upload($_FILES['arquivo'])){
        $status = "Imagem enviada com sucesso";
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
        
        <?php if(isset($status)){ ?>
            <p class="alert alert-info"><?=$status?></p>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto">
            <p class="form-group">
                <label for="arquivo" class="form-label">Selecione a imagem em seu computador:</label>

                <input class="form-control" type="file" name="arquivo" id="arquivo" 
                accept="image/jpeg, image/gif, image/svg+xml, image/png" required>
            </p>
            <button class="my-4 btn btn-primary" name="enviar">Enviar</button>
        </form>
    </div>
</body>
</html>