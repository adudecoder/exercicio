<?php

namespace Source\Controllers;

class Web extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);

        if (!empty($_SESSION["user"])) {
            $this->router->redirect(route: "app.home");
        }
    }

    public function login(): void
    {
        $head = $this->seo->optimize(
            "Crie sua conta no " . site("name"),
            site("desc"),
            $this->router->route(name: "web.login"),
            routeImage("Login")
        );

        echo $this->view->render("theme/login", [
            "head" => $head
        ]);
    }
}
