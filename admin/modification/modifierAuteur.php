<?php
    session_start();

    $pdo =new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8','root','');

    //on vérifie que la connexion s'effectue correctement
    if(!$pdo){
        echo "Erreur de connexion à la base de données.";
    } 
    else {
        //on setup pour les erreurs a retirer quand publication
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $error="L'auteur existe déja.";



    // if(isset($_SESSION['statut']) && !empty($_SESSION['statut']) && $_SESSION['statut'] == "admin" && isset($_SESSION['nom']) && !empty($_SESSION['nom'])):

        
        // $lastname = htmlspecialchars($_POST['lastname']);
        // $firstname = htmlspecialchars($_POST['firstname']);
        // $verifAuteur = $pdo->prepare("SELECT COUNT(*) FROM auteurs WHERE lastname = :lastname AND firstname = :firstname");
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
    //endif;
    function displayInfoAutor() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $id = $_GET['id'];
        $query = $pdo->prepare('SELECT * FROM auteurs WHERE id = :id');
        $array =array(
            'id' => $id,
        );
        $query->execute($array);

        if ($data = $query->fetch()) {
            echo ' <div class="card">
            <div class="card-header" id="headingTrois">
            <h2 class="mb-0">
                Modification de l\'auteur :
            </h2>
            </div>
                <div class="card-body">
                    <form method="POST" action="modifierAuteur.php?id='.$data['id'].'">
                        <div class="form-group">
                            <label for="exampletext">Prénom de l\'auteur</label>
                            <input type="text" class="form-control" name="prenom_update" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$data['firstname'].'" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampletext">Nom de l\'auteur</label>
                            <input type="exampletext" class="form-control" name="nom_update" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$data['lastname'].'" required/>
                        </div>
                        <button type="submit" name="form_update" class="btn btn-success">Modifier <i class="fas fa-user-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>';
        }
        else
        {
            echo '<p>Aucun résultat n\'a été trouvé...</p>';
        }

        $query->closeCursor();
    }

    function updateInfoAutor() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $firstname = htmlspecialchars($_POST['prenom_update']);
        $lastname = htmlspecialchars($_POST['nom_update']);
        $id = $_GET['id'];

        $query = $pdo->prepare('UPDATE auteurs SET firstname = :firstname, lastname = :lastname WHERE id = :id');
        $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
        $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
        $array =array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'id' => $id
        );
        $query->execute($array);

        $query->closeCursor();
    }

    if (isset($_POST['form_update'])) {
        updateInfoAutor();
        header('Location: http://localhost/www/php/biblio_coding/admin/auteurs.php');
    }
?>
    
<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/styles.css">
        <title>Modifier</title>
    </head>
    
    <body>

        <?php include '../../navbar/navbarControllerCO.php';?>


        <?php displayInfoAutor() ;?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>

</html>
