<?php
    session_start();
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';//get current page, else set it to default::HOME
    $_SESSION['url']['page'] = $page;
    var_dump(isset($_SESSION['loggedIn']));
    /*admin must be logged in to use the  application
    //if the admin is not logged in, we check if the current page is login.php, else redirect
    */
    if($page == 'logout'){
        if(session_destroy()){
            echo '<script>window.location.reload()</script>';
        }
    }
    if (!isset($_SESSION['loggedIn']) && $page != 'login') {
        header('location:?page=login');
    }
    //a list of navigatable pages in the application
    $navigatable = ['login','home','vote','candidates'];