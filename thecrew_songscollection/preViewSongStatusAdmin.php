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

            <p>Choose which record you want to update</p>

            <?php
            
                //Declare DB connection variables
                $host = "localhost"; //Hostname
                $user = "root"; //Database userid
                $pass = ""; //Database pwd
                $db = "thecrew_songcollectiondb"; //Please write your DB name$host = "localhost";
            
                //Create connection
                $conn = new mysqli($host,$user,$pass,$db);
                //Check connection

                if($conn->connect_error) //To check if DV connection IS NOT OK
                {
                    die("Connection failed : ".$conn->connect_error);//Display MSQL error
                }
                else
                {
                    //Connection OK - get ALL records from table
                    $queryView = "SELECT * FROM SONG";

                    //To execute $queryView query & assign query result to $resultQ
                    $resultQ = $conn->query($queryView);
                }

            ?>

            <form action="viewSongStatusAdmin.php" method="POST">

                <table border="2" style="border-collapse: collapse;">
                    <tr>
                        <th id="smallPadding">Option</th>
                        <th id="smallPadding">Song Title</th>
                        <th id="smallPadding">Artist / Band Name</th>
                        <th id="smallPadding">Audio / Video Link</th>
                        <th id="smallPadding">Genre</th>
                        <th id="smallPadding">Language</th>
                        <th id="smallPadding">Release Date</th>
                        <th id="smallPadding">Status</th>
                        <th id="smallPadding">Uploader</th>
                    </tr>

                    <?php
                    
                        if($resultQ->num_rows > 0)
                        {
                            while($row = $resultQ->fetch_assoc())
                            {
                    ?>
                                <tr>
                                    <td id="smallPadding" align="center"><input type="radio" name="songID" value="<?php echo $row['songID'];?>" required></td>
                                    <td id="smallPadding"><?php echo $row['songTitle'];?></td>
                                    <td id="smallPadding"><?php echo $row['artistBandName'];?></td>
                                    <td id="smallPadding"><a href="<?php echo $row["audioVideoLink"];?>" target="_blank"><?php echo $row["audioVideoLink"];?></a></td>
                                    <td id="smallPadding"><?php echo $row['genre'];?></i></td>
                                    <td id="smallPadding"><?php echo $row['language'];?></td>
                                    <td id="smallPadding"><?php echo $row['releaseDate'];?></td>
                                    <td id="smallPadding"><input type="hidden" name="status" value="<?php echo $row['status'];?>"><?php echo $row['status'];?></td>
                                    <td id="smallPadding"><?php echo $row['uploader'];?></td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr id='smallPadding' align='center'><td colspan='9'> NO data selected </td></tr>";
                        }
                    
                    ?>

                </table>

                <?php
                    $conn->close();
                ?>

                <br>

                <input type="submit" value="View Record to Edit">

            </form>
            <br>
            <a href="menu.php"><button>Menu</button></a>
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