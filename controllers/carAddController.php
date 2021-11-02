<?php
if (!empty ($_POST)):
    $add = Car::addCar($dbc, $_POST['seats'],$_POST['licensePlate'],$_POST['serialNumber'],$_POST['color'], $_POST['brand_id_brand'], $_POST['model_id_model']);
endif;
