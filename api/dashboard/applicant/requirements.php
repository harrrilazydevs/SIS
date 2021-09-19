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

        $sql = '  
                        SELECT 
                                a.id,
                                a.requirement_status as `status`,
                                a.requirement_id,
                                b.name as `requirement_name`,
                                a.file_name as `file_name`,
                                a.file_directory as `file_dir`
                        
                        FROM 
                                applicant_requirement_records a
                        INNER JOIN
                                requirement_list b
                        ON
                                a.requirement_id = b.id
                        INNER JOIN
                                applicant_accounts c
                        ON
                                a.applicant_id = c.id

                        WHERE
                                c.id = ?
                ';

                
        $stmt = $GLOBALS['db']->connect()->prepare($sql);

        $output = $GLOBALS['db']->get_( $sql, [$_POST['id']] );

        if ( empty( $output ) )
        {
              $output = 403;
        }

        return $output;
        
    }

  
    // function get_applicant_type



