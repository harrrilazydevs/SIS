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

    $require_fields = [ 'firstname'=>'alpha', 'middlename'=>'alpha', 'lastname'=>'alpha', 'suffix'=>'alpha', 'date_of_birth'=>'alpha', 'age'=>'numeric', 'place_of_birth'=>'alpha', 'gender'=>'alpha', 'religion'=>'alpha', 'civil_status'=>'alpha', 'citizenship'=>'alpha' ];

    $validation_result = required_fields_validated($REQUIRED_FIELDS, $_POST);

    if (isset($_POST) && $_POST['token'] === $_SESSION['TOKEN']){

        if( $validation_result == 403 )
        {

        }
        else
        {
            $output = $feedback[1];
        }
    }
    else
    {
       $output = $feedback[1];
    }

    echo json_encode($output);