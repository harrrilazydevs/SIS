<?php

    include_once '../../../database/database.php';

    if (!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $output = false;

    header('Content-Type: application/json');

    $uploads_dir = '../../../storage/files';
    $file_dl_dir = '../storage/files';

    $feedback = [
        [
            //0
            'status'=>'200',
            'feedback'=>'Requirement Submission Successful!',
        ],
        [
            //1
            'status'=>'400',
            'feedback'=>'Bad Request!',
        ],
        [
            //2
            'status'=>'403',
            'feedback'=>'Attachment not found!',
        ]
    ];

    if (isset($_POST) && $_POST['token'] === $_SESSION['TOKEN']){

        $output = array();

        if (!empty($_FILES['file']['name'])){

            $temp = explode('.pdf',strtolower( $_FILES['file']['name'] ));

            $file_name = hash('sha256',$temp[0]).'.pdf';
    
            $db = new db();
    
            $sql = ' UPDATE applicant_requirement_records SET applicant_id = :applicant_id, requirement_id = :requirement_id, file_name = :file_name, file_directory = :file_directory, date_submitted = :date_submitted, requirement_status = :requirement_status WHERE id = :id ';
    
            $value = [ ":applicant_id" => $_POST['applicant_id'], ":requirement_id" => $_POST['requirement_id'], ":id" => $_POST['record_id'], ":file_name" => $_FILES['file']['name'], ":file_directory" => $file_dl_dir.'/'.$file_name, ":date_submitted" => date('Y-m-d'), ":requirement_status" =>'SUBMITTED' ];

            ($db->post_($sql, $value) == 500 ) ?  $output = ['status'=>'500','feedback'=>'Post Query Failed'] : $output = $feedback[0];

            move_uploaded_file($_FILES['file']['tmp_name'], $uploads_dir.'/'.$file_name);
        }
        else
        {
            $output = $feedback[2];
        }

        echo json_encode($output);
    }
    else
    {
        echo json_encode($feedback[1]);
    }
