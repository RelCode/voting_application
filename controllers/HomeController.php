<?php
require_once('./library/Controller.php');
class HomeController extends Library\Controller {
    public function __construct(){
        $this->homeModel = $this->model('home');
    }

    public function index(){
        return $this->view('home');
    }
}