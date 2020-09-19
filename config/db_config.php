<?php 
    
    //database connection
    $conn = mysqli_connect('localhost','testuser','test1234','iot_devices');

    //check connection 
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>