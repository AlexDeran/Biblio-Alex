
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/www/php/biblio_coding/css/navbar.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark position-sticky ">
<?php if($_SESSION['statut'] == 'admin'){?><a class="navbar-brand" href="http://localhost/www/php/biblio_coding/admin/emprunts.php">Emprunts</a>
  <?php } else { ?> <a class="navbar-brand" href="http://localhost/www/php/biblio_coding/utilisateurs/infoUtilisateur.php">Profil</a><?php }?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if($_SESSION['statut'] == 'admin') {?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/www/php/biblio_coding/admin/auteurs.php">Gestion des Auteurs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/www/php/biblio_coding/admin/livres.php">Gestion des Livres</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/www/php/biblio_coding/admin/users.php">Gestion des Utilisateurs</a>
      </li>
    <?php } else { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Genres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach ($genre as $value) {
                echo "<a class='dropdown-item' ' href='http://localhost/www/php/biblio_coding/utilisateurs/catalogue/controllers/genresController.php?genre=".$value["id"]."' >" .$value["nom"]. "</a>";
            } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Auteurs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach ($author as $value) {
                echo "<a class='dropdown-item' ' href='http://localhost/www/php/biblio_coding/utilisateurs/catalogue/controllers/auteursController.php?auteur=".$value["id"]."' >" .$value["lastname"]. "</a>";
            } ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/www/php/biblio_coding/utilisateurs/catalogue/controllers/livresController.php">Catalogue</a>
      </li>
    <?php  } ?>
    </ul>
    <li class="nav-item">
      <a class="nav-link" id="logout" href="http://localhost/www/php/biblio_coding/connexion/logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
    </li>
  </div>
</nav>