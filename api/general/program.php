<?php 

include_once '../../database/database.php';

$db = new db();

header('Content-Type: application/json');


isset($_POST) || isset($_GET) ? ( isset($_POST['action']) || isset($_GET['action']) ? ( $_GET['action'] === 'get' ? $output = get_() : ( isset($_POST['token']) && $_POST['token'] === $_SESSION['TOKEN'] ? ( $_POST['action'] === 'post' ? $output = post_() : ($_POST['action'] === 'delete' ? $output = delete_() : $output = 503))  : $output = 400 ) ) : $output = 400 ) : $output = 400;


echo json_encode($output);

function get_(){

    $db = new db();

    $result = '';

    $sql = ' SELECT id, name FROM program_list WHERE school_id = :id ';
    
    $db->get_( $sql, [':id'=>$_GET['id']]) === 500 ?  $output = ['status'=>'500','feedback'=>'Get query fail!'] : $result = $db->get_( $sql, [':id'=>$_GET['id']]);

    return $result;
    
}
