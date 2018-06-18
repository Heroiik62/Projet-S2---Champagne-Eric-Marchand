<?php

if (isset($_GET['bouteille']) && !is_null($_GET['bouteille'])) {
    header('Content-Type: image/png');
    $name = str_replace(' ', '-', strtolower($_GET['bouteille']));
    if (file_exists('img/'.$name.'.png')) {
        readfile('img/'.$name.'.png');
    }
}