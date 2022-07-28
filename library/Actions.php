<?php
session_start();
require_once('../config/database.php');
$model = new Database();
$db = $model->db;
$action = isset($_POST['action']) ? $_POST['action'] : '';
if($action == 'cast'){
    $candidate = $_POST['candidate'];
    $for = isset($_POST['for']) ? htmlentities($_POST['for'],ENT_QUOTES) : '';
    if(empty($model->singleWhereIdRow('candidates', 'id', $candidate))){
        echo '404';
        exit();
    }
    if(empty($for) || !in_array($for,['district','area','ward'])){
        echo '403';
        exit();
    }
    $query = 'INSERT INTO votes (voter,candidate,candidacy) VALUES (:voter,:candidate,:candidacy)';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':voter', $_SESSION['voter']['id_number']);
    $stmt->bindParam(':candidate',$candidate);
    $stmt->bindParam(':candidacy',$for);
    if($stmt->execute()){
        echo '200';
        exit();
    }
    echo '500';
    exit();
}