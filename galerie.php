<?php

$head = require_once 'static/head.php';
$navbar = require_once 'static/navbar.php';
$footer = require_once 'static/footer.php';
$js_scripts = require_once 'static/js-scripts.php';

echo<<<HTML
    {$head}
    {$navbar}
            <main role="main" class="inner cover">
                <div class="jumbotron jumbotron-fluid row">
                    <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white;">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <img src="" class="enlargeImageModalSource" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container col-md-12">
                       <h1 class="display-4">Galerie d'images :</h1>
                        <p class="lead">Voici les photos prise lors d'évènements...</p>
                        <img src="img/vigne1.jpg" alt="vigne" class="img-square">
                        <img src="img/vigne4.jpg" alt="vigne" class="img-square">
                        <img src="img/vigne3.jpg" alt="vigne" class="img-square">
                        <img src="img/vigne2.jpg" alt="vigne" class="img-square">
                        <img src="img/medaille.jpg" alt="medaille" class="img-square">
                        <img src="img/grappe.jpg" alt="grappe" class="img-square">
                    </div>
                </div>
            </main>

            {$footer}
            {$js_scripts}
        
            <script type="text/javascript">
                let countArticles = 0;
            
                if (localStorage.getItem('shopping-cart') === null || localStorage.getItem('shopping-cart') === undefined) {
                    localStorage.setItem('shopping-cart', JSON.stringify([]));
                }
                else {
                    JSON.parse(localStorage.getItem('shopping-cart')).map((article) => {
                        article.volumes.map((volume) => {
                            countArticles += volume.quantity;
                        });
                    })
                }
                $('#shopping-cart').text(countArticles);
            </script>
    </body>
</html>
HTML;
