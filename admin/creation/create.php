<?php
session_start();

$pdo =new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8','root','');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$querylivres = $pdo->query('SELECT genres.id, genres.nom FROM genres');
if($querylivres):
    $livres = $querylivres->fetchAll(PDO::FETCH_ASSOC);
else:
    $livres=false;
endif;

$queryauteurs = $pdo->query('SELECT auteurs.lastname, auteurs.id FROM auteurs');
if($queryauteurs):
    $auteurs = $queryauteurs->fetchAll(PDO::FETCH_ASSOC);
else:
    $auteurs=false;
endif;

if($_SESSION['statut'] != "admin"):
    header("Location:../");
endif;

if(!isset($_SESSION['statut']) || empty($_SESSION['statut'])):
    header("Location:../connexion/connexionController.php");
endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrateur</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body id="admin">
<?php require '../../navbar/navbarControllerCO.php';?>

<div class="container">
    <h1 id="user"><u>Création</u></h1>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwoOne" aria-expanded="false" aria-controls="collapseTwoOne">
                    Création d'utilisateurs
                </button>
            </h2>
            </div>
            <div id="collapseTwoOne" class="collapse" aria-labelledby="headingTwoOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form method="POST" action="createuser.php">
                        <div class="form-group">
                            <label for="exampletext">Prénom</label>
                            <input type="text" class="form-control" name="prenom" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Entrer le Prénom ici"required/>
                            <label for="exampletext">Nom</label>
                            <input type="text" class="form-control" name="nom" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Entrer le Nom ici"required/>
                            <label for="exampletext">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="exampleInputEmail1" aria-describedby="AdressHelp" placeholder="Adresse"required/>
                            <label for="exampleInputEmail1">E-Mail</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nom@exemple.com"required/>
                            <label for="exampleInputPassword">Mot de Passe</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Mot de Passe"required/>
                            <label for="exampleInputDate_abonnement">Date abonnement</label>
                            <input type="date" class="form-control" name="date_abonnement" id="exampleInputDate_abonnement1" placeholder="Date Abonnement" required/>
                        </div>
                        <p> Quel statut pour l'utilisateur ?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statut" id="inlineRadio1" value="admin"required/>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statut" id="inlineRadio2" value="abonne"required/>
                            <label class="form-check-label" for="inlineRadio2">Abonné</label>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success">Créer <i class="fas fa-user-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwoTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoTwo" aria-expanded="false" aria-controls="collapseTwoTwo">
                Ajout de livre
                </button>
            </h2>
            </div>
            <div id="collapseTwoTwo" class="collapse" aria-labelledby="headingTwoTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <form method="POST" action="createlivre.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampletext">Nom du Livre</label>
                            <input type="text" class="form-control" name="nom" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer le Nom du livre ici" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Résumé</label>
                            <textarea class="form-control" name="resume" id="exampleFormControlTextarea1" rows="3" placeholder="Entrer la Résumé ici"></textarea> 
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Année d'édition</label>
                            <input type="date" class="form-control" name="annee" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="AAAA-MM-JJ" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Nom de l'auteur</label>
                            <select class="form-control" name="auteur" id="exampleFormControlSelect1">
                                <?php foreach ($auteurs as $auteur): ?>
                                    <option value='<?=$auteur['id']?>'><?=$auteur['lastname']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Choissisez le genre du livre</label>
                            <select class="form-control" name="genre" id="exampleFormControlSelect1">
                                <?php foreach ($livres as $livre): ?>
                                    <option value='<?=$livre['id']?>'><?=$livre['nom']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choissisez l'image à importer</label>
                            <input type="file" name="sendfile" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class="btn btn-success">Ajouter <i class="fas fa-book"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTrois">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrois" aria-expanded="false" aria-controls="collapseTwoTwo">
                Ajout d'auteur
                </button>
            </h2>
            </div>
            <div id="collapseTrois" class="collapse" aria-labelledby="headingTrois" data-parent="#accordionExample">
                <div class="card-body">
                    <form method="POST" action="createauteur.php">
                        <div class="form-group">
                            <label for="exampletext">Prénom de l'auteur</label>
                            <input type="text" class="form-control" name="prenom" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer le Prénom de l'auteur ici" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Nom de l'auteur</label>
                            <input type="exampletext" class="form-control" name="nom" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer le Nom de l'auteur ici" required/>
                        </div>
                        <button type="submit" class="btn btn-success">Ajouter <i class="fas fa-user-edit"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>