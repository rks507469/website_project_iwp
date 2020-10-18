<?php

//local server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "task_get_it_done";
    
    //creating connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    //checking connection
    if($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    }
?>