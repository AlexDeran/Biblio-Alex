<?php
session_start();
$pdo =new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8','root','');

$success= "L'envoi a bien été effectué";
$error= "Livre déja existant";

if(isset($_SESSION['statut']) && !empty($_SESSION['statut']) && $_SESSION['statut'] == "admin" 
&& isset($_SESSION['nom']) && !empty($_SESSION['nom'])):


    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['resume']) && !empty($_POST['resume']) 
    && isset($_POST['annee']) && !empty($_POST['annee']) && isset($_POST['auteur']) 
    && !empty($_POST['auteur']) && isset($_POST['genre']) && !empty($_POST['genre'])):
        

        if (isset($_FILES['sendfile']) AND ($_FILES['sendfile']['error'] == 0)):

            $uploaddir = '../../img/';
            $uploadfile = $uploaddir . basename($_FILES['sendfile']['name']);
            $maxsize = 5000000;

            if ($_FILES['sendfile']['size'] < $maxsize):  
                
                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'svg');

                $extension_upload = strtolower(  substr(  strrchr($_FILES['sendfile']['name'], '.')  ,1)  );

                if (in_array($extension_upload,$extensions_valides)):

                    $movefile = move_uploaded_file($_FILES['sendfile']['tmp_name'], $uploaddir . basename($_FILES['sendfile']['name']));
                    
                    if ($movefile):
                            
                        $titre = htmlspecialchars($_POST["nom"],ENT_QUOTES);
                        $resume = htmlspecialchars($_POST["resume"],ENT_QUOTES);
                        $date = date ('y,m,j');
                        $imgname = $_FILES['sendfile']['name'];
                        $edition = $_POST["annee"];
                        $auteurs = htmlspecialchars($_POST["auteur"],ENT_QUOTES);
                        $genres = htmlspecialchars($_POST["genre"],ENT_QUOTES);
                    endif;
                endif;
            endif;
                 
        else:
            $titre = htmlspecialchars($_POST["nom"],ENT_QUOTES);
            $resume = htmlspecialchars($_POST["resume"],ENT_QUOTES);
            $date = date ('y,m,j');
            $imgname='not_found.png';
            $edition = $_POST["annee"];
            $auteurs = htmlspecialchars($_POST["auteur"],ENT_QUOTES);
            $genres = htmlspecialchars($_POST["genre"],ENT_QUOTES);
        endif; 

        $veriflivre = $pdo->prepare("SELECT COUNT(*) FROM livres WHERE titre = :nom");
        $veriflivre->bindParam(':nom',$titre,PDO::PARAM_STR);
        $veriflivre->execute();
        $result = $veriflivre->fetchColumn();

        if($result > 0){
             $resultat=$error;
        }
        else{

            $createlivre = $pdo->prepare("INSERT INTO livres (`titre`, `date_edition`, `date_ajout`, `auteur_id`, `genre_id`, `resume`,`img_src`)
            VALUES (:nom ,:publication,:ajout,:auteur,:genre,:resumes,:img)");
            $createlivre->bindParam(':nom',$titre,PDO::PARAM_STR);
            $createlivre->bindParam(':publication',$edition,PDO::PARAM_STR);
            $createlivre->bindParam(':ajout',$date,PDO::PARAM_STR);
            $createlivre->bindParam(':auteur',$auteurs,PDO::PARAM_INT);
            $createlivre->bindParam(':genre',$genres,PDO::PARAM_INT);
            $createlivre->bindParam(':resumes',$resume,PDO::PARAM_STR);
            $createlivre->bindParam(':img', $imgname,PDO::PARAM_STR);
            $createlivre->execute();
        
            $success="Livre $titre créé !";

            
        if($createlivre):

        echo"<div class='alert alert-success' role='alert'> 
            $success.</div>";
            header('Location: ../livres.php');

        else: echo"<div class='alert alert-danger' role='alert'>$error</div>";
        require "create.php";

        endif;
    }
endif;

    $erreur="Le fichier n'a pas pu être importer. 
    Le fichier est soit supérieur à 5 MO, soit son extension n'est pas valide ou alors le fichier à déja été importé précédemment. 
    Veuillez vérifier et réessayer si ce n'est pas le cas.";
    
   //on vérifie le statut de l'utilisateur si il est autreque admin il n'a pas le droit de consulter la page et est redirigé.

    if($_SESSION['statut'] == "abonne"):
        header("Location:../../utilisateurs/infoUtilisateur.php");
    endif;

    // de même pour une session qui expire il sera déconnecté et renvoyé à l'écran de connexion pour se reconnecté.

   if(!isset($_SESSION['statut']) || !isset($_SESSION['nom']) || empty($_SESSION['statut'] || $_SESSION['nom'])):
        header("Location:../../connexion/connexionController.php");
    endif; 

endif;
    // on determine que si certains champs n'ont pas été remplis ont redirige vers la page preécédente.


