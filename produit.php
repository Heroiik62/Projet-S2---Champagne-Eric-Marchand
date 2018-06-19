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
                        <h1 class="display-4">Nos produits :</h1>
                         <p class="lead">Achetez vos produits en cliquant sous les bouteilles.</p>
                        <div class="row">
HTML;
$products = (Produit::getProduits());

foreach ($products as $product) {
    $buttons = "";
    $priceIndex = 0;
    $prices = $product->getPrix();
    $pricesList = "";

    foreach ($product->getVolumes() as $vol) {
        $volume = Volume::createFromID($vol)->getVolume();
        $volume >= 100 ?
            $volume = ($volume/100).'L' : $volume .= 'cL';
        $priceIndex === 0 ? $pricesList .= $prices[$priceIndex] : $pricesList .= ' / '.$prices[$priceIndex];
        $buttons .=<<<HTML
<button class="btn btn-info" onclick="addtoCart($(this))" value="{$prices[$priceIndex]}" id="{$product->getId()}-{$volume}-{$product->getNom()}">{$volume}</button>
HTML;
        $priceIndex++;
    }

    $html .=<<<HTML
<div class="col-sm-12 col-md-4 col-lg-3 container">
    <div class="imagesProducts">
        <img src="imageProduct.php?bouteille={$product->getNom()}" class="img-thumbnail transparent-image" alt="Produit n°{$product->getId()}"/>
        <h3>{$product->getNom()}</h3>
        <span class="text-muted">{$product->getDescription()}</span>
        <p class="text-white">Prix : {$pricesList}€</p>
        <div class="container">
            <p>Ajouter au panier</p>
            {$buttons}
        </div>
    </div>
</div>
HTML;

}

$html.= <<<HTML
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
                    })
                })
            }
            $('#shopping-cart').text(countArticles);
            console.log(JSON.parse(localStorage.getItem('shopping-cart')))
            
            function addtoCart(obj) {
                let currentObject = obj.attr('id').split('-');
                let currentCart = JSON.parse(localStorage.getItem('shopping-cart'));
                let hasCartObject = false;
                let hasVolume = false;
                currentCart.map((currentCartObject) => {
                    if (parseInt(currentCartObject.id) == currentObject[0]) {
                        hasCartObject = true;
                        currentCartObject.volumes.map((volume) => {
                            if (volume.name == currentObject[1]) {
                                    volume.quantity += 1;
                                    hasVolume = true;
                            }
                        });
                        
                        if (!hasVolume) {
                            currentCartObject.volumes.push({name: currentObject[1], quantity: 1, price: obj.attr('value')});
                        }
                    }
                });
                
                if (!hasCartObject) {
                    currentCart.push({id: currentObject[0], name: currentObject[2], volumes: [{name: currentObject[1], quantity: 1, price: obj.attr('value')}]})
                }
                
                countArticles++;
                $("#shopping-cart").text(countArticles);
                localStorage.setItem('shopping-cart', JSON.stringify(currentCart));
            }
        </script>
    </body>
</html>
HTML;
echo $html;