<?php

    include_once '../../../database/database.php';
    include_once '../../func/validator.php';

    header('Content-Type: application/json');

    $output = false;

    !isset($_SESSION) ? session_start() : '';

    $feedback = [ [ 'status'=>'400', 'feedback'=>'Bad Request!' ], [ 'status'=>'403', 'feedback'=>'Attachment not found!' ], [ 'status'=>'503', 'feedback'=>'Function not found!' ] ];

    $db = new db();

    $action = $_SERVER['REQUEST_METHOD'];

    if (isset($action)){
        if ($action === 'POST'){
            if (isset($_POST['token']) && $_POST['token'] === $_SESSION['TOKEN']){
                if ( $_POST['action'] === 'post' ){
                    $output = post_();
                }
                else if ( $_POST['action'] === 'put' ){
                    $output = prep_put_();
                }
                else if ( $_POST['action'] === 'delete' ){
                    $output = delete_();
                }
                else{
                    $output = 503;
                }
            }
            else{
                $output = 400;
            }
        }
        else{
            $output = get_();
        }
    }
    else{
        $output = 400;
    }
 

    // isset($_POST) || isset($_GET) ? ( isset($_POST['action']) || isset($_GET['action']) ? ( $_GET['action'] === 'get' ? $output = get_() : ( isset($_POST['token']) && $_POST['token'] === $_SESSION['TOKEN'] ? ( $_POST['action'] === 'post' ? $output = post_() : ($_POST['action'] === 'delete' ? $output = delete_() : $output = 503))  : $output = 400 ) ) : $output = 400 ) : $output = 400;

    echo json_encode($output);  

    function get_(){

        $sql = '    SELECT 
                        `father_name`,
                        `father_occupation`,
                        `father_mobile_no`, 
                        `father_email`, 
                        `mother_name`,
                        `mother_occupation`,
                        `mother_mobile_no`, 
                        `mother_email`, 
                        `guardian_name`,
                        `guardian_occupation`,
                        `guardian_mobile_no`, 
                        `guardian_email`, 
                        `monthly_income`,
                        `no_siblings`
                    FROM 
                        applicant_family_record 
                    WHERE 
                        applicant_id = :id ';

        // var_dump($sql);

        return $GLOBALS['db']->get_( $sql,  [$_GET['id']] );
    }

    function delete_(){ }

    function post_(){

        $counter = 1;

        $values = [];

        // set required fields
        $require_fields = [ 
            'token'=>'',
            'father_name'=>'',
            'father_occupation'=>'',
            'father_mobile_no'=>'',
            'father_email'=>'',
            'mother_name'=>'',
            'mother_occupation'=>'',
            'mother_mobile_no'=>'',
            'mother_email'=>'',
            'guardian_name'=>'',
            'guardian_occupation'=>'',
            'guardian_mobile_no'=>'',
            'guardian_email'=>'',
            'monthly_income'=>'',
            'no_siblings'=>'',
        ];
       
        // get keys of required fields
        $required_keys = array_keys($require_fields);

        // validate fields
        $output =  required_fields_validated($require_fields, $_POST);

        // remove token from required *for sql query*
        array_shift($required_keys);

        // set count *for sql query*
        $count = count($required_keys);

        // build sql
        $sql = 'UPDATE applicant_family_record SET ';

        foreach ($required_keys as $key => $v) { 

            if ( $v === 'applicant_id' ){

               $sql .= ' WHERE ' .$v.':'.$v;

            }
            else
            {
                if ($counter == $count){
                    $sql .= $v.'=:'.$v.' ';
                }
                else{
                    ' '.$sql .= $v.'=:'.$v.',';
                }
            }

            $values[':'.$v] = $_POST[$v];

            $counter++;

        }

        !isset($stmt) ? $output = $GLOBALS['db']->post_($sql,$values) : '';

        return $output;

    }