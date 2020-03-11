<?php
    session_start();

    $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8','root','');

    //on vérifie que la connexion s'effectue correctement
    if(!$pdo){
        echo "Erreur de connexion à la base de données.";
    } 
    else {
        //on setup pour les erreurs a retirer quand publication
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $error="Le livre existe déja";



    // if(isset($_SESSION['statut']) && !empty($_SESSION['statut']) && $_SESSION['statut'] == "admin" && isset($_SESSION['nom']) && !empty($_SESSION['nom'])):

        
        // $lastname = htmlspecialchars($_POST['lastname']);
        // $firstname = htmlspecialchars($_POST['firstname']);
        // $verifAuteur = $pdo->prepare("SELECT COUNT(*) FROM livres WHERE lastname = :lastname AND firstname = :firstname");
        // $verifAuteur->bindParam(':lastname',$lastname,PDO::PARAM_STR);
        // $verifAuteur->bindParam(':firstname',$firstname,PDO::PARAM_STR);
        // $verifAuteur->execute();
        // $result = $verifAuteur->fetchColumn();

        // if($result > 0){
        //         $resultat=$error;
        // }
        // else{
            
        // }
    }

    function getLivre($pdo){
        $id = $_GET['id'];

        $query = $pdo->prepare('SELECT * FROM livres WHERE id = :id');
        $array = array(
            'id' => $id,
        );
        $query->execute($array);

        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    function getAuteurs($pdo){
        $queryauteurs = $pdo->query('SELECT auteurs.lastname, auteurs.id FROM auteurs');
        if($queryauteurs):
            $auteurs = $queryauteurs->fetchAll(PDO::FETCH_ASSOC);
        else:
            $auteurs=false;
        endif;

        return $auteurs;
    }

    function getGenres($pdo){
        $querylivres = $pdo->query('SELECT genres.id, genres.nom FROM genres');
        if($querylivres):
            $genres = $querylivres->fetchAll(PDO::FETCH_ASSOC);
        else:
            $genres = false;
        endif;

        return $genres;
    }


    //endif;
    function displayInfoLivre() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $id = $_GET['id'];

        $query = $pdo->prepare('SELECT * FROM livres WHERE id = :id');
        $array = array(
            'id' => $id,
        );
        $query->execute($array);

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
        
        $data = $query->fetch(PDO::FETCH_ASSOC);

         /*if ($data = $query->fetch()) {
           echo ' <div class="card">
            <div class="card-header" id="headingTwoTwo">
            <h2 class="mb-0">
                Modifier le livre :
            </h2>
            </div>
                <div class="card-body">
                    <form method="POST" action="modifierLivre.php?id='.$data['id'].'" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampletext">Nom du Livre</label>
                            <input type="text" class="form-control" name="nom_update" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$data['titre'].'" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Résumé</label>
                            <textarea class="form-control" name="resume_update" id="exampleFormControlTextarea1" rows="3" value="'.$data['resume'].'" required></textarea> 
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Année d\'édition</label>
                            <input type="date" class="form-control" name="annee_update" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$data['date_edition'].'" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Nom de l\'auteur</label>
                            <select class="form-control" name="auteur_update" id="exampleFormControlSelect1" value="'.$data['auteur_id'].'">
                                <?php foreach ($auteurs as $auteur): ?>
                                    <option value="<?=$auteur["id"]?>"><?=$auteur["lastname"]?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Choissisez le genre du livre</label>
                            <select class="form-control" name="genre_update" id="exampleFormControlSelect2" value="'.$data['genre_id'].'">
                                <?php foreach ($livres as $livre): ?>
                                    <option value="<?=$livre["id"]?>"><?=$livre["nom"]?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choissisez l\'image à importer</label>
                            <input type="file" name="sendfile_update" class="form-control-file" id="exampleFormControlFile1" value="'.$data['img_src'].'">
                        </div>
                        <button type="submit" name="form_update" class="btn btn-success">Modifier <i class="fas fa-book"></i></button>
                    </form>
                </div>
            </div>
        </div>';
        }
        else
        {
            echo '<p>Aucun résultat n\'a été trouvé...</p>';
        }*/

        $query->closeCursor();
    }

    $livres = getGenres($pdo);
    $data = getLivre($pdo);
    $auteurs = getAuteurs($pdo);

    function updateInfoLivre($pdo, $data) {
        $titre = $_POST['nom_update'];
        $resume = $_POST['resume_update'];
        $date_edition = $_POST['annee_update'];
        $auteur_id = $_POST['auteur_update'];
        $genre_id = $_POST['genre_update'];
        $img_src = (!empty($_POST['img_src_update'])) ? $_POST['img_src_update'] : $data['img_src'];
        $id = $_GET['id'];

        $query = $pdo->prepare('UPDATE livres SET titre = :titre, `resume` = :resume, date_edition = :date_edition, auteur_id = :auteur_id, genre_id = :genre_id, img_src = :img_src WHERE id = :id');
        $query->bindParam(':titre',$titre,PDO::PARAM_STR);
        $query->bindParam(':resume',$resume,PDO::PARAM_STR);
        $query->bindParam(':date_edition',$date_edition,PDO::PARAM_STR);
        $query->bindParam(':auteur_id',$auteur_id,PDO::PARAM_STR);
        $query->bindParam(':genre_id',$genre_id,PDO::PARAM_STR);
        $query->bindParam(':img_src',$img_src,PDO::PARAM_STR);
        $array =array(
            'titre' => $titre,
            'resume' => $resume,
            'date_edition' => $date_edition,
            'auteur_id' => $auteur_id,
            'genre_id' => $genre_id,
            'img_src' => $img_src,
            'id' => $id
        );
        $query->execute($array);

        $query->closeCursor();
    }

    if (isset($_POST['form_update'])) {
        updateInfoLivre($pdo, $data);
        header('Location: http://localhost/www/php/biblio_coding/admin/livres.php');
    }
