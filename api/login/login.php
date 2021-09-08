<?php
include_once '../../database/database.php';
include_once '../func/validator.php';

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

$validation_result = required_fields_validated($REQUIRED_FIELDS, $_POST);

if ( $validation_result == 403 )
{
    array_push( $output, $feedback[1]);
}
else
{

    if( checkif_account_exists($_POST) )
    {
        array_push( $output, $feedback[0]);
    }   
    else
    {
        array_push( $output, $feedback[2]);
    }
}



echo json_encode($output);







function checkif_account_exists($POST_DATA){

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
            return true;
        }
        else
        {
            return false;
        }


}