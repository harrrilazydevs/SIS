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
        $sql = ' SELECT `spouse`,`passport_no`, `acr_no`, `applicant_id`, `program_id`, `lastname`, `firstname`, `middlename`, `status`, `suffix`, `date_of_birth`, `age`, `place_of_birth`, `mobile_no`, `gender`,`religion`,`civil_status`,`citizenship`,`school_id` FROM applicant_information a INNER JOIN program_list b ON a.program_id = b.id INNER JOIN school_list c ON b.school_id = c.id  WHERE applicant_id = :id ';
        return $GLOBALS['db']->get_( $sql,  [$_POST['id']] );
    }

    function delete_(){ }

    function post_(){

        $counter = 1;

        $values = [];

        // set required fields
        $require_fields = [ 'token'=>'', 'firstname'=>'alpha', 'middlename'=>'', 'lastname'=>'alpha', 'suffix'=>'', 'date_of_birth'=>'date', 'mobile_no'=>'numeric', 'age'=>'numeric', 'place_of_birth'=>'alpha', 'gender'=>'alpha', 'religion'=>'alpha', 'civil_status'=>'alpha', 'citizenship'=>'alpha' ];

        // check if post is valid
        if( isset($_POST) )
        {

            if( strtolower($_POST['citizenship']) !== 'filipino' )
            {
                $require_fields['acr_no'] = '';
                $require_fields['passport_no'] = '';
            }

            if( strtolower($_POST['civil_status']) !== 'single' )
            {
                $require_fields['spouse'] = 'alpha';
            }

            // get keys of required fields
            $required_keys = array_keys($require_fields);

            // validate fields
            $output =  required_fields_validated($require_fields, $_POST);

            // remove token from required *for sql query*
            array_shift($required_keys);

            // set count *for sql query*
            $count = count($required_keys);

            // build sql
            $sql = 'UPDATE applicant_information SET ';

            foreach ($required_keys as $key => $v) { 
                $v === 'applicant_id' ? $sql .= ' WHERE ' .$v.':'.$v : $counter == $count ? ' '.$sql .= $v.'=:'.$v.' ' :  ' '.$sql .= $v.'=:'.$v.','  ; 
                $values[':'.$v] = $_POST[$v];
                $counter++;

                if($v == 'firstname')
                {
                    $_SESSION['usfn'] = $_POST['firstname'];
                }
            }


            !isset($stmt) ? $output = $GLOBALS['db']->post_($sql,$values) : '';

        }
        else
        {

        }


       

        return $output;

    }