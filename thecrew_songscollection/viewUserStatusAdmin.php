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

            <p>Choose which user to block</p>

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
                    //Connection OK - get ALL records from a table
                    $queryView = "SELECT * FROM USER WHERE userType = 'user'";

                    //To execute $queryView query & assign query result to $resultQ
                    $resultQ = $conn->query($queryView);
                }

            ?>

            <form action="viewUserStatusSaveAdmin.php" method="POST">

                <table border="2" style="border-collapse: collapse;">
                    <tr>
                        <th id="smallPadding">Option</th> 
                        <th id="smallPadding">Username</th>
                        <th id="smallPadding">Status</th>
                    </tr>

                    <?php
                    
                        if($resultQ->num_rows > 0)
                        {
                            while($row = $resultQ->fetch_assoc())
                            {
                    ?>
                                <tr>
                                    <td id="smallPadding" align="center"><input type="radio" name="userName" value="<?php echo $row['userName'];?>" required></td>
                                    <td id="smallPadding"><?php echo $row['userName'];?></td>
                                    <td id="smallPadding"><input type="hidden" name="status" value="<?php echo $row['status'];?>"><?php echo $row['status'];?></td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr id='smallPadding' align='center'><td colspan='3'> NO data selected </td></tr>";
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
            <a href="menu.php"><button>Menu</button></a></p>
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