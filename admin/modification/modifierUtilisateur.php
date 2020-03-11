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

$error="L'utilisateur existe déjà ou l'identifiant et/ou le mot de passe existe(nt) déjà";



// if(isset($_SESSION['statut']) && !empty($_SESSION['statut']) && $_SESSION['statut'] == "admin" && isset($_SESSION['nom']) && !empty($_SESSION['nom'])):

    
    // $nom = htmlspecialchars($_POST['nom']);
    // $prenom = htmlspecialchars($_POST['prenom']);
    // $email = htmlspecialchars($_POST['email']);
    // $pwd = htmlspecialchars($_POST['password']);
    // $password = PASSWORD_HASH($pwd, PASSWORD_DEFAULT);
    // $verifuser = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE nom = :nom AND prenom = :prenom OR  mdp = :pwd OR  email = :email");
    // $verifuser->bindParam(':nom',$nom,PDO::PARAM_STR);
    // $verifuser->bindParam(':prenom',$prenom,PDO::PARAM_STR);
    // $verifuser->bindParam(':pwd',$password,PDO::PARAM_STR);
    // $verifuser->bindParam(':email',$email,PDO::PARAM_STR);
    // $verifuser->execute();
    // $result = $verifuser->fetchColumn();

    // if($result > 0){
    //         $resultat=$error;
    // }
    // else{
        
    // }
}
//endif;
    function displayInfoUser() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $id = $_GET['id'];
        $query = $pdo->prepare('SELECT * FROM utilisateurs WHERE id = :id');
        $array =array(
            'id' => $id,
        );
        $query->execute($array);

        if ($data = $query->fetch()) {
            echo '<div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    Modification d\'utilisateur :
                </h2>
            </div>
            <div class="card-body">
                <form method="POST" action="modifierUtilisateur.php?id='.$data['id'].'">
                    <div class="form-group">
                        <label for="exampletext">Prénom</label>
                        <input type="text" class="form-control" name="prenom_update" id="exampleInputEmail1" aria-describedby="nameHelp" value="'.$data['prenom'].'" required/>
                        <label for="exampletext">Nom</label>
                        <input type="text" class="form-control" name="nom_update" id="exampleInputEmail1" aria-describedby="nameHelp" value="'.$data['nom'].'" required/>
                        <label for="exampletext">Adresse</label>
                        <input type="text" class="form-control" name="adresse_update" id="exampleInputEmail1" aria-describedby="AdressHelp" value="'.$data['adresse'].'" required/>
                        <label for="exampleInputEmail1">E-Mail</label>
                        <input type="email" class="form-control" name="email_update" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$data['email'].'" required/>
                        <label for="exampleInputPassword">Mot de Passe</label>
                        <input type="password" class="form-control" name="password_update" id="exampleInputPassword1" value="'.$data['mdp'].'" required/>
                        <label for="exampleInputDate_abonnement">Date abonnement</label>
                        <input type="date" class="form-control" name="date_abonnement_update" id="exampleInputDate_abonnement1" value="'.$data['date_abonnement'].'" required/>
                    </div>
                    <p> Quel statut pour l\'utilisateur ?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="statut_update" id="inlineRadio1" value="admin" required/>
                        <label class="form-check-label" for="inlineRadio1">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="statut_update" id="inlineRadio2" value="abonne" required/>
                        <label class="form-check-label" for="inlineRadio2">Abonné</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="statut_update" id="inlineRadio3" value="non_abonne" required/>
                        <label class="form-check-label" for="inlineRadio2">Non-abonné</label>
                    </div>
                    <br>
                    <br>
                    <button type="submit" name="form_update" class="btn btn-success">Modifier <i class="fas fa-user-plus"></i></button>
                </form>
            </div>
        </div>';
        }
        else
        {
            echo '<p>Aucun résultat n\'a été trouvé...</p>';
        }

        $query->closeCursor();
    }

    function updateInfoUser() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $prenom = htmlspecialchars($_POST['prenom_update']);
        $nom = htmlspecialchars($_POST['nom_update']);
        $adresse = htmlspecialchars($_POST['adresse_update']);
        $email = htmlspecialchars($_POST['email_update']);
        $mdp = htmlspecialchars($_POST['password_update']);
        $date_abonnement = htmlspecialchars($_POST['date_abonnement_update']);
        $statut = htmlspecialchars($_POST['statut_update']);
        $id = $_GET['id'];

        $query = $pdo->prepare('UPDATE utilisateurs SET prenom = :prenom, nom = :nom, adresse = :adresse, email = :email, mdp = :mdp, date_abonnement = :date_abonnement, statut = :statut WHERE id = :id');
        $query->bindParam(':nom',$nom,PDO::PARAM_STR);
        $query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
        $query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':mdp',$mdp,PDO::PARAM_STR);
        $query->bindParam(':date_abonnement',$date_abonnement,PDO::PARAM_STR);
        $query->bindParam(':statut',$statut,PDO::PARAM_STR);
        $array =array(
            'prenom' => $prenom,
            'nom' => $nom,
            'adresse' => $adresse,
            'email' => $email,
            'mdp' => $mdp,
            'date_abonnement' => $date_abonnement,
            'statut' => $statut,
            'id' => $id
        );
        $query->execute($array);

        $query->closeCursor();
    }

    if (isset($_POST['form_update'])) {
        updateInfoUser();
        header('Location: http://localhost/www/php/biblio_coding/admin/users.php');
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


        <?php displayInfoUser() ;?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>

</html>
