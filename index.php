<?php
    //this contains the connection code so it can be imported as needed
   include('config/db_config.php');

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
    
    //print_r($devices);

    

?>
<html>
<body>


    <?php include('templates/header.php'); ?>

    <h4 class = "center grey-text">devices</h4>
    <div class="container">
        <div class = "row">
            <?php foreach($devices as $device){  ?>

                <div class="col s6 md3 ">
                    <div class=" card z-depth-0">
                        <div class="card-content center">
                            <h6> <?php echo htmlspecialchars($device['name']); ?> </h6>
                            <h6> <?php echo htmlspecialchars($device['ip']); ?> </h6>
                            <h6> <?php echo htmlspecialchars($device['status']); ?> </h6>
                        </div>    
                    </div>
                </div>




            <?php } ?>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>  


</body>
</html>