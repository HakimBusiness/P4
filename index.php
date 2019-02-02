<?php
#faire appel au file Router.php
require_once ("Controllers/Router.php");
$router = new Router();
$router->routerReq();
