<?php

if(!empty($_POST)){
    $message = 'no telephone';
    if(isset($_POST['tel'])
       $message = $_POST['tel'];
    $responseArray = array('type' => 'success', 'message' => $message);
}
else
{
    $responseArray = array('type' => 'warning', 'message' => 'warning_message - no telephone');
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}