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
 
    echo json_encode($output);  

    
    function get_(){

        $sql = '    SELECT 
                        `id`,
                        `name`
                    FROM 
                        applicant_type_list 
                    WHERE 
                        id = :id ';

        // var_dump($sql);

        return $GLOBALS['db']->get_( $sql,  [$_GET['id']] );
    }

