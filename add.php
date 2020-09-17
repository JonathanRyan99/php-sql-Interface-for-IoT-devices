<?php
    $errors = array('name'=>'','IP'=>'','status'=>'');
    
    
    //checks for empty fields to be submitted
    if(isset($_POST['submit'])){
        
        if (empty($_POST['name'])){
            echo "name is a required field <br />";
        }
        else{
            $name = $_POST['name'];
            if(preg_match('/^[a-zA-Z\s]+$/',$name)){
                echo htmlspecialchars($name);
            }
            else{
                $errors['name'] = "name can only contain letters and spaces";
            }
            
            
        }
        
        if (empty($_POST['device_IP'])){
            echo "Device IP is a required field <br />";
        }
        else{
            $IP = $_POST['device_IP'];
            if(filter_var($IP,FILTER_VALIDATE_IP)){
                echo htmlspecialchars($IP);
            }
            else{
                $errors['IP'] = "Not a valid IP <br />";
            } 
        }
        
        //maybe make this a boolean or int  0/1
        if (empty($_POST['device_status'])){
            echo "device status is a required field <br />";
        }
        else{
            $status = $_POST['device_status'];
            if(preg_match('/^[a-zA-Z\s]+$/',$status)){
                echo htmlspecialchars($status);
            }
            else{
                $errors['status'] = "status can only contain letters and spaces";
            }
        }
    }//end of post check

?>
<html>
<body>


    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add Device</h4>
        <form class="white" action="" method="POST" > 
            <label>Device Name</label>
            <input type="text" name="name">
            <div class="red-text"><?php echo $errors['name'] ?></div>

            <label>Device IP</label>
            <input type="text" name="device_IP">
            <div class="red-text"><?php echo $errors['IP'] ?></div>

            <label>Device Status</label>
            <input type="text" name="device_status">
            <div class="red-text"><?php echo $errors['status'] ?></div>


            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>


    </section>




    <?php include('templates/footer.php'); ?>  


</body>
</html>