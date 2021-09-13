<?php

    include_once '../../../database/database.php';
    include_once '../../func/validator.php';

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

    $require_fields = [ 'token'=>'','firstname'=>'alpha', 'middlename'=>'', 'lastname'=>'alpha', 'suffix'=>'', 'date_of_birth'=>'date', 'mobile_no'=>'numeric', 'age'=>'numeric', 'place_of_birth'=>'alpha', 'gender'=>'alpha', 'religion'=>'alpha', 'civil_status'=>'alpha', 'citizenship'=>'alpha' ];

    $required_keys = array_keys($require_fields);
    
    array_shift($required_keys);

    if (isset($_POST) && $_POST['token'] === $_SESSION['TOKEN']){

        if( required_fields_validated($require_fields, $_POST) === 0 )
        {
            $sql = ' INSERT INTO applicant_information (applicant_id, program_id, lastname,) VALUES (:user_id, :fname, :lname) ON DUPLICATE KEY UPDATE fname= :fname2, lname= :lname2 ';
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