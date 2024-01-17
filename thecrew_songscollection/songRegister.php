<div id="container">

<?php
    session_start();

    //check if session exists
    if(isset($_SESSION["userName"]))
    {
?>

<!DOCTYPE html>

<html>

<?php

    $songTitle = $_POST["songTitle"];
    $artistBandName = $_POST["artistBandName"];
    $audioVideoLink = $_POST["audioVideoLink"];
    $genre = $_POST["genre"];
    $language = $_POST["language"];
    $releaseDate = $_POST["releaseDate"];
    $status = $_POST["agreement"]

?>

    <head>
        <link rel="stylesheet" type="text/css" href="reference.css">
        <title>the Crew Song Collection</title>
    </head>

    <body>
        <h2>Song Registration Details</h2>
        <br>

        <table border="2px" style="border-collapse: collapse; color: white;">
            <tr>
                <td id="smallPadding">Song Title :</td>
                <td style="font-weight:bold;" id="smallPadding"><?php echo $songTitle;?></td>
            </tr>
            <tr>
                <td id="smallPadding">Artist / Band Name :</td>
                <td style="font-weight:bold;" id="smallPadding"><?php echo $artistBandName;?></td>
            </tr>
            <tr>
                <td id="smallPadding">Audio / Video Link :</td>
                <td style="font-weight:bold;" id="smallPadding"><a href="<?php echo $audioVideoLink;?>" target="_blank"><?php echo $audioVideoLink;?></a></td>
            </tr>
            <tr>
                <td id="smallPadding">Genre :</td>
                <td style="font-weight: bold;" id="smallPadding"><?php echo $genre;?></td>
            </tr>
            <tr>
                <td id="smallPadding">Language :</td>
                <td style="font-weight:bold;" id="smallPadding"><?php echo $language;?></td>
            </tr>
            <tr>
                <td id="smallPadding">Release Date :</td>
                <td style="font-weight:bold;" id="smallPadding"><?php echo $releaseDate;?></td>
            </tr>
            <tr>
                <td id="smallPadding">Status :</td>
                <td style="font-weight:bold;" id="smallPadding"><?php echo $status;?></td>
            </tr>
        </table>

        <?php
        
            $host = "localhost"; //hostname
            $user = "root"; //database userid
            $pass = ""; //database pwd
            $db = "thecrew_songcollectiondb"; //database name
            
            //create connection
            $conn = new mysqli($host, $user, $pass, $db);

            if($conn->connect_error) //to check if DB connection IS NOT OK
            {
                die("Connection failed".$conn->connect_error); //show error msg
            }
            else //connection OK - write query to insert record
            {
                $sql = "INSERT INTO SONG (songTitle, artistBandName, audioVideoLink, genre, language, releaseDate, status, uploader) VALUES ('".$songTitle."','".$artistBandName."','".$audioVideoLink."','".$genre."','".$language."','".$releaseDate."','".$status."','".$_SESSION["userName"]."');";

                //to execute query
                if($conn->query($sql) === TRUE)
                {
                    echo "<p style='color:blue;'>Success insert record</p>";
                }
                else
                {
                    echo "<p style='color:red;'>Fail to insert".$conn->error."</p>";
                }
            }
            $conn->close();

        ?>

        <a href="songForm.php"><button>Register New Song</button></a>

        <a href="viewSong.php"><button>View Song List</button></a>
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

</div>