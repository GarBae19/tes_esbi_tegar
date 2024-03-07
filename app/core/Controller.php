<?php
class Controller
{
    function view($view, $data = [])
    {
        require_once 'modul/view/' . $view . '.php';
    }
    function model($model)
    {
        require_once 'app/model/' . $model . '.php';
        return new $model;
    }
}
