<?php

class db {

    private $host = "localhost";
    private $uid = "root";
    private $pwd = "";
    private $dbName = "ld_systems_sis";

    public function connect(){
        $pdo = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbName, $this->uid, $this->pwd, [PDO::ATTR_EMULATE_PREPARES=>false]);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    function get_( $sql , $val){
    
        $status = [];
    
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->execute( $val );
    
        $result = $stmt->fetchAll();
    
        if ( !empty( $result ) )
        {
            $status = $result;
        }
    
        return $status;
    
    }


}

?>