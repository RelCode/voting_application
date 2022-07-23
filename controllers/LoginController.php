<?php
require_once('./library/Controller.php');
class LoginController extends Library\Controller{
    public function model($model){
        $this->loginModel = $this->model('login');
        // var_dump($this->loginModel);
    }
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->loginAttempt($_POST);
        }
        return $this->view('login');
    }

    public function loginAttempt($post){
        //validate user data
        if(!$this->validateData($post['id_number'])){
            $_SESSION['old']['id_number'] = $post['id_number'];
            return false;
        }
        // var_dump($this->loginModel);
        // $voter = $this->loginModel->allWhereIdRow('voters', 'id_number', $post['id_number']);
        // var_dump($voter);
    }

    public function validateData($id_number){
        if (!preg_match('/^[0-9]*$/', $id_number) || strlen($id_number) != 13) {
            $_SESSION['validation']['id_number'] = 'Invalid ID Number';
            return false;
        }
        return true;
    }
}