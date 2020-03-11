<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/404.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Erreur 404</title>

</head>

<body>

<?php 
if(isset($_SESSION['statut']) && !empty($_SESSION['statut']) && $_SESSION['statut'] =='admin'):
     include './navbar/navbarControllerCO.php'; 
else:
    include './navbar/navbarController.php';
endif;
 ?>

    <div class="wrapper">
        <div class="container-fluid" id="top-container-fluid-nav">
            <div class="container">
            </div>
        </div>


        <div class="container-fluid" id="body-container-fluid">
            <div class="container">
                <div class="jumbotron">
                    <h1 class="display-1">4<i class="fa  fa-spin fa-cog fa-3x"></i> 4</h1>
                    <h1 class="display-3">ERREUR</h1>
                    <p class="lower-case">Oh, on dirait que la page que vous cherchez n'existe pas.</p>
                    <p>
                        <?php
                        if (!empty($_SERVER['HTTP_REFERER'])) {
                         echo '<p><a href="'.$_SERVER['HTTP_REFERER'].'">Retour page précédente</a></p>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>



        <div class="container-fluid" id="footer-container-fluid">
            <div class="container">
            </div>
        </div>



    </div>

</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</html>