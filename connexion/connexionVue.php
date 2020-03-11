<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body id="LoginForm">

    <?php include '../navbar/navbarController.php';?>

    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Connexion</h2>
                </div>
               <br>
                <form id="Login" action="connexionModel.php" method="POST">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="mdp" class="form-control" id="inputPassword" placeholder="Mot de passe"required>
                    </div>
                    <br>
                    <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
                </form>
            </div>
        </div>
    </div>
    </div>


</body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>