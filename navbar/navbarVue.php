
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/www/php/biblio_coding/css/navbar.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark position-sticky ">
  <a class="navbar-brand" href="http://localhost/www/php/biblio_coding/">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Genres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach ($genre as $value) {
                echo "<a class='dropdown-item' ' href='http://localhost/www/php/biblio_coding/catalogue/controllers/genresController.php?genre=".$value["id"]."' >" .$value["nom"]. "</a>";
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
                echo "<a class='dropdown-item' ' href='http://localhost/www/php/biblio_coding/catalogue/controllers/auteursController.php?auteur=".$value["id"]."' >" .$value["lastname"]. "</a>";
            } ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/www/php/biblio_coding/catalogue/controllers/livresController.php">Catalogue</a>
      </li>
    </ul>
    <li class="nav-item">
      <a class="nav-link" id="login" href="http://localhost/www/php/biblio_coding/connexion/connexionController.php"><i class="login fas fa-sign-in-alt"></i>Login</a>
    </li>
  </div>
</nav>