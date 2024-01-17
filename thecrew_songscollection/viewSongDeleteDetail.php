<div id="container">

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
            <h2>Song list</h2>
            <?php
                //declare DB connection variables
                $songID = $_POST["songID"];

                $host = "localhost"; //host name
                $user = "root"; //database userid
                $pass = ""; //database pwd
                $db = "thecrew_songcollectiondb"; // please write your DB name
                
                // Create connection
                $conn = new mysqli($host, $user, $pass, $db);
                
                // Check connection
                if ($conn->connect_error) //to check if DB connection IS NOT OK
                {
                    die("Connection failed: " . $conn->connect_error); // display MySQL error
                }
                else
                {
                    //connection OK - delete records from a database table
                    $deleteQuery = "DELETE FROM SONG WHERE songID = '".$songID."'";
                    
                    //to execute $deleteQuery query
                    if ($conn->query($deleteQuery) === TRUE)
                    {
                        echo "<p style='color:blue;'> Record has been deleted from database!</p>";
                        echo "<a href='viewSong.php'><button>View Song List</button></a>";
                    }
                    else
                    {
                        echo "<p style='color:red;'>Query problems! : " . $conn->error . "</p>";
                    }
                    $conn->close();
                }
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