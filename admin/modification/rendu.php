<?php
    function modifRendu() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $id_livre = $_GET['id_livre'];
        $id_utilisateur = $_GET['id_utilisateur'];
        $query = $pdo->prepare('UPDATE emprunts SET emprunts.rendu = 1 WHERE id_livre = :id_livre AND id_utilisateur = :id_utilisateur');
        $array =array(
            'id_livre' => $id_livre,
            'id_utilisateur' => $id_utilisateur,
        );
        $query->execute($array);
        header('Location: ../emprunts.php');
    }

    modifRendu();
    