<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles.css">
        <title>Bibliothèque coding</title>
    </head>

    <body id="home">

        <?php require './navbar/navbarController.php';?>
        <header>
            <div class="col-12">
                <h1 id="hometitle">Bienvenue dans la bibliothèque Coding !</h1>
                <p id="hometext">Notre bibliothèque vous propose un large choix de livres classés par genre. Il y en aura forcément un pour vous plaire ! </p>
            </div>
            <div class="row">
                <div class="col-5">
                </div>
                <div class="col-1">
                    <a class="btn btn-dark" href="http://localhost/www/php/biblio_coding/catalogue/controllers/livresController.php">Catalogue</a>
                </div>
                <div class="col-6">
                    <a class="btn btn-dark" href="http://localhost/www/php/biblio_coding/connexion/connexionController.php">Se Connecter</a>
                </div>
            </div>
            <a href="#" class="scroll-down" address="true"></a>
        </header>

        <main>
            <section class="ok">
                <div class="container mt-40">
                    <h3 class="text-center titre">Exemple de livres</h3>
                    <hr>
                    <div class="row mt-30">
                        <div class="col-md-3 col-sm-6">
                            <div class="box15">
                                <img src="img/lsda.jpg" alt="">
                                <div class="box-content">
                                    <h3 class="title">Le seigneur des anneaux</h3>
                                    <ul class="icon">
                                        <p>Par J.R.R Tolkien</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="box15">
                                <img src="img/robot.jpg" alt="">
                                <div class="box-content">
                                    <h3 class="title">Le cycle des robots</h3>
                                    <ul class="icon">
                                        <p>Par Isaac Asimov</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="box15">
                                <img src="img/parasites.jpeg" alt="">
                                <div class="box-content">
                                    <h3 class="title">Parasites</h3>
                                    <ul class="icon">
                                        <p>Par Murakami Riû</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="box15">
                                <img src="img/royaume_devins.jpg" alt="">
                                <div class="box-content">
                                    <h3 class="title">Le royaume des devins</h3>
                                    <ul class="icon">
                                        <p>Par Clive Barker</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer>
        </footer>
        <script src="js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    </body>

</html>