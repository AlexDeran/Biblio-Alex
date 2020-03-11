<?php
    session_start();
    function emprunt() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $id_livre = htmlspecialchars( $_GET['id_livre']);
        $id_utilisateur = $_SESSION['id'];
        $date_emprunt = date ('y,m,j');
        $rendu = 0;

        $queryEmprunts = $pdo->prepare("SELECT * FROM emprunts WHERE emprunts.id_utilisateur = :id AND emprunts.rendu = 0");
        $queryEmprunts->bindParam(':id', $id_utilisateur, PDO::PARAM_STR);
        $queryEmprunts->execute();
        if ($queryEmprunts) {
            $emprunts = $queryEmprunts->fetchAll(PDO::FETCH_ASSOC);
        }
        $numberOfEmprunts = count($emprunts);

        $queryLivre = $pdo->prepare("SELECT * FROM emprunts WHERE emprunts.id_livre = :id_livre AND emprunts.rendu = 0");
        $queryLivre->bindParam(':id_livre', $id_livre, PDO::PARAM_STR);
        $queryLivre->execute();
        if ($queryLivre) {
            $livre = $queryLivre->fetchAll(PDO::FETCH_ASSOC);
        }
        $numberOflivre = count($livre);

        if ($numberOfEmprunts>=3) {
            echo"<div class='alert alert-danger' role='alert'>Vous ne pouvez pas emprunter ce livre car vous avez déjà atteint le maximum d'emprunts possible (3 maximum).</div>";
            header('Location: ./controllers/livresController.php');
        } elseif ($numberOflivre>0) {
            echo"<div class='alert alert-danger' role='alert'>Vous ne pouvez pas emprunter ce livre car il est déjà emprunté.</div>";
            header('Location: ./controllers/livresController.php');
        } else {
            $query = $pdo->prepare("INSERT INTO `emprunts` (`id_livre` , `id_utilisateur`, `date_emprunt`, `rendu`) VALUES (:id_livre, :id_utilisateur, :date_emprunt, :rendu)");
            $query->bindParam(':id_livre',$id_livre,PDO::PARAM_STR);
            $query->bindParam(':id_utilisateur',$id_utilisateur,PDO::PARAM_STR);
            $query->bindParam(':date_emprunt',$date_emprunt,PDO::PARAM_STR);
            $query->bindParam(':rendu',$rendu,PDO::PARAM_STR);
            $query->execute();
            header('Location: ../infoUtilisateur.php');
        }
    }

    emprunt();
    