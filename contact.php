<?php

if(count($_POST) != 0){
    $responseArray = array('type' => 'success', 'message' => 'success_message');
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