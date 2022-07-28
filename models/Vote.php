<?php
require_once('./config/database.php');
class Vote extends Database {
    public function allCandidates($for){
        $clause = $for == 'district' ? ' AND a.district = (SELECT district FROM areas WHERE id = '.$_SESSION['voter']['location'].')' : '';
        $data = [];
        $query = 'SELECT c.id, c.names, c.political_group,  cc.running_for, cc.running_in, a.area, a.district, a.ward 
            FROM candidates as c 
            INNER JOIN candidacy as cc 
            ON c.id = cc.candidate 
            INNER JOIN areas as a 
            ON cc.running_in = a.id 
            WHERE c.soft_delete = "N" AND cc.running_for = :for  AND a.'.$for.' = (SELECT '.$for.' FROM areas WHERE id = ' . $_SESSION['voter']['location'] . ')
            GROUP BY cc.candidate 
            ORDER BY c.names ASC';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':for',$for);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($data,$row);
            }
        }
        return $data;
    }
}