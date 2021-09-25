<?php

    include_once '../../../database/database.php';
    include_once '../../func/validator.php';

    header('Content-Type: application/json');

    $output = false;

    !isset($_SESSION) ? session_start() : '';

    $feedback = [ [ 'status'=>'400', 'feedback'=>'Bad Request!' ], [ 'status'=>'403', 'feedback'=>'Attachment not found!' ], [ 'status'=>'503', 'feedback'=>'Function not found!' ] ];

    $db = new db();

    isset($_POST) || isset($_GET) ? ( isset($_POST['action']) || isset($_GET['action']) ? ( $_GET['action'] === 'get' ? $output = get_() : ( isset($_POST['token']) && $_POST['token'] === $_SESSION['TOKEN'] ? ( $_POST['action'] === 'post' ? $output = post_() : ($_POST['action'] === 'delete' ? $output = delete_() : $output = 503))  : $output = 400 ) ) : $output = 400 ) : $output = 400;

    echo json_encode($output);  

    // function get_(){
    //     $sql = ' SELECT `spouse`,`passport_no`, `acr_no`, `applicant_id`, `program_id`, `lastname`, `firstname`, `middlename`, `status`, `suffix`, `date_of_birth`, `age`, `place_of_birth`, `mobile_no`, `gender`,`religion`,`civil_status`,`citizenship`,`school_id` FROM applicant_information a INNER JOIN program_list b ON a.program_id = b.id INNER JOIN school_list c ON b.school_id = c.id  WHERE applicant_id = :id ';
    //     return $GLOBALS['db']->get_( $sql,  [$_POST['id']] );
    // }

    function delete_(){ }

    function post_(){

        // to add comma every :column
        $counter = 1;

        $values = [];

        // set required fields
        $require_fields = ['token'=>'', 'applicant_type'=>'alpha',  'program_id'=>'numeric'];

        
        // check if post is valid
        if( isset($_POST) )
        {
            // get keys of required fields
            $required_keys = array_keys($require_fields);

            // get post keys for SQL BUILDING
            $post_keys = array_keys($_POST);

            // validate fields
            $output =  required_fields_validated($require_fields, $_POST);

            // remove token from required *for sql query*
            array_shift($required_keys);

            // set count *for sql query*
            $count = count($required_keys);

            // build sql
            $sql = 'UPDATE applicant_information SET ';

            $primary = 'applicant_id';

            foreach ($post_keys as $key => $v) { 
                $v === $primary || $v === 'token' ? '' : $counter == $count ? ' '.$sql .= $v.'= :'.$v.' ' :  ' '.$sql .= $v.'= :'.$v.','  ; 
                $values[':'.$v] = $_POST[$v];
                $counter++;
            }

            // change primary here
            $sql .= ' WHERE '.$primary.' = :'.$primary;
            
           

            !isset($stmt) ? $output = $GLOBALS['db']->post_($sql,$values) : '';
        }
        else
        {
            $output = 400;
        }
        return $output;
    }

    function prep_put_(){

        $require_fields = ['token'=>'', 'applicant_id'=>'numeric', 'applicant_type'=>'numeric', 'program_id'=>'numeric'];

        // validate entries
        $output =  required_fields_validated($require_fields, $_POST);

        if ( empty($output) ){

            // take all keys of required fields
            $required_keys = array_keys($require_fields);

            // remove TOKEN     
            array_shift($required_keys);

            array_push($required_keys, 'citizenship');

            $citizenship = get_applicant_citizenship($_POST['applicant_type']);

            $_POST['citizenship'] =  $citizenship[0]['citizenship'];

            // set query details
            $q['table'] = 'applicant_information';
            $q['columns'] = $required_keys;
            $q['pk_data'] = substr($_POST['applicant_id'], 0, 32);
            $q['pk_col'] = 'applicant_id';
            $q['values'] = $_POST;

            $output = $GLOBALS['db']->put_($q);

            // insert requirements
            if ($output === 200){

                clean_requirement_record($_POST['applicant_id']);

                $requirement_ids = get_requirement($_POST['applicant_type']);

                $sql = '    INSERT INTO 
                                        applicant_requirement_records
                                        (
                                            applicant_id, 
                                            requirement_id, 
                                            requirement_status
                                        ) 
                            VALUES      (
                                            :applicant_id, 
                                            :requirement_id, 
                                            :requirement_status
                                        )';
                
                $v[':applicant_id'] = substr($_POST['applicant_id'], 0, 32);
                $v[':requirement_status'] = 'PENDING';


                foreach ($requirement_ids as $key => $vx) {

                    $v[':requirement_id'] = $vx['id'];

                    $GLOBALS['db']->post_($sql, $v);

                }

            }

        }
        else{
            // MAY ERROR
        }

        return $output;

    }

    function get_requirement($type){

        $sql =  '   SELECT 
                            b.id
                    FROM 
                            requirement_setup_applicant_list as a
                    INNER JOIN 
                            requirement_list as b
                    ON
                            a.requirement_id = b.id
                    WHERE
                            applicant_type_id = :applicant_type
        ';

        return $GLOBALS['db']->get_( $sql,  [':applicant_type'=>$type] );
        
    }

    function get_applicant_citizenship($id){

        $sql =  '   SELECT 
                            citizenship
                    FROM 
                            applicant_type_list
                    WHERE
                            id = :id
                    ';

        return $GLOBALS['db']->get_( $sql,  [':id'=>$id] );
    }

    function clean_requirement_record($id){

        $sql = 'DELETE FROM
                            applicant_requirement_records
                WHERE
                            applicant_id=:id';

        $v[':id'] = $id;

        $GLOBALS['db']->post_($sql, $v);        
    }


