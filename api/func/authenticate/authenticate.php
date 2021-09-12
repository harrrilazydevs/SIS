<?php

    if (!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if (isset($_POST['action']))
    {
        if( $_POST['token'] === $_SESSION['TOKEN'] )
        {
            if ($_POST['action'] == "login") {
                login();
            }
        }
        else
        {
            die('ERROR');
        }
    }

    function login(){

        include_once '../../../database/database.php';
        include_once '../validator.php';
    
        $feedback = [
            [
                //0
                'status'=>'200',
                'feedback'=>'Login Successful!',
                'url'=>'../index.php',
            ],
            [
                //1
                'status'=>'201',
                'feedback'=>'Internal Server Error',
                'sub_feedback'=>'Please try again',
            ],
            [
                //2
                'status'=>'414',
                'feedback'=>'Username / Password doesn\'t match any records in the database',
            ]
    
        ];
    
        header('Content-Type: application/json');
    
        $output = array();

        $REQUIRED_FIELDS = [ 'email'=>'email', 'password'=>'' ];

        $validation_result = required_fields_validated($REQUIRED_FIELDS, $_POST['POSTDATA']);

        if ( $validation_result == 403 )
        {
            array_push( $output, $feedback[1]);
        }
        else
        {
            $_RETURN_DATA = checkif_account_employee($_POST['POSTDATA']);

            if ( $_RETURN_DATA != 403 )
            {
                $userId = $_RETURN_DATA[0]['user_id'];

                $userFname = $_RETURN_DATA[0]['firstname'];

                $userRole = $_RETURN_DATA[0]['role'];

                $_SESSION['uid'] = $userId;

                $_SESSION['usn'] = $userFname;

                $_SESSION['usr'] = $userRole;

                $_SESSION['authenticated'] = true;

                array_push( $output, $feedback[0]);
            }
            else
            {
                
                $_RETURN_DATA = checkif_account_exists($_POST['POSTDATA']);

                if( $_RETURN_DATA != 403 )
                {
                    $userId = $_RETURN_DATA[0]['user_id'];

                    $userFname = $_RETURN_DATA[0]['firstname'];

                    $_SESSION['uid'] = $userId;

                    $_SESSION['usn'] = $userFname;

                    $_SESSION['usr'] = 'APPLICANT';

                    $_SESSION['authenticated'] = true;

                    array_push( $output, $feedback[0]);
                }   
                else
                {
                    $_SESSION['authenticated'] = false;
                    array_push( $output, $feedback[2]);
                }
            }
        }
    
        echo json_encode($output);
    
    }
    
    function checkif_account_exists($POST_DATA){

        $db = new db();

        $sql = '  
                    SELECT 
                            a.id as `user_id`,
                            b.firstname 
                    FROM 
                            applicant_accounts a
                    INNER JOIN
                            applicant_information b
                    ON
                            a.id = b.applicant_id
                    WHERE
                            email = ?
                    AND     
                            password = ?
                ';

        $data = [ 
                    $POST_DATA['email'], 
                    sha1($POST_DATA['password'])
        ];

        return $db->get_( $sql, $data );
       
    }
    
    function checkif_account_employee($POST_DATA){

        $db = new db();
    
        $sql = '  
                    SELECT 
                            firstname,
                            user_id,
                            role
                    FROM 
                            users a
                    INNER JOIN
                            employee_information b
                    ON
                            a.id = b.user_id
                    WHERE
                            email = ?
                    AND     
                            password = ?
                ';
    
        $data = [ 
                    $POST_DATA['email'], 
                    sha1($POST_DATA['password'])
        ];

  

        return $db->get_( $sql, $data );

    }
    
    




?>