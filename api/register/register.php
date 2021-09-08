<?php

    include_once '../../database/database.php';
    include_once '../func/validator.php';
    include_once '../func/password_generator.php';
    include_once '../func/emailer.php';
 

    header('Content-Type: application/json');

    $REQUIRED_FIELDS = [
        'email'=>'email',
        'mobile_no'=>'numeric'
    ];

    $feedback = [
        [
            //0
            'status'=>'200',
            'feedback'=>'Registration Successful!',
            'url'=>'../login',
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
            'feedback'=>'Email is Invalid',
        ],
        [
            //3
            'status'=>'416',
            'feedback'=>'Input should be numbers only.',
        ]

    ];

    $output = array();

    $validation_result = required_fields_validated($REQUIRED_FIELDS, $_POST);

    if ( $validation_result == 403 )
    {
        $output = array_push( $output, $feedback[1]);
    }
    else if ( is_array($validation_result) )
    {
        foreach ($validation_result as $key => $val) {

            if( $val[0] == 'email' )
            {
                $feedback[6]['name'] = $val[0];
                array_push($output, $feedback[2]);
            }

            if( $val[0] == 'mobile_no' )
            {
                $feedback[6]['name'] = $val[0];
                array_push($output, $feedback[3]);
            }
       
        }
    }
    else
    {
       if( email_used( $_POST['email'] ) )
       {
           $feedback[1]['name'] = 'email';
           array_push($output, $feedback[1]);
       }

       if( count( $output ) == 0 )
       {
           $FORMATTED_DATA = format_user_input($_POST);

           if( exec_register($FORMATTED_DATA) )
           {
               array_push($output, $feedback[0]);
           }
           else
           {
               array_push($output, $feedback[1]);
           }
       }
    }

    echo json_encode($output);

    function email_used( $email ){

        $status = false;

        $db = new db();

        $sql = '  
                    SELECT 
                            * 
                    FROM 
                            applicant_accounts
                    WHERE
                            email = ?
                ';

        $stmt = $db->connect()->prepare($sql);

        $stmt->execute( [$email] );

        if ( count( $stmt->fetchAll() ) > 0 )
        {
            $status = true;
        }
        
        return $status;

    }

    function exec_register( $data ){

        $db = new db();

        $status = false;

        $count = count( $data );

        $counter = 1;

        $values = array();

        $sql = '
                    INSERT INTO
                                applicant_accounts
                                (
                                    email,
                                    mobile_no,
                                    password,
                                    date_of_application
                                )
                    VALUES
                                (
                                    :email, 
                                    :mobile_no, 
                                    :password, 
                                    :date_of_application
                                )';

        $password = generate_password();

        $value = [
            ":email" => $data['email'],
            ":mobile_no" => $data['mobile_no'],
            ":password" => sha1($password),
            ":date_of_application" => date("Y/m/d")
        ];

        $message = 'Password is : '.$password;

        $stmt = $db->connect()->prepare($sql);

        $v = $stmt->execute( $value );

        // var_dump($v);

        if ( $v )
        {   
            send_mail($message, 'Your password', $data['email']);

            return true;
        }
        else
        {
            return false;
        }
    }
















?>