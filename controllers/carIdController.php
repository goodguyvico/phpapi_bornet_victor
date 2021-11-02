<?php

$json = Car::getCarBySerialNumberJson($dbc, $_GET['serialNumber']);
echo $json;