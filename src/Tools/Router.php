<?php

namespace App\Tools;

use App\Controller\Home;
use App\Controller\Search;
use App\Controller\User;

class Router
{

    private $uri;

    /**
     * Router constructor.
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    public function loadRoute()
    {
        $array_uri = explode('?', $this->uri);
        $uri2 = $array_uri[0];

        switch($uri2) {
            case '/' :
                $controller = new Home();
                $controller->index();
                break;

            case '/register' :
                $controller_login = new User();
                $controller_login->register();
                break;

            case  '/login' :
                $controller_login = new User();
                $controller_login->login();
                break;
            case '/logout' :
                $controller_login = new User();
                $controller_login->logout();
                break;

            case '/delete' :
                $controller_login = new User();
                $controller_login->delete();
                break;
            case '/account' :
                $controller_account = new User();
                $controller_account->account();
                break;
            case '/search' :
                $controller_search = new Search();
                $controller_search->search_membre();
                break;
            default:
                echo 'ERROR 404 - Page introuvable';
        }
    }
}