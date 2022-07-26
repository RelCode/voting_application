<?php
namespace Library;
class Controller {
    public function model($model){
        require_once('./models/'.ucfirst($model).'.php');
        return new $model();
    }

    public function view($view,$data = [],$count = 0){
        require_once('./views/'.$view.'.php');
    }
}
