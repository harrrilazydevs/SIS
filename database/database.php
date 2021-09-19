<?php

class db {
    private $host = "localhost", $uid = "root", $pwd = "", $dbName = "ld_systems_sis";
    public function connect(){ $pdo = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbName, $this->uid, $this->pwd, [PDO::ATTR_EMULATE_PREPARES=>false]); $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); return $pdo; }
    function get_( $sql , $val =[]){ $status = ''; $stmt = $this->connect()->prepare($sql); ( $stmt ? ( $stmt->execute($val) ? ( !empty($result = $stmt->fetchAll()) ? $status = $result : $status = 403 ) : $status = 500 ) : $status = 500 ); return $status; }
    function post_( $sql , $val =[]){ /* var_dump($val); var_dump($sql); */ $status = ''; $stmt = $this->connect()->prepare($sql); ($stmt) ? ($stmt->execute($val)) ? $status = 200 : $status = 500 : $status = 500 ; regenerate_token(); return $status;  }
    
    function put_($data){

        $input_values = $data['values'];

        $values = [];

        $primary_col = $data['pk_col'];

        $sql = ' UPDATE '.$data['table'].' SET ';

        // set columns
        $cols = $data['columns'];

        // get num of cols for  , 
        $col_count = count($cols);

        $counter = 1;

        // loop through the columns
        foreach ($cols as $key => $v) {

            $v === 'token' || $v === $primary_col ? '':  ($counter !== $col_count ?  $sql .= ' '.$v.' = :'.$v.', ' : $sql .= ' '.$v.' = :'.$v) ;

            $counter++;

            $values[':'.$v] = $input_values[$v];

        }
      
        // set primary
        $sql .= ' WHERE '.$primary_col. ' = :'.$primary_col;


        // var_dump($sql);

        // var_dump($values);


        $stmt = $this->connect()->prepare($sql);

        // check if properly executed
        ($stmt) ? ( $stmt->execute($values) ? $status = 200 : $status = 500 ) : $status = 500; 

        regenerate_token(); 

        return $status;  

    }
}

?>