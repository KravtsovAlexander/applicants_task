<?php

namespace ApplicantTask\Core;

class Router
{
    public static function run()
    {
        $controller = 'index';
        $action = 'index';
        $params = null;
        $server = $_SERVER;
        $uri = $server['REQUEST_URI'];

        $routs = explode('/', $uri);
        if (!empty($routs[1])) {
            $controller = $routs[1];
        }
        if (!empty($routs[2])) {
            $action = $routs[2];
        }
        if (!empty($routs[3])) {
            $params = $routs[3];
        }

        $controller = '\\ApplicantTask\\Controller\\' . ucfirst(strtolower($controller)) .
            'Controller';
        $action = strtolower($action) . 'Action';

        $controller = new $controller();
        $controller->$action($params);
    }
}
