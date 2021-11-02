<?php

$response = file_get_contents('https://api.thecatapi.com/v1/breeds?limit=100&page=0');
$cats = json_decode($response);

// l'affichage n'est pas fini.

include 'views/catListView.php';