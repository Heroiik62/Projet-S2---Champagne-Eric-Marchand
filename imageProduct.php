<?php

if (isset($_GET['bouteille']) && !is_null($_GET['bouteille'])) {
    header('Content-Type: image/jpg');
    $name = str_replace(' ', '-', strtolower($_GET['bouteille']));
    if (file_exists('img/'.$name.'.jpg')) {
        readfile('img/'.$name.'.jpg');
    }
}