<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryEmprunts = $pdo->prepare("SELECT utilisateurs.prenom, utilisateurs.nom, utilisateurs.email, livres.titre, auteurs.lastname, emprunts.date_emprunt, emprunts.id_utilisateur, emprunts.id_livre FROM emprunts INNER JOIN utilisateurs ON emprunts.id_utilisateur = utilisateurs.id INNER JOIN livres ON emprunts.id_livre = livres.id INNER JOIN auteurs ON livres.auteur_id = auteurs.id WHERE emprunts.rendu = 'false'");
    $queryEmprunts->execute();
    if ($queryEmprunts) {
        $emprunts = $queryEmprunts->fetchAll(PDO::FETCH_ASSOC);
    }

    if($_SESSION['statut'] != "admin"):
        header("Location:../");
    endif;
    
    if(!isset($_SESSION['statut']) || empty($_SESSION['statut'])):
        header("Location:../connexion/connexionController.php");
    endif;

?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Emprunts</title>
    </head>
    
    <body id ="Admindisplay">

        <?php require '../navbar/navbarControllerCO.php';?>

        <div class="container">
            <div class="row">
                <div class="col-4">
                    <a href='http://localhost/www/php/biblio_coding/admin/auteurs.php' role="button"  class="btn btn-dark">AUTEURS</a>
                </div>
                <div class="col-4">
                    <a href='http://localhost/www/php/biblio_coding/admin/livres.php' role="button"  class="btn btn-dark">LIVRES</a>
                </div>
                <div class="col-4">
                    <a href='http://localhost/www/php/biblio_coding/admin/users.php' role="button"  class="btn btn-dark">UTILISATEURS</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Nom du livre</th>
                                <th>Auteur</th>
                                <th>Date d'emprunt</th>
                                <th>ID Utilisateur</th>
                                <th>ID Livre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($emprunts as $emprunt):?>
                                <tr>
                                    <?php foreach($emprunt as $key => $value): ?>
                                        <td><?= $value ?></td>
                                    <?php endforeach; ?>
                                    <td><a class="btn btn-success" href='./modification/rendu.php?id_livre=<?=$emprunt['id_livre']?>&id_utilisateur=<?=$emprunt['id_utilisateur']?>' role="button">RENDU</a></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>

</html>
