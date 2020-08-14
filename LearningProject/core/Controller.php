<?php


class Controller
{
    public function view($views,$data='')
    {
        require_once ("./views/".$views.".php");
    }
    public function model($model){
        require_once ("./models/".$model.".php");
        $model = new $model;
        return $model;
    }

}