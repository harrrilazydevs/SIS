<?php 

include_once '../../database/database.php';

$db = new db();

header('Content-Type: application/json');

$sql = ' SELECT id, name FROM program_list WHERE school_id = :id ';

(isset($_POST)) ? ($db->get_($sql,[':id'=>$_POST['id']]) == 500 ) ?  $output = ['status'=>'500','feedback'=>'Get query fail!'] : $output = $db->get_($sql,[':id'=>$_POST['id']]) : $output = ['status'=>400,'feedback'=>'Bad Request!'];


echo json_encode($output);