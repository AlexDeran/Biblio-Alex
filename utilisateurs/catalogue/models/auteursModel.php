<?php
    if(isset($_GET['auteur']) && !empty($_GET['auteur'])):
        $id = htmlspecialchars($_GET['auteur']);
    else:
        header('Location: 404.php');
    endif;
    $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryInfo = $pdo->prepare("SELECT livres.id, livres.titre, livres.img_src, livres.resume, livres.date_edition, auteurs.lastname, genres.nom FROM livres INNER JOIN genres ON livres.genre_id = genres.id INNER JOIN auteurs ON livres.auteur_id = auteurs.id WHERE auteurs.id = :id");
    $queryInfo->bindParam(':id', $id, PDO::PARAM_INT);
    $queryInfo->execute();
    $row = $queryInfo->fetchAll(PDO::FETCH_ASSOC);
    if (!$row) {
        header ('Location: 404.php');
    }
