<?php

require_once 'vendor/autoload.php';

$isEmailSent = "";

if (count($_POST) !== 0 && !is_null($_POST)) {
    $isEmailSent =<<<HTML
<div class="col-sm-12 alert alert-danger alert-dismissible show">
    <span>Erreur, votre email n'a pas pu être envoyé, veuillez réessayer plus tard</span>
</div>
HTML;
    if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['phone']) &&
        isset($_POST['email']) && isset($_POST['adress']) && isset($_POST['city']) && isset($_POST['postcode']) &&
        !is_null($_POST['lastname']) && !is_null($_POST['firstname']) && !is_null($_POST['phone']) &&
        !is_null($_POST['email']) && !is_null($_POST['adress']) && !is_null($_POST['city']) && !is_null($_POST['postcode'])) {

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
            ->setUsername('compte.asfeld@gmail.com')
            ->setPassword('6edb53506f062ec8b774f30fcd6dea3fd376a713');
        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message($_POST['subject']))
            ->setFrom($_POST['email'])
            ->setTo('sylvaincombraque@hotmail.fr')
            ->setBody($_POST['message'])
        ;

        $mailer->send($message);

        $isEmailSent =<<<HTML
<div class="col-sm-12 alert alert-success alert-dismissible show">
    <span>L'email a bien été envoyé, nous vous répondrons dans les plus brefs délais</span>
</div>
HTML;

    }
}

$html =<<<HTML
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Champagne Éric Marchand</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>

    <body class="text-center">

        <div class="cover-container d-flex w-100 h-100 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">LOGO ERIC MARCHAND</h3>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse col-md-12" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto col-md-12">
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#">Produits</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#">Histoire</a>
                                </li>
                                <li class="nav-item active text-center col-md-2">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="galerie.php">Galerie</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <div class="jumbotron jumbotron-fluid ">
                    <div class="container">
                        <h1 class="display-4">Où nous trouver ?</h1>
                        <p class="lead">Nous sommes à ...km de Reims...</p>
                        <iframe width="100%" height="400vh" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDF16u2-AcikeQ6v18-x_TFcxSoCXIKkpk&q=Champage+Eric+Marchand,Faverolles+et+Coemy" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid ">
                    <div class="container">
                        <h1 class="display-4">Nous contacter / commander</h1>
                        <p class="lead">e.......</p>
                        {$isEmailSent}
                        <form method="post" action="/contact.php">
                            <div class="form-row container">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastname" placeholder="Nom" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstname" placeholder="Prénom" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="email" name="email" placeholder="Adresse email" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="phone" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Téléphone" required>
                                </div>
                                <div class="form-group col-md-2 col-sm-4">
                                    <input type="text" class="form-control" name="number" pattern="[0-9]{1,4}"  placeholder="N°">
                                </div>
                                <div class="form-group col-md-10 col-sm-8">
                                    <input type="text" class="form-control" name="adress" placeholder="Adresse" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="city" placeholder="Ville" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="postcode" pattern="[0-9]{5}" placeholder="Code postal" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Sujet" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="message" placeholder="Pourquoi souhaitez-vous nous contacter ?" required>
                                </div>
                            </div>
                            <div class="container col-sm-12 text-center">
                                <button class="btn btn-primary" type="submit">Contacter l'entreprise <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            <footer class="mastfoot s h-100 row">
                <div class="inner container">
                    <p id="socialnet"><a class="text-center col-md-4" href="https://www.facebook.com/Champagne-Eric-Marchand-653088821528194/" target="_blank"><i class="fab fa-facebook-square fa-1x"></i></a><i class="fab fa-1x fa-instagram"></i><i class="fab fa-1x fa-twitter"></i><i class="fab fa-1x fa-google-plus-g"></i></p>
                    <p class="text-center offset-md-4 col-md-4">Copyright 2018 Champagne Éric Marchand</p>
                    <p class="text-center offset-md-4 col-md-4">Tous droits réservés • Mentions Légales</p>
                </div>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>
    </body>
</html>
HTML;


echo $html;