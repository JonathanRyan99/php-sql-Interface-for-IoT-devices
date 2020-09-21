<?php
    //this contains the connection code so it can be imported as needed
    include('config/db_config.php');

    
    if(isset($_POST['delete'])){
        //get value of the form on the page 
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        //query telling it to delete the row associated with the id submitted
        $sql ="DELETE FROM devices WHERE id = $id_to_delete";

        if(mysqli_query($conn,$sql)){
            //success
            header('Location: index.php');
        }
        else{
            echo 'query error: ' . mysqli_error($conn);
        }
    }
    
    
    //select all devices
    $sql = 'SELECT id, name, ip, status FROM devices';

    //issue query
    $result = mysqli_query($conn,$sql);

    //fetch results rows as array
    $devices = mysqli_fetch_all($result, MYSQLI_ASSOC);
 
    //release results from memory (its not needed anymore)
    mysqli_free_result($result);

    //close the connection
    mysqli_close($conn);
    
    //print_r($devices);

    
        //store id of device somewhere or search and delete row by the name (31)
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
                            <i class="large material-icons">devices_other</i>
                            <h6> <?php echo htmlspecialchars($device['name']); ?> </h6>
                            <h6> <?php echo htmlspecialchars($device['ip']); ?> </h6>
                            <h6> <?php echo htmlspecialchars($device['status']); ?> </h6>
                        </div>
                        <!-- delete from -->
                        <form action="index.php" method="POST">
                            <input type="hidden" name="id_to_delete" value ="<?php echo $device['id'] ?>">
                            <input type="submit" name="delete" value=Delete class="btn brand z-depth-0">
                        </form>
                           
                    </div>
                </div>




            <?php } ?>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>  


</body>
</html>