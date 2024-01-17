<?php
    session_start();
    
    //check if session exists
    if(isset($_SESSION["userName"]))
    {
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="reference.css">
        <title>the Crew Song Collection</title>
    </head>
    <body>
        <div id="container">
            <h2>User List</h2>

            <p style="color:blue;font-weight:bold;">Update User Status</p>

            <?php

                $userName = $_POST["userName"];
                $status = $_POST["status"];

                //Declare DB connection variables
                $host = "localhost"; //Hostname
                $user = "root"; //Database userid
                $pass = ""; //Database pwd
                $db = "thecrew_songcollectiondb"; //Please write your DB

                //Create connection
                $conn = new mysqli($host, $user, $pass, $db);
                //Check connection

                if($conn->connect_error) //To check if DB connection IS NOT OK
                {
                    die("Connection failed : ".$conn->connect_error); //Display MySQL error
                }
                else
                {
                    //Connection OK - get records for the selected
                    $queryGet = "SELECT * FROM USER WHERE userName = '".$userName."'";
                    
                    //ALL $resultGet IS REPLACED WITH $resultQ (THIS FIX THE ERROR IN THIS FILE)
                    //To execute $queryView query & assign query result to $resultQ
                    $resultQ = $conn->query($queryGet);

                    if($resultQ->num_rows > 0)
                    {
            ?>          
                        <form action="postViewUserStatusSaveAdmin.php" name="postViewUserStatusSaveAdmin" method="POST">

                            <?php
                                //Retrieve all $resultGet result
                                while($row = $resultQ->fetch_assoc())
                                {
                            ?>
                                    <label for="userName">Username : </label>
                                    <b><?php echo $row['userName'];?></b>
                                    <input type="hidden" name="userName" value="<?php echo $row['userName'];?>">
                                    <br><br>
                                    
                                    <label for="status">Status : </label>
                                    <?php $status = $row['status'];?>
                                    <select id="status" name="status" required>
                                        <option value=""> - Choose Status - </option>
                                        <option value="active" <?php if ($status == 'active') echo 'selected';?>> Active </option>
                                        <option value="block" <?php if ($status == 'block') echo 'selected';?>> Block </option>
                                    </select>
                                    <br><br>

                                    <input type="submit" value="Update New Details">
                            </form>
                <?php
                    }
                    }
                }
                $conn->close();
                ?>
        </div>
    </body>
</html>

<?php
    }
    else
    {
        echo "No session exists or session has expired. Please log in again.<br>";
        echo "<a href=login.html> Login </a>";
    }
?>