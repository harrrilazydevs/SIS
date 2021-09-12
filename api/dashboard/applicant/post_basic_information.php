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

    $require_fields = [
        'firstname'=>'alpha',
        'mobile_no'=>'numeric'
    ];


    if (isset($_POST) && $_POST['token'] === $_SESSION['TOKEN']){

        if()
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
