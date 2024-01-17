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
            <h2>Song List</h2>

            <p style="color:blue;font-weight:bold;"> Update Song Details </p>

            <?php

                $songID = $_POST["songID"];
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
                    $queryGet = "SELECT * FROM SONG WHERE songID = '".$songID."'";
                    
                    //ALL $resultGet IS REPLACED WITH $resultQ (THIS FIX THE ERROR IN THIS FILE)
                    //To execute $queryView query & assign query result to $resultQ
                    $resultQ = $conn->query($queryGet);

                    if($resultQ->num_rows > 0)
                    {
            ?>          
                        <form action="viewSongStatusSaveAdmin.php" name="songUpdateForm" method="POST">

                            <?php
                                //Retrieve all $resultGet result
                                while($row = $resultQ->fetch_assoc())
                                {
                            ?>
                                    <label for="songID">Song ID : </label>
                                    <b><?php echo $row['songID'];?></b>
                                    <br><br>
                                    
                                    <label for="songTitle">Song Title : </label>
                                    <b><?php echo $row['songTitle'];?></b>
                                    <br><br>

                                    <label for="artistBandName">Artist / Band Name :</label>
                                    <b><?php echo $row['artistBandName'];?></b>
                                    <br><br>

                                    <label for="audioVideoLink">Song URL : </label>
                                    <b><a href="<?php echo $row['audioVideoLink'];?>" target="_blank"><?php echo $row['audioVideoLink'];?></a></b>
                                    <br><br>

                                    <label for="genre">Genre : </label>
                                    <b><?php echo $row['genre'];?></b>
                                    <br><br>

                                    <label for="language">Language : </label>
                                    <b><?php echo $row['language'];?></b>
                                    <br><br>

                                    <label for="releaseDate">Release Date : </label>
                                    <b><?php echo $row['releaseDate'];?></b>
                                    <br><br>

                                    <label for="uploader">Uploader : </label>
                                    <b><?php echo $row['uploader'];?></b>
                                    <br><br>

                                    <label for="status">Status : </label>
                                    <?php $status = $row['status'];?>
                                    <select id="status" name="status" required>
                                        <option value=""> - Choose Status - </option>
                                        <option value="approved" <?php if ($status == 'approved') echo 'selected';?>> Approved </option>
                                        <option value="waiting" <?php if ($status == 'waiting') echo 'selected';?>> Waiting </option>
                                        <option value="rejected" <?php if ($status == 'rejected') echo 'selected';?>> Rejected </option>
                                    </select>
                                    <br><br>

                                    <input type="hidden" name="songID" value="<?php echo $row['songID'];?>">

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