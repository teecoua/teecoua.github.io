<?php

include 'db_con.php';

$message = 'no telephone';
$type = 'warning';

if(!empty($_POST))
{
    
    if(isset($_POST['tel']) && $_POST['tel'] != null) {
        
        $tel = $_POST['tel'];
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            $message = 'Not connected';
            $type = 'error';  
        } 
        else
        {
            $sql = 'INSERT INTO consultate (telephone) VALUES ('.$tel.')';
            
            if ($conn->query($sql) === TRUE) {
                $message = "New record created successfully";
                $type = 'success'; 
            } else {
                $message = "Error: " . $sql . "<br>" . $conn->error;
                $type = 'error'; 
            } 
        }
        
        $conn->close();
        $responseArray = array('type' => $type, 'message' => $message);
    }
    else
    {
        $responseArray = array('type' => $type, 'message' => $message);
    }
}
else
{
    $responseArray = array('type' => $type, 'message' => $message);
}

$encoded = json_encode($responseArray);

header('Content-Type: application/json');

echo $encoded;