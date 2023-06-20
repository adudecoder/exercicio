<?php

/** CONFIGURAÇÃO DO SITE */
define("SITE", [
    "name" => "Auth em MVC com PHP",
    "desc" => "Aprendendo a construir uma aplicação de autenticação em MVC com PHP",
    "domain" => "localauth.com",
    "locale" => "pt_BR",
    "root" => "http://localhost/exercicio"
]);

/** SITE MINIFY */
if($_SERVER["SERVER_NAME"] == "localhost") {
    require __DIR__ . "/Ninify.php";
};

/** CONEXÃO DO BANCO DE DADOS */
const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "auth",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];

/** CONFIGURAÇÃO DE REDE SOCIAL */
define("SOCIAL", [
    "facebook_page" => "victormartins",
    "facebook_author" => "victormartins",
    "facebook_appId" => "2193729837289",
    "twitter_creator" => "@victormartins",
    "twitter_site" => "@victormartins",
]);

/** CONEXÃO DO EMAIL */
define("EMAIL", []);

/** LOGIN DA REDE SOCIAL: FACEBOOK */
define("FACEBOOK_LOGIN", []);

/** LOGIN DA REDE SOCIAL: GOOGLE */
define("GOOGLE_LOGIN", []);