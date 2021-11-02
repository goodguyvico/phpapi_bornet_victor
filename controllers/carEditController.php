<?php

$edit = Car::updateCar($dbc, $_GET['id_car'], $_POST['seats'], $_POST['licencePlate'],
    $_POST['serialNumber'], $_POST['color'], $_POST['brand_id_brand'], $_POST['model_id_model']);