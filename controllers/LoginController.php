<?php
require_once('./library/Controller.php');
class LoginController extends Library\Controller{
    public function __construct(){
        $this->loginModel = $this->model('login');
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
        //user voter ID Number to fetch corresponding voter
        $voter = $this->loginModel->singleWhereIdRow('voters','id_number',$post['id_number']);
        if(empty($voter)){//if the user is not found, we return a message
            $this->alertMessage($post['id_number'],'ID Number Not Registered');
            return false;
        }
        if($voter['soft_delete'] == 'Y'){
            $this->alertMessage($post['id_number'],'ID Account Was Removed');
            return false;
        }
        // var_dump('nigga jealous');
        //authentic provided PIN with the one stored in the database
        if($voter['pin'] !== $post['pin']){
            $this->alertMessage($post['id_number'],'Incorrect ID Number/PIN');
            return false;
        }
        // //if voter has logged in, destroy all the sessions before creating new ones
        $_SESSION['loggedIn'] = true;
        $_SESSION['voter']['names'] = $voter['names'];
        $_SESSION['voter']['id_number'] = $voter['id_number'];
        $_SESSION['voter']['location'] = $voter['area'];
        header('location:?page=home');
    }

    public function validateData($id_number){
        if (!preg_match('/^[0-9]*$/', $id_number) || strlen($id_number) != 13) {
            $_SESSION['validation']['id_number'] = 'Invalid ID Number';
            return false;
        }
        return true;
    }

    public function alertMessage($id,$message,$class = 'danger'){
        $_SESSION['old']['id_number'] = $id;
        $_SESSION['alert']['class'] = $class;
        $_SESSION['alert']['message'] = $message;
        return true;
    }
}