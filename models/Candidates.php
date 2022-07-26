<?php
require_once('./config/database.php');
class Candidates extends Database {
    public function getCandidates(){
        $per_page = 5;
        $from = ($per_page * $this->current()) - $per_page;
        $query = 'SELECT c.id, c.names, c.political_group,  COUNT(cc.candidate) as candidacy 
            FROM candidates as c 
            INNER JOIN candidacy as cc 
            ON c.id = cc.candidate 
            WHERE c.soft_delete = "N" 
            GROUP BY cc.candidate 
            ORDER BY c.names ASC 
            LIMIT '.$from.', '.$per_page.'';
        return $this->executeGetRowsQuery($query);
    }
}