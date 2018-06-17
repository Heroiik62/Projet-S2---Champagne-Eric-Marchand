<?php
require 'myPDO.include.php';
require 'volume.class.php';
require 'produit.class.php';
require 'gamme.class.php';

$head = require_once 'static/head.php';
$navbar = require_once 'static/navbar.php';
$footer = require_once 'static/footer.php';
$js_scripts = require_once 'static/js-scripts.php';

$html = <<<HTML
    {$head}
    {$navbar}

        <main role="main" class="inner cover">
            <div class="jumbotron jumbotron-fluid ">
                <div class="container">
                    <h1 class="display-4">Votre panier</h1>
                </div>
                <div class="container">
                    <div class="row" id="cart-review">
                        <div class="col-sm-12 alert alert-primary text-center">
                            <h3>Chargement de votre panier en cours <i class="fas fa-spinner fa-spin"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        {$footer}
        {$js_scripts}
        
        <script type="text/javascript">
            let countArticles = 0;
            let articles = "";
        
            if (localStorage.getItem('shopping-cart') === null || localStorage.getItem('shopping-cart') === undefined) {
                localStorage.setItem('shopping-cart', JSON.stringify([]));
            }
            else {
                JSON.parse(localStorage.getItem('shopping-cart')).map((article) => {
                    articles += "<div class='col-sm-12' id='"+article.id+"'><h2>"+article.name+"</h2><div class='dropdown-divider'></div><ul>"
                    article.volumes.map((volume) => {
                        countArticles += volume.quantity;
                        articles += "<li>"+volume.quantity+" bouteille(s) de "+volume.name+"</li>"
                    });
                    articles += "</ul></div>";
                })
                
                articles += "<div class='col-sm-12'><h2>Résumé</h2><div class='dropdown-divider'></div><h3>Vous avez "+countArticles+" bouteille(s) dans votre panier pour un total de XXX euros</h3></div>"
            }
            $('#shopping-cart').text(countArticles);
            $('#cart-review').html(articles);
        </script>
    </body>
</html>
HTML;
echo $html;