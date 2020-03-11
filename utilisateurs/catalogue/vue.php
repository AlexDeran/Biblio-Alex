<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/styles.css">
    <title>Genres</title>
</head>
<body id='livres'>
    
    <?php include '../../../navbar/navbarControllerCO.php';?>

    <div class="containercat">
        <?php foreach($row as $value): ?>
            <div class="row rounded text-center mb-5 align-middle">
                <div class="col-md-4 p-3 align-middle">
                    <div class="col p-3"> <img src="../../../img/<?=$value["img_src"] ?>" class="img-fluid" alt="Responsive image" height="1000" width="300"></div>
                    <div class="col p-3"><strong><u><?=$value["titre"] ?></u></strong></div>
                    <?php if($_SESSION['statut'] == 'abonne' && isset($_SESSION)){?>
                    <div class="col-p-3"><a class="btn btn-info" href="../emprunter.php?id_livre=<?=$value['id']?>" role="button">Emprunter</a></div>
                    <?php } ?>
                </div>
                <div class="col-md-3 p-3 align-middle">
                    <div class="col p-3"><?=$value["lastname"] ?></div>
                    <div class="col p-3"><?=$value["date_edition"] ?></div>
                    <div class="col p-3"><?=$value["nom"] ?></div>
                </div>
                <div class="col-md-5 p-3 align-middle">
                    <?=$value["resume"] ?>  
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>