<?php
    $errors = array('name'=>'','IP'=>'','status'=>'');
    
    $name = $IP = $status = ''; //this works because they're all strings 
    //allows for unser input persistance
    //checks for empty fields to be submitted
    if(isset($_POST['submit'])){
        
        if (empty($_POST['name'])){
            $errors['name'] = "name is a required field <br />";
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
            $errors['IP'] = "Device IP is a required field <br />";
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
            $errors['status'] = "device status is a required field <br />";
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
        //built infunction, array_filter turns true for populated array false for not
        if(!array_filter($errors)){
            header('Location: index.php');//returns user to index page if no errors found

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
            <input type="text" name="name" value=<?php echo htmlspecialchars($name) ?> > 
            <div class="red-text"><?php echo $errors['name'] ?></div>

            <label>Device IP</label>
            <input type="text" name="device_IP" value=<?php echo htmlspecialchars($IP) ?>>
            <div class="red-text"><?php echo $errors['IP'] ?></div>

            <label>Device Status</label>
            <input type="text" name="device_status" value=<?php echo htmlspecialchars($status) ?>>
            <div class="red-text"><?php echo $errors['status'] ?></div>


            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>


    </section>




    <?php include('templates/footer.php'); ?>  


</body>
</html>