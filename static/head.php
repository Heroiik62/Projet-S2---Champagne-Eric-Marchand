<?php

return <<<HTML
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Champagne Éric Marchand</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body class="text-center">
    <style>    
        #produits {
            display: inline-block;
            margin-bottom: 2%;
            padding: 0 2% 1% 2%;
            border-right: 1px solid white;
        }

        #produits:last-child {
            border-right: 0;
        }
        .imgProduits {
              display: inline-block;
              vertical-align: top;
              margin: 10px 10px 10px 20px;
        }
        .imgProduits img {
              height: 200px;
        }
        .nomProd {
            margin: 20px 0 20px 0;
            text-decoration: underline;
        }
    </style>
        <div class="cover-container d-flex w-100 h-100 mx-auto flex-column">
HTML;
