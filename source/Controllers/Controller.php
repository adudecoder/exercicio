<?php

namespace Source\Controllers;

use CoffeeCode\Optimizer\Optimizer;
use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
    /** @var Engine */
    protected $view;

    /** @var Router */
    protected $router;

    /** @var Optimizer */
    protected $seo;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = new Engine(dirname(__DIR__, 2) . "/views", "php");
        $this->view->addData(["router" => $this->router]);

        $this->seo = new Optimizer();
        $this->seo->openGraph(site(param: "name"), site(param: "locale"), schema: "article")
            ->publisher(SOCIAL["facebook_page"], SOCIAL["facebook_author"])
            ->twitterCard(SOCIAL["twitter_creator"], SOCIAL["twitter_site"], SITE(param: "domain"))
            ->facebook(SOCIAL["facebook_appId"]);
    }

    /**
     * @param string $param
     * @param array $values
     * @return string
     */
    public function ajaxReponse(string $param, array $values): string
    {
        return json_encode([$param => $values]);
    }
}