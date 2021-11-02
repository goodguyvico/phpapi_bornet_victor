<?php

$edit = Car::updateCar($dbc, $_GET['id_car'], $_POST['seats'], $_POST['licensePlate'], $_POST['serialNumber'], $_POST['color']);