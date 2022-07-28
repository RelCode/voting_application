<?php
class Database{
    private $host = 'localhost';
    private $dbname = 'voting_system';
    private $user = 'root';
    private $password = '';
    public $db;

    public function __construct(){
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo 'ERROR: ' . $exception;
        }
    }
    public function singleWhereIdRow($table,$column,$id){
        $query = 'SELECT * FROM '.$table.' WHERE '.$column.' = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    /*
    allWhereIdRow:: method used to get row(s) where id = :id
    */
    public function allWhereIdRows($table,$column,$id){
        $data = [];
        $query = 'SELECT * FROM '.$table.' WHERE '.$column.' = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($data,$row);
            }
        }
        return $data;
    }
    public function executeGetRowsQuery($query){
        $data = [];
        $stmt = $this->db->query($query);
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($data,$row);
            }
        }
        return $data;
    }
    public function allRowCount($table){
        $query = 'SELECT * FROM '.$table.'';
        $stmt = $this->db->query($query);
        return $stmt->rowCount();
    }

    public function allWhereRowEqual($table,$column1,$value1,$column2,$value2){
        $query = 'SELECT * FROM '.$table.' WHERE '.$column1.' = '.$value1.' AND '.$column2.' = "'.$value2.'"';
        return $this->executeGetRowsQuery($query);
    }

    public function current(){
        $no = isset($_GET['no']) ? htmlentities($_GET['no'],ENT_QUOTES) : 1;
        return $no;
    }
}
date_default_timezone_set('Africa/Johannesburg');