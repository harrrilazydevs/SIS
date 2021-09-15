<?php 

include_once '../../database/database.php';

$db = new db();

header('Content-Type: application/json');

$sql = ' SELECT id, name FROM school_list ';

( $db->get_($sql) == 500 ) ?  $output = ['status'=>'500','feedback'=>'Get query fail!'] : $output = json_encode($db->get_($sql));

echo $output;