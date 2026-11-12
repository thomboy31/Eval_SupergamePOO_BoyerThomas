<?php


require_once 'Model/Model.php';
require_once 'Model/ModelPlayer.php';
require_once 'View/View.php';
require_once 'View/ViewHome.php';
require_once 'Controller/Controller.php';
require_once 'Controller/ControllerHome.php';


$model = new ModelPlayer();
$view = new ViewHome();


$controller = new ControllerHome($model, $view);
$controller->registerPlayer();
$controller->displayPlayers();
$controller->render();