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

            <?php
            
                //declare DB connection variables
                $host = "localhost"; //hostname
                $user = "root"; //database userid
                $pass = ""; //database pwd
                $db = "thecrew_songcollectiondb"; //please write your DB name

                //Create connection
                $conn = new mysqli($host,$user,$pass,$db);
                
                //Check connection
                if($conn->connect_error) //to check if DB connection IS NOT OK
                {
                    die("Connection failed : ".$conn->connect_error); //display MYSQL error
                }
                else
                {
                    //connection OK - Query to get records from a database table
                    $queryView = "SELECT * FROM SONG";

                    //to execute $queryView query & assign query result to $resultQ
                    $resultQ = $conn->query($queryView);
                }

            ?>

            <form name="search" action="viewSongSearchResult.php" method="POST">
                
                <label for="search">Search : </label>
                <input type="text" id="search" name="search" required>

                <br><br>

                <input type="submit" value="Search">

                <input type="reset" value="Cancel">

                <br>
            </form>

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