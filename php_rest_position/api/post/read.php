<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instansiates database
$database = new Database();
$db = $database->connect();

//instantiates loccation post object
$post = new Post($db);

//blog location query
$result = $post->read();

$num = $result->rowCount();


if($num > 0) {

    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
          'priority' => $priority,
          'location' => $location,
          'arrivaltime' => $arrivaltime
        );

        //push to data
        array_push($posts_arr['data'], $post_item);
    }

    echo json_encode($posts_arr);
}else{

    echo json_encode(
        array('message'=> 'No post found')
    );
}