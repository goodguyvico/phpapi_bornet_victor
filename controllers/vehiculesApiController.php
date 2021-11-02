<?php
// Connexion avec l'api qui donne la liste des marques de voiture.

$response = file_get_contents('https://the-vehicles-api.herokuapp.com/brands/');
$Deps = json_decode($response);

var_dump($Deps);