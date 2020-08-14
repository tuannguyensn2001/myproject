<?php
session_start();

require_once ('./core/Controller.php');
require_once ('./core/Model.php');
class Core
{
  var $controller="HomeController";
  var $action="index";
  var $params;
    public function __construct()
    {
        $url=array();
        if (isset($_GET['url'])) {
            $url = explode("/", filter_var(trim($_GET["url"], "/")));
        }
            if (isset($url[0])) {
                if (file_exists("./controller/" . $url[0] . ".php")) {
                    $this->controller = $url[0];
                    unset($url[0]);
                }
            }
            require_once("./controller/" . $this->controller . ".php");
            $this->controller = new $this->controller;
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->action = $url[1];

                }
                unset($url[1]);
            }

            $this->params = $url ? array_values($url) : [];

        call_user_func_array(array($this->controller,$this->action),array($this->params));

    }



}



$core = new Core();

