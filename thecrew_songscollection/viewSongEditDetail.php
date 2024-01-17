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
            <h2>Song List</h2>

            <p style="color:blue;font-weight:bold;"> Update Song Details </p>

            <?php

                $songID = $_POST["songID"];

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
                        <form action="viewSongEditSave.php" name="songUpdateForm" method="POST">

                            <?php
                                //Retrieve all $resultGet result
                                while($row = $resultQ->fetch_assoc())
                                {
                            ?>
                                    <label for="songTitle">Song Title : </label>
                                    <input type="text" id="songTitle" name="songTitle" maxlength="100" size="50" value="<?php echo $row['songTitle'];?>" required>
                                    <br><br>

                                    <label for="artistBandName">Artist / Band Name :</label>
                                    <input type="text" id="artistBandName" name="artistBandName" maxlength="45" size="45" value="<?php echo $row['artistBandName'];?>" required>
                                    <br><br>

                                    <label for="audioVideoLink">Song URL : </label>
                                    <input type="url" id="audioVideoLink" name="audioVideoLink" maxlength="100" size="100" value="<?php echo $row['audioVideoLink'];?>" required>
                                    <br><br>

                                    <label for="genre">Genre : </label>
                                    <?php $genre = $row['genre'];?>
                                    <select id="genre" name="genre" required>
                                        <option value=""> - Choose Genre - </option>
                                        <option value="pop" <?php if ($genre == "pop") echo "selected";?>> Pop </option>
                                        <option value="rock" <?php if ($genre == "rock") echo "selected";?>> Rock </option>
                                        <option value="hipHopAndRap" <?php if ($genre == "hipHopAndRap") echo "selected";?>> Hip-Hop & Rap </option>
                                        <option value="country" <?php if ($genre == "country") echo "selected";?>> Country </option>
                                        <option value="folk" <?php if ($genre == "folk") echo "selected";?>> Folk </option>
                                        <option value="jazz" <?php if ($genre == "jazz") echo "selected";?>> Jazz </option>
                                        <option value="electronicDanceMusic" <?php if ($genre == "electronicDanceMusic") echo "selected";?>> Electronic Dance Music </option>
                                        <option value="funk" <?php if ($genre == "funk") echo "selected";?>> Funk </option>
                                        <option value="disco" <?php if ($genre == "disco") echo "selected";?>> Disco </option>
                                        <option value="classical" <?php if ($genre == "classical") echo "selected";?>> Classical </option>
                                        <option value="techno" <?php if ($genre == "techno") echo "selected";?>> Techno </option>
                                        <option value="ambient" <?php if ($genre == "ambient") echo "selected";?>> Ambient </option>
                                        <option value="trap" <?php if ($genre == "trap") echo "selected";?>> Trap </option>
                                        <option value="other" <?php if($genre == "other") echo "selected";?>> Other </option>
                                    </select>
                                    <br><br>

                                    <label for="language">Language : </label>
                                    <?php $language = $row['language'];?>
                                    <select id="language" name="language" required>
                                        <option value=""> - Choose Language - </option>
                                        <option value="english" <?php if ($language == 'english') echo 'selected';?>> English </option>
                                        <option value="japanese" <?php if ($language == 'japanese') echo 'selected';?>> Japanese </option>
                                        <option value="chinese" <?php if ($language == 'chinese') echo 'selected';?>> Chinese </option>
                                        <option value="korean" <?php if ($language == 'korean') echo 'selected';?>> Korean </option>
                                        <option value="malay" <?php if ($language == 'malay') echo 'selected';?>> Malay </option>
                                        <option value="hindi" <?php if ($language == 'hindi') echo 'selected';?>> Hindi </option>
                                        <option value="tamil" <?php if ($language == 'tamil') echo 'selected';?>> Tamil </option>
                                        <option value="other" <?php if ($language == 'other') echo 'selected';?>> Other </option>
                                    </select>
                                    <br><br>

                                    <label for="releaseDate">Release Date : </label>
                                    <input type="date" id="releaseDate" name="releaseDate" value="<?php echo $row['releaseDate'];?>" required>
                                    <br><br>
                                    
                                    <script>
                                        var today = new Date().toISOString().split('T')[0];
                                        document.getElementById("releaseDate").setAttribute("max",today)
                                    </script>

                                    <input type="hidden" name="SID" value="<?php echo $row['songID'];?>">

                                    <input type="checkbox" id="agree" name="agreement" value="waiting" required>
                                    <label for="agree"> By submitting this form, I agree to comply with the site rules</label>
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