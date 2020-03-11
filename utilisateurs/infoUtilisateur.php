<?php
    session_start();

    $email = $_SESSION['email'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $statut = $_SESSION['statut'];
    $id = $_SESSION['id'];
    $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryProfil = $pdo->prepare("SELECT utilisateurs.adresse, utilisateurs.date_abonnement FROM utilisateurs WHERE utilisateurs.id = :id");
    $queryProfil->bindParam(':id', $id, PDO::PARAM_STR);
    $queryProfil->execute();
    if ($queryProfil) {
        $profil = $queryProfil->fetchAll(PDO::FETCH_ASSOC);
    }

    $date = $profil[0]['date_abonnement'];
    $adresse = $profil[0]['adresse'];

    $queryEmprunts = $pdo->prepare("SELECT livres.titre, auteurs.lastname, emprunts.date_emprunt FROM emprunts INNER JOIN livres ON emprunts.id_livre = livres.id INNER JOIN auteurs ON livres.auteur_id = auteurs.id WHERE emprunts.id_utilisateur = :id AND emprunts.rendu = 0");
    $queryEmprunts->bindParam(':id', $id, PDO::PARAM_STR);
    $queryEmprunts->execute();
    if ($queryEmprunts) {
        $emprunts = $queryEmprunts->fetchAll(PDO::FETCH_ASSOC);
    }
    $numberOfEmprunts = count($emprunts);

    $queryRendus = $pdo->prepare("SELECT livres.titre, auteurs.lastname FROM emprunts INNER JOIN livres ON emprunts.id_livre = livres.id INNER JOIN auteurs ON livres.auteur_id = auteurs.id WHERE emprunts.id_utilisateur = :id AND emprunts.rendu = 1");
    $queryRendus->bindParam(':id', $id, PDO::PARAM_STR);
    $queryRendus->execute();
    if ($queryRendus) {
        $rendus = $queryRendus->fetchAll(PDO::FETCH_ASSOC);
    }
    $numberOfRendus = count($rendus);

?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Utilisateur</title>
    </head>
    
    <body id="users">

        <?php require '../navbar/navbarControllerCO.php';?>


        <div class="col-md-4 offset-md-4">
                <div class="card">
                <h5 class="card-header">Informations :</h5>
                    <div class="card-body">
                        <p class="card-text">Prénom : <?=$prenom?></p>
                        <p class="card-text">Nom : <?=$nom?></p>
                        <p class="card-text">Email : <?=$email?></p>
                        <p class="card-text">Adresse : <?=$adresse?></p>
                        <?php if ($statut = 'abonne'): ?>
                        <p class="card-text">Votre abonnement est valable jusqu'au : <?=$date?></p>
                        <?php else: ?>
                        <p class="card-text">Vous n'êtes actuellement plus abonné.</p>
                        <?php endif ?>
                        <?php if ($numberOfEmprunts > 0): ?>
                        <p class="card-text">Vous avez <?=$numberOfEmprunts?> emprunt(s) en cours.</p>
                        <?php else: ?>
                        <p class="card-text">Vous n'avez aucun livre d'emprunté.</p>
                        <?php endif ?>
                        <?php if ($numberOfRendus > 0): ?>
                        <p class="card-text">Vous avez déjà lu <?=$numberOfRendus?> livre(s) de notre biliothèque !</p>
                        <?php else: ?>
                        <p class="card-text">Vous n'avez rendu encore aucun livre.</p>
                        <?php endif ?>
                        <div class="col-md-4 offset-md-3">
                            <a href='./catalogue/controllers/livresController.php'' role="button"  class="btn btn-dark">EMPRUNTER UN LIVRE</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">Emprunts en cours : </h5>
                    <div class="card-body">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                <th scope="col">Titre du livre :</th>
                                <th scope="col">Auteur :</th>
                                <th scope="col">Date de l'emprunt :</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($emprunts as $emprunt):?>
                                    <tr>
                                        <?php foreach($emprunt as $key => $value): ?>
                                            <td><?= $value ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">Livres rendus : </h5>
                    <div class="card-body">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                <th scope="col">Titre du livre :</th>
                                <th scope="col">Auteur :</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($rendus as $rendu):?>
                                    <tr>
                                        <?php foreach($rendu as $key => $value): ?>
                                            <td><?= $value ?></td>
                                        <?php endforeach; ?>
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
