<?php

include_once '../../database/database.php';
include_once '../func/validator.php';

header('Content-Type: application/json');

$EXTS_FIELDS = ['docx'];

$REQUIRED_FIELDS = [
    'status'=>'',
    'file_name'=>'file',
    'requirement_id'=>'numeric',
];



$feedback = [
    [
        //0
        'status'=>'200',
        'feedback'=>'Requirement Submitted Successfully',
    ],
    [
        //1
        'status'=>'201',
        'feedback'=>'Internal Server Error',
        'sub_feedback'=>'Please try again',
    ]
];

$output = array();

$validation_result = required_fields_validated($REQUIRED_FIELDS, $_POST, $_FILES, $EXTS_FIELDS);

var_dump($validation_result);

if ( $validation_result == 403 )
{
    $output = array_push( $output, $feedback[1]);
}
else if ( is_array($validation_result) )
{
    foreach ($validation_result as $key => $val) {

        if( $val[0] == 'requirement_id' )
        {
            $output = array_push( $output, $feedback[1]);
        }
    }
}
else
{
   if( count( $output ) == 0 )
   {
       $FORMATTED_DATA = format_user_input($_POST);

       if( upload_requirement($FORMATTED_DATA) )
       {
           array_push($output, $feedback[0]);
       }
       else
       {
           array_push($output, $feedback[1]);
       }
   }
}


