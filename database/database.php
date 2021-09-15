<?php

class db {
    private $host = "localhost", $uid = "root", $pwd = "", $dbName = "ld_systems_sis";
    public function connect(){ $pdo = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbName, $this->uid, $this->pwd, [PDO::ATTR_EMULATE_PREPARES=>false]); $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); return $pdo; }
    function get_( $sql , $val =[]){ $status = ''; $stmt = $this->connect()->prepare($sql); ( $stmt ? ( $stmt->execute($val) ? ( !empty($result = $stmt->fetchAll()) ? $status = $result : $status = 403 ) : $status = 500 ) : $status = 500 ); return $status; }
    function post_( $sql , $val =[]){ /* var_dump($val); */ $status = ''; $stmt = $this->connect()->prepare($sql); ($stmt) ? ($stmt->execute($val)) ? $status = 200 : $status = 500 : $status = 500 ; regenerate_token(); return $status;  } }
?>