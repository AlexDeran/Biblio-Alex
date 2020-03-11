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

$error="L'auteur existe déjà";

if(isset($_SESSION['statut']) && !empty($_SESSION['statut']) && $_SESSION['statut'] == "admin" && isset($_SESSION['nom']) && !empty($_SESSION['nom'])):

    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom'])):
    
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $verifuser = $pdo->prepare("SELECT COUNT(*) FROM auteurs WHERE lastname = :nom AND firstname = :prenom");
        $verifuser->bindParam(':nom',$nom,PDO::PARAM_STR);
        $verifuser->bindParam(':prenom',$prenom,PDO::PARAM_STR);
        $verifuser->execute();
        $result = $verifuser->fetchColumn();

        if($result > 0){
            echo"<div class='alert alert-danger' role='alert'> 
            $error.</div>";
            require "create.php";
        }
        else{
            $createuser = $pdo->prepare("INSERT INTO `auteurs` (`firstname` , `lastname`) VALUES (:prenom, :nom)");
            $createuser->bindParam(':nom',$nom,PDO::PARAM_STR);
            $createuser->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $createuser->execute();
            if($createuser):

                $success="Auteur $prenom $nom créé !";
                echo"<div class='alert alert-success' role='alert'> 
                    $success.</div>";
                    header('Location: ../auteurs.php');
            else:  
                $erreur ="Une erreur est survenue. Veuillez réessayer.";
                echo"<div class='alert alert-danger' role='alert'> 
            $erreur.</div>";
            require "create.php";
            endif;
        }
        
    endif;

   
    
endif;


if($_SESSION['statut'] == "abonné"):
    header("Location:");
endif;

if(!isset($_SESSION['statut']) || !isset($_SESSION['nom']) || empty($_SESSION['statut'] || $_SESSION['nom'])):
    header("Location:../../connexion/connexionController.php");
endif; 



}
