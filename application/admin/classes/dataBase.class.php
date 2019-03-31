<?php
 
class Database {
 
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
 
    public function __construct($db_host = 'localhost:3307', $db_name = 'busy', $db_user = 'root', $db_pass = '') {
        $this->db_name   = $db_name;
        $this->db_user   = $db_user;
        $this->db_pass   = $db_pass;
        $this->db_host   = $db_host;
        $this->pdo       = null;
    }
 
    public function getPDO() {
        if($this->pdo === null) {
            $pdo = new PDO("mysql:dbname={$this->db_name};host={$this->db_host}", $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
    
    

    public function query($sql) {
        $req = $this->getPDO()->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function prepare($sql){
        $req = $this->getPDO()->prepare($sql);
        return $req;
    }

    public function execute($req){
        $sth = $this->getPDO()->execute($req);
        return $sth;
    }
}