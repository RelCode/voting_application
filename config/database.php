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

    /*
    allWhereIdRow:: method used to get row(s) where id = :id
    */
    public function allWhereIdRow($table,$column,$id){
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
}
date_default_timezone_set('Africa/Johannesburg');