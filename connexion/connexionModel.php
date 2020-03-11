<?php
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['mdp'])):

    // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1"); 
    // le htmlspecialchars() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
    $mdp = htmlspecialchars($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");

    //on se connecte à la base de données:
    $pdo =new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8','root','');

    //on vérifie que la connexion s'effectue correctement
    if(!$pdo):
        echo "Erreur de connexion à la base de données.";
    else:

        $stat = $pdo->prepare ("SELECT statut  FROM utilisateurs WHERE utilisateurs.email  = :email ");
        $stat->bindParam(':email',$email,PDO::PARAM_STR);
        $stat->execute();
        $statu = $stat->fetch();
        $statut= $statu ['statut'];


        $req = $pdo->prepare("SELECT mdp  FROM utilisateurs  WHERE utilisateurs.email = :email"); 
        $req->bindParam(':email',$email,PDO::PARAM_STR);
        $req->execute();
        $pwd = $req->fetch();
        $password = $pwd['mdp'];
        $pwd = password_verify($mdp,$password);

        if ($pwd):

            $nam = $pdo->prepare("SELECT nom  FROM utilisateurs WHERE utilisateurs.email = :email");
            $nam->bindParam(':email',$email,PDO::PARAM_STR);
            $nam->execute();
            $name = $nam->fetch();
            $nom = $name['nom'];

            $firstnam = $pdo->prepare("SELECT prenom FROM utilisateurs WHERE utilisateurs.email = :email");
            $firstnam->bindParam(':email',$email,PDO::PARAM_STR);
            $firstnam->execute();
            $firstname = $firstnam->fetch();
            $prenom = $firstname['prenom'];

            $iduser = $pdo->prepare("SELECT id FROM utilisateurs WHERE utilisateurs.email = :email");
            $iduser->bindParam(':email',$email,PDO::PARAM_STR);
            $iduser->execute();
            $idU = $iduser->fetch();
            $id = $idU['id'];
            
            switch($statut):

                case 'admin':
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['statut'] = $statut;
                    $_SESSION['id'] = $id;
                    header("Location:../admin/emprunts.php");
                break;
                    
                case 'abonne':
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['statut'] = $statut;
                    $_SESSION['id'] = $id;
                    header("Location:../utilisateurs/infoUtilisateur.php");
                break;
                    
                case 'non_abonne':
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['statut'] = $statut;
                    $_SESSION['id'] = $id;
                    header("Location:../utilisateurs/infoUtilisateur.php");
                break;
            endswitch;
        
        else:
            echo '
            <div class="alert alert-danger" role="alert">
            Identifiant et/ou mot de passe incorrect(s). 
            Veuillez réessayer en faisant bien attention aux majuscules et aux minuscules.
            </div>';
            include 'connexionController.php';
        endif;
    endif;
else:
    echo '
    <div class="alert alert-danger" role="alert">
    Identifiant et/ou mot de passe incorrect(s). 
    Veuillez réessayer en faisant bien attention aux majuscules et aux minuscules.
    </div>';
    include 'connexionController.php'; 
endif;
