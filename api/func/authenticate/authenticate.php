<?php

session_start();

    if(isset($_POST['action'])){

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
            
        $REQUIRED_FIELDS = [
            'email'=>'*',
            'password'=>'*'
        ];
    
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

        $validation_result = required_fields_validated($REQUIRED_FIELDS, $_POST['POSTDATA']);

        if ( $validation_result == 403 )
        {
            array_push( $output, $feedback[1]);
        }
        else
        {
        
            if( checkif_account_exists($_POST['POSTDATA']) )
            {
                $_SESSION['authenticated'] = true;
                array_push( $output, $feedback[0]);
            }   
            else
            {
                $_SESSION['authenticated'] = false;
                array_push( $output, $feedback[2]);
            }
        }
    
        echo json_encode($output);
    
    }
    
    function checkif_account_exists($POST_DATA){

        
    
        $status = false;
        $db = new db();
        $sql = '  
                    SELECT 
                            * 
                    FROM 
                            applicant_accounts
                    WHERE
                            email = ?
                    AND     
                            password = ?
                ';
        $stmt = $db->connect()->prepare($sql);
        $stmt->execute( 
                        [ 
                            $POST_DATA['email'], 
                            sha1($POST_DATA['password'])
                        ]
        );
    
        if ( count( $stmt->fetchAll() ) > 0 )
        {
            $status = true;
        }
        return $status;
    }
    
    




?>