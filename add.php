<?php


?>
<html>
<body>


    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add Device</h4>
        <form class="white" action="" method="" > 
            <label>Device Name</label>
            <input type="text" name="name">
        
            <label>Device IP</label>
            <input type="text" name="device_IP">
        
            <label>Device Status</label>
            <input type="text" name="device_status">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>


    </section>




    <?php include('templates/footer.php'); ?>  


</body>
</html>