?>
    
<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Modifier</title>
    </head>
    
    <body>

        <?php include '../../navbar/navbarControllerCO.php';?>


            <?php //displayInfoLivre() ?>
            <?php if (isset($data) && !empty($data) && $data != false):?>
            <div class="card">
                <div class="card-header" id="headingTwoTwo">
                <h2 class="mb-0">
                    Modifier le livre :
                </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="modifierLivre.php?id=<?= $data['id']?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampletext">Nom du Livre</label>
                            <input type="text" class="form-control" name="nom_update" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['titre']?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Résumé</label>
                            <textarea class="form-control" name="resume_update" id="exampleFormControlTextarea1" rows="3" required><?= $data['resume']?></textarea> 
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Année d\'édition</label>
                            <input type="date" class="form-control" name="annee_update" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['date_edition']?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Nom de l\'auteur</label>
                            <select class="form-control" name="auteur_update" id="exampleFormControlSelect1">
                                <?php foreach ($auteurs as $auteur): ?>
                                    <?php if($data['auteur_id'] === $auteur['id']):?>
                                        <option value="<?=$auteur["id"]?>" selected><?=$auteur["lastname"]?></option>
                                    <?php endif; ?>
                                    <option value="<?=$auteur["id"]?>"><?=$auteur["lastname"]?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Choissisez le genre du livre</label>
                            <select class="form-control" name="genre_update" id="exampleFormControlSelect2">
                                <?php foreach ($livres as $livre): ?>
                                    <option value="<?=$livre["id"]?>"><?=$livre["nom"]?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choissisez l\'image à importer</label>
                            <input type="file" name="sendfile_update" class="form-control-file" id="exampleFormControlFile1" value="<?= $data['img_src']?>">
                        </div>
                        <button type="submit" name="form_update" class="btn btn-success">Modifier <i class="fas fa-book"></i></button>
                    </form>
                </div>
             </div>

            <?php endif;?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>

</html>
