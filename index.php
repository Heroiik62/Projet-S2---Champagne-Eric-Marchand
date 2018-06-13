<?php

$html ='<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Champagne Éric Marchand</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>

    <body class="text-center">' .

//        <div class="modal modal-dark fade" id="avertissement" tabindex="-1" role="dialog" aria-labelledby="ageAvertissment" aria-hidden="true" data-backdrop="static" data-keyboard="true">
//            <div class="modal-dialog modal-lg" role="document">
//                <div class="modal-content">
//                    <div class="modal-header">
//                        <h5 class="modal-title">Logo eric marchand</h5>
//                    </div>
//                    <div class="modal-body">
//                        <form>';
//
//$year = date("Y");
//$yearMinusHundred = $year-1;
//$html .='<select>';
//$html .= '<option value="2018" selected>2018</option>';
//for($yearMinusHundred ; $yearMinusHundred >= $year - 100; $yearMinusHundred--) {
//    $html .= '<option value="' . $yearMinusHundred . '">' . $yearMinusHundred . '</option>';
//}
//$html .= '</select>';
//
//$html .='</div>
//<div class="modal-footer">';
//
//if ($yearMinusHundred - $year >= 18) {
//    $html .='<button type="button" class="btn btn-primary">Entrer</button>';
//} else {
//    $html .='<button type="button" class="btn btn-primary" data-dismiss="modal">Entrer</button>';
//}
//
//$html .= '</div>
//                    </form>
//                </div>
//            </div>
//        </div>

        '<div class="cover-container d-flex w-100 h-100 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">LOGO ERIC MARCHAND</h3>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Produits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Histoire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Galerie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <h1 class="cover-heading">Cover your page.</h1>
                <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
                <p class="lead">
                    <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
                </p>
            </main>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
                </div>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>
    </body>
</html>';

echo $html;