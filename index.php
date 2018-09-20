<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$decode = json_decode(file_get_contents("php://input"));

 //if(isset($_REQUEST['original'])){
if($decode){

     //$decode = json_decode(stripcslashes($_REQUEST['original']), TRUE);
     if(is_null($decode))
     {
        $response['status'] = array(
            'type' => 'error',
            'value' => 'Invalid JSON value found'
        );
        $response['request'] = $_REQUEST['json'];
     }
     else
     {
        $response['status'] = array(
            'type' => 'message',
            'value' => 'Valid JSON value found',
            'Data' => $decode
        );
        //$response['request'] = $decode;
     }

 }
 else
 {
    $response['status'] = array(
        'type' => 'error',
        'value' => 'No JSON value set'
    );
 }

 $encode = json_encode($response);
 //header('Content-Type: application/json');
 exit( $encode );



