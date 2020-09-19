<?php
    //database connection
    $conn = mysqli_connect('localhost','testuser','test1234','iot_devices');

    //check connection 
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    //select all devices
    $sql = 'SELECT name, ip, status FROM devices';

    //issue query
    $result = mysqli_query($conn,$sql);

    //fetch results rows as array
    $devices = mysqli_fetch_all($result, MYSQLI_ASSOC);
 
    //release results from memory (its not needed anymore)
    mysqli_free_result($result);

    //close the connection
    mysqli_close($conn);
    
    print_r($devices);

    

?>
<html>
<body>


    <?php include('templates/header.php'); ?>
  
    <?php include('templates/footer.php'); ?>  


</body>
</html>