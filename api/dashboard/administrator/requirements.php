<?php

    include_once '../../../database/database.php';
    include_once '../../func/validator.php';

    header('Content-Type: application/json');

    $output = false;

    !isset($_SESSION) ? session_start() : '';

    $feedback = [ [ 'status'=>'400', 'feedback'=>'Bad Request!' ], [ 'status'=>'403', 'feedback'=>'Attachment not found!' ], [ 'status'=>'503', 'feedback'=>'Function not found!' ] ];

    $db = new db();



    isset($_POST) ? ( isset($_POST['action']) ? ( $_POST['action'] === 'get' ? $output = get_() : ( isset($_POST['token']) && $_POST['token'] === $_SESSION['TOKEN'] ? ( $_POST['action'] === 'post' ? $output = post_() : ($_POST['action'] === 'delete' ? $output = delete_() : $output = 503))  : $output = 400 ) ) : $output = 400 ) : $output = 400;

    echo json_encode($output);

    function get_(){

        $db = new db();

        $result = '';

        $sql = 'SELECT id, name, document_type FROM requirement_list';
        
        $db->get_( $sql, [] ) === 500 ?  $output = ['status'=>'500','feedback'=>'Get query fail!'] : $result = $db->get_( $sql, []);

        return $result;
        
    }

    function post_(){

        $require_fields = ['token'=>'', 'name'=>'alpha', 'document_type'=>'alpha'];

        // validate entries
        $output =  required_fields_validated($require_fields, $_POST);

        if ( empty($output) ){

            // take all keys of required fields
            $required_keys = array_keys($require_fields);

            // remove TOKEN     
            array_shift($required_keys);

            $db = new db();

            $status = false;
    
            $sql = '
                        INSERT INTO
                                    requirement_list
                                    (
                                        name,
                                        document_type
                                    )
                        VALUES
                                    (
                                        :name, 
                                        :document_type
                                    )';
    
            $ob = $db->connect();
    
            $stmt = $ob->prepare($sql);
    
            $stmt->execute( [':name'=>$_POST['name'], ':document_type'=>$_POST['document_type']] ) ? $output = 200 : $output = 500;
            
        }
        else{
            // MAY ERROR
        }

        return $output;

    }

    function delete_(){

        $require_fields = ['token'=>'', 'id'=>'numeric'];

        // validate entries
        $output =  required_fields_validated($require_fields, $_POST);

        if ( empty($output) ){

            // take all keys of required fields
            $required_keys = array_keys($require_fields);

            // remove TOKEN     
            array_shift($required_keys);

            $db = new db();

            $status = false;
    
            $sql = '
                        DELETE FROM
                                    requirement_list
                        WHERE
                                    id = :id';
    
            $ob = $db->connect();
    
            $stmt = $ob->prepare($sql);
    
            $stmt->execute( [':id'=>$_POST['id']] ) ? $output = 200 : $output = 500;
            
        }
        else{
            // MAY ERROR
        }

        return $output;

    }

  
    // function get_applicant_type



