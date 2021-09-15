<?php

include_once '../../database/database.php';
include_once '../func/validator.php';
include_once 'emailer.php';

header('Content-Type: application/json');

$output = false;

!isset($_SESSION) ? session_start() : '';

if (isset($_POST['action']))
{
    if( $_POST['POSTDATA']['token'] === $_SESSION['TOKEN'] )
    {
        if ($_POST['action'] == "change_pass") {
            change_pass();
        }
    }
    else
    {
        die('ERROR');
    }
}



function change_pass(){

    $db = new db();

    $counter = 1;

    $values = [];

    // set required fields
    $require_fields = [ 'token'=>'', 'id'=>'', 'password'=>''];
    
    // get keys of required fields
    $required_keys = array_keys($require_fields);

    // validate fields
    $output =  required_fields_validated($require_fields, $_POST['POSTDATA']);

    // remove token from required *for sql query*
    array_shift($required_keys);

    // set count *for sql query*
    $count = count($required_keys);

    // build sql
    $sql = 'UPDATE applicant_accounts SET password=:password,pass_type=:type where id =:id';

    $values = [':password'=>sha1($_POST['POSTDATA']['password']),':id'=>$_POST['POSTDATA']['id'], ':type'=>'1'];

    $message = '<br>You have successfully changed your password.';

    send_mail($message, 'Password Change Notification', $_SESSION['uem']);

    !isset($stmt) ? ( $db->post_($sql,$values) ?  $output = ['status'=>200, 'feedback'=>'Password changed successfully.'] : $output = 500) : $output = 500 ;

    $_SESSION['authenticated'] = false;

    echo json_encode([$output]);  

}
