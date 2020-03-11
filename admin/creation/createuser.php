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



if(isset($_SESSION['statut']) && !empty($_SESSION['statut']) && $_SESSION['statut'] == "admin" && isset($_SESSION['nom']) && !empty($_SESSION['nom'])):

    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['password']) 
        && !empty($_POST['password']) && isset($_POST['statut']) && !empty($_POST['statut']) 
        && isset($_POST['adresse']) && !empty($_POST['adresse']) && isset($_POST['email']) && !empty($_POST['email'])):
    
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $pwd = htmlspecialchars($_POST['password']);
        $password = htmlspecialchars(PASSWORD_HASH($pwd, PASSWORD_DEFAULT));
        $email =  htmlspecialchars($_POST['email']);
        $statut = $_POST['statut'];
        $adresse = htmlspecialchars($_POST['adresse']);

        $verifuser = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
        $verifuser->bindParam(':email',$email,PDO::PARAM_STR);
        $verifuser->execute();
        $result = $verifuser->fetchColumn();

        if($result > 0){
             $resultat=$error;
        }
        else{
           
            $createuser = $pdo->prepare("INSERT INTO `utilisateurs` (`prenom` , `nom`, `statut`,`email`, `mdp`, `adresse`) VALUES (:prenom, :nom, :statut, :email, :passworded, :adresse)");
            $createuser->bindParam(':nom',$nom,PDO::PARAM_STR);
            $createuser->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $createuser->bindParam(':email',$email,PDO::PARAM_STR);
            $createuser->bindParam(':passworded',$password,PDO::PARAM_STR);
            $createuser->bindParam(':statut',$statut,PDO::PARAM_STR);
            $createuser->bindParam(':adresse',$adresse,PDO::PARAM_STR);
            $createuser->execute();

        }

    else:
        header("Location:create.php");

    endif;
endif;

$success="Utilisateur $prenom $nom créé !";

if($_SESSION['statut'] == "abonné"):
    header("Location:");
endif;

if(!isset($_SESSION['statut']) || !isset($_SESSION['nom']) || empty($_SESSION['statut'] || $_SESSION['nom'])):
    header("Location:../../connexion/connexionController.php");
endif;

if($createuser):
    echo"<div class='alert alert-success' role='alert'>$success.</div>";
    header("Location:../users.php");
else: 
    echo"<div class='alert alert-danger' role='alert'>$error.</div>";
endif;

}


