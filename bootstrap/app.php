<?php
    require_once './config/core.php';

    include './views/layouts/header.php';
    if(in_array($page,$navigatable)){
        //controller name for the current page's controller
        $ctrl = ucfirst($page) . 'Controller';
        //include the controller file
        require_once('./controllers/LoginController.php');
        //create the controller's object
        $controller = new $ctrl();
        $controller->index();
    }else{
        include './views/404.php';
    }
    include './views/layouts/footer.php';
    include './config/sessions.php';
?>