<?php

class DatabaseConn {

    private $connection = null;

    public function __construct(
        private $host,
        private $dbname,
        private $user,
        private $password
    )
    {$this->create_connection();}

    private function create_connection(){

        try {

            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $pdo = new PDO($dsn, $this->user, $this->password);
            $this->connection = $pdo;

        } catch(PDOException $e){
            $this->connection = null;
        }

    }

    public function getConn(){
        return $this->connection;
    }

}