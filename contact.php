<?php

$message = 'no telephone';
$type = 'warning';

if(!empty($_POST))
{
    
    if(isset($_POST['tel']) && $_POST['tel'] != null) {
        
        
        $servername = "localhost";
        $username = "vova";
        $password = "cfkmnj30";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            $message = 'Not connected';
            $type = 'error';  
        } 
        else
        {
            $message = 'Connected';
            $type = 'success';   
        }
    }
    $responseArray = array('type' => $type, 'message' => $message);
}
else
{
    $responseArray = array('type' => $type, 'message' => $message);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}