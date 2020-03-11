<?php
    function deleteUser() {
        $pdo = new PDO('mysql:host=localhost; dbname=biblio_coding; charset=utf8', 'root', '');
        $id = $_GET['id'];
        $query = $pdo->prepare('DELETE FROM utilisateurs WHERE id = :id');
        $array =array(
            'id' => $id,
        );
        $query->execute($array);
        header('Location: ../users.php');
    }

    deleteUser();
    