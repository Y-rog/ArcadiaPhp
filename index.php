<?php
require_once 'config.php';

//Sécurise le cookie de session
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
]);

session_start();
define('_ROOTPATH_', __DIR__);
define('_TEMPLATESPATH_', _ROOTPATH_ . '/templates');


spl_autoload_register();

use App\Controller\Controller;
//Nous avons besoin de cette classe pour vérifer si l'utiliisateur est connecté
use App\Security\Security;
use App\Entity\User;

$controller = new Controller();
$controller->route();
