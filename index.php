<?php

ob_start();
session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
$router = new Router(site());
$router->namespace(namespace: "Source\Controllers");

/** SITE */
$router->group(group: null);
$router->get(route: "/", handler: "Web:login", name: "web.login");
$router->get(route: "/cadastrar", handler: "Web:register", name: "web.register");
$router->get(route: "/recuperar", handler: "Web:forget", name: "web.forget");
$router->get(route: "/senha/{email}/{forget}", handler: "Web:reset", name: "web.reset");
$router->get(route: "/error", handler: "Web:error", name: "web.error");

/** AUTH */

/** AUTH SOCIAL */

/** PROFILE */

/** ERRORS */
$router->group(group: "ops");
$router->get(route: "/{errcode}", handler: "Web.error", name: "web.error");

/** ROUTE PROCESS */
$router->dispatch();

/** ERROS PROCESS */
if ($error = $router->error()) {
    $router->redirect("web.error", ['errcode' => $error]);
}

ob_end_flush();