<?php

    $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryGenres = $pdo->prepare('SELECT genres.nom, genres.id FROM genres');
    $queryGenres->execute();
    if ($queryGenres) {
        $genre = $queryGenres->fetchAll(PDO::FETCH_ASSOC);
    }
    $queryAuthors = $pdo->prepare('SELECT auteurs.lastname, auteurs.id FROM auteurs');
    $queryAuthors->execute();
    if ($queryAuthors) {
        $author = $queryAuthors->fetchAll(PDO::FETCH_ASSOC);
    }
