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

        <!--
<div class="modal modal-dark fade" id="avertissement" tabindex="-1" role="dialog" aria-labelledby="ageAvertissment" aria-hidden="true" data-backdrop="static" data-keyboard="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Logo eric marchand</h5>
</div>
<div class="modal-body">
<form>

$year = date("Y");
$yearMinusHundred = $year-1;
$html .='<select>';
$html .= '<option value="2018" selected>2018</option>';
for($yearMinusHundred ; $yearMinusHundred >= $year - 100; $yearMinusHundred--) {
$html .= '<option value="' . $yearMinusHundred . '">' . $yearMinusHundred . '</option>';
}
$html .= '</select>';

$html .='</div>
<div class="modal-footer">';

if ($yearMinusHundred - $year >= 18) {
$html .='<button type="button" class="btn btn-primary">Entrer</button>';
} else {
$html .='<button type="button" class="btn btn-primary" data-dismiss="modal">Entrer</button>';
}

$html .= '</div>
</form>
</div>
</div>
</div>
-->

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
                                <li class="nav-item active text-center col-md-2">
                                    <a class="nav-link" href="#"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#">Produits</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#">Histoire</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li class="nav-item text-center col-md-2">
                                    <a class="nav-link" href="#">Galerie</a>
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
                <div id="sliderAccueil" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#sliderAccueil" data-slide-to="0" class="active"></li>
                        <li data-target="#sliderAccueil" data-slide-to="1"></li>
                        <li data-target="#sliderAccueil" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/grappe.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://archeochampagne.epernay.fr/wp-content/uploads/8_caves-de-lavenue-de-champagne_michel-jolyot-1923x580.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://ca.france.fr/sites/default/files/imagecache/ATF_Image_bandeau_v2/istock_champagne_ina_peters_5.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#sliderAccueil" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#sliderAccueil" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </div>

                <div class="jumbotron jumbotron-fluid row">
                    <div class="container col-md-12">
                        <h1 class="display-4">Nos vins et cépages :</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>

                        <div id="sliderChampagne" class="carousel slide offset-md-5 col-md-2" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img width="100px" class="" src="https://www.ruinart.com/sites/ruinart/files/2018-04/Ruinart-BlancDeBlancs-75-NK-T-OP-ERetailKit-123_728-1992.png" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>ACHETEZ :)</h5>
                                        <p>...</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img width="100px" class="" src="https://www.ruinart.com/sites/ruinart/files/2018-04/Ruinart-BlancDeBlancs-75-NK-T-OP-ERetailKit-123_728-1992.png" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>...</h5>
                                        <p>...</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#sliderChampagne" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#sliderChampagne" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Suivant</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">L'histoire du Champagne Éric Marchand :</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                    </div>
                </div>

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
</html>