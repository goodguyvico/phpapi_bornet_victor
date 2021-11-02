<?php
spl_autoload_register(function ($class) {
    require_once 'models/' . $class . '.php';
});
$dbc = new Database();


if (!empty($_GET)):
    switch ($_GET['action']):
        case 'list':
            include('controllers/carListController.php');
            break;
        case 'car':
            include('controllers/carIdController.php');
            break;
        case 'caradd':
            include('controllers/carAddController.php');
            break;
        case 'caredit':
            include('controllers/carEditController.php');
            break;
        case 'cardelete':
            include('controllers/carDeleteController.php');
            break;
        case 'vehiculesapi':
            include('controllers/vehiculesApiController.php');
            break;
    endswitch;
endif;