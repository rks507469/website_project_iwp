<?php

//local server
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "task_get_it_done";
//internet server
    $servername = "db4free.net:3306";
    $username = "website_iwp";
    $password = "website_iwp";
    $database = "website_iwp";
    
    //creating connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    //checking connection
    if($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    }
?>