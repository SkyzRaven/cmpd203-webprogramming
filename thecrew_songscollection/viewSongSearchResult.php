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
            <h2>Song List Search</h2>

            <p>Choose which record you want to update</p>

            <?php

                $search = $_POST['search'];
                $search2 = $_POST['search'];
                $search3 = $_POST['search'];
            
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
                    $queryView1 = "SELECT * FROM SONG WHERE songTitle LIKE '%$search%'";

                    //To execute $queryView query & assign query result to $resultQ
                    $resultQ1 = $conn->query($queryView1);

                    $queryView2 = "SELECT * FROM SONG WHERE artistBandName LIKE '%$search2%'";

                    $resultQ2 = $conn->query($queryView2);

                    $queryView3 = "SELECT * FROM SONG WHERE genre LIKE '%$search3%'";

                    $resultQ3 = $conn->query($queryView3);
                }

            ?>

                <table border="2" style="border-collapse: collapse;">
                    <tr>
                        <th id="smallPadding">Song Title</th>
                        <th id="smallPadding">Artist / Band Name</th>
                        <th id="smallPadding">Audio / Video Link</th>
                        <th id="smallPadding">Genre</th>
                        <th id="smallPadding">Language</th>
                        <th id="smallPadding">Release Date</th>
                        <th id="smallPadding">Status</th>
                    </tr>

                    <?php
                    
                        if($resultQ1->num_rows > 0)
                        {
                            while($row = $resultQ1->fetch_assoc())
                            {
                    ?>
                                <tr>
                                    <td id="smallPadding"><?php echo $row['songTitle'];?></td>
                                    <td id="smallPadding"><?php echo $row['artistBandName'];?></td>
                                    <td id="smallPadding"><a href="<?php echo $row["audioVideoLink"];?>"><?php echo $row["audioVideoLink"];?></a></td>
                                    <td id="smallPadding"><?php echo $row['genre'];?></td>
                                    <td id="smallPadding"><?php echo $row['language'];?></td>
                                    <td id="smallPadding"><?php echo $row['releaseDate'];?></td>
                                    <td id="smallPadding"><?php echo $row['status'];?></td>
                                </tr>
                    <?php
                            }
                        }
                        else if($resultQ2->num_rows > 0)
                        {
                            while($row = $resultQ2->fetch_assoc())
                            {
                    ?>
                                <tr>
                                    <td id="smallPadding"><?php echo $row['songTitle'];?></td>
                                    <td id="smallPadding"><?php echo $row['artistBandName'];?></td>
                                    <td id="smallPadding"><a href="<?php echo $row["audioVideoLink"];?>"><?php echo $row["audioVideoLink"];?></a></td>
                                    <td id="smallPadding"><?php echo $row['genre'];?></td>
                                    <td id="smallPadding"><?php echo $row['language'];?></td>
                                    <td id="smallPadding"><?php echo $row['releaseDate'];?></td>
                                    <td id="smallPadding"><?php echo $row['status'];?></td>
                                </tr>
                    <?php
                            }
                        }
                        else if($resultQ3->num_rows  > 0)
                        {
                            while($row = $resultQ3->fetch_assoc())
                            {
                    ?>
                                <tr>
                                    <td id="smallPadding"><?php echo $row['songTitle'];?></td>
                                    <td id="smallPadding"><?php echo $row['artistBandName'];?></td>
                                    <td id="smallPadding"><a href="<?php echo $row["audioVideoLink"];?>"><?php echo $row["audioVideoLink"];?></a></td>
                                    <td id="smallPadding"><?php echo $row['genre'];?></td>
                                    <td id="smallPadding"><?php echo $row['language'];?></td>
                                    <td id="smallPadding"><?php echo $row['releaseDate'];?></td>
                                    <td id="smallPadding"><?php echo $row['status'];?></td>
                                </tr>
                    <?php
                            }
                        }
                        else
                        {
                            echo "<tr id='smallPadding' align='center'><td colspan='7'> NO data selected </td></tr>";
                        }
                    
                    ?>

                </table>

                <?php
                    $conn->close();
                ?>
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