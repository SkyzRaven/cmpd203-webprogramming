<div id="container">

<?php

    session_start();
    
    //if session exists
    //session userid gets value from text field named userid, shown in login.php
    if(isset($_SESSION["userName"]))
    {
?>
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="reference.css">
                <title>the Crew Song Collection</title>
            </head>
            <body>
                <h2>WELCOME, Hi <?php echo $_SESSION["userName"];?></h2>
                <p>Choose your menu :</p>
                <?php
                    if($_SESSION["userType"] == "admin")
                    {
                ?>
                        <a href="viewSongAdmin.php"><button>View Song List</button></a><br><br>
                        <a href="preViewSongStatusAdmin.php"><button>Update Song Registration Status</button></a><br><br>
                        <a href="viewUserStatusAdmin.php"><button>Edit User Status</button></a><br><br>
                        <a href="viewSongSearch.php"><button>Search For Song</button></a><br><br>

                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="songForm.php"><button>Register New Song</button></a><br><br>
                        <a href="viewSongEdit.php"><button>Edit Song Details</button></a><br><br>
                        <a href="viewSongDelete.php"><button>Delete Song Record</button></a><br><br>
                        <a href="viewSong.php"><button>View Song List</button></a><br><br>
                        <?php
                    }
                        ?>
                <a href="logout.php"><button>Logout</button></a><br><br>
            </body>
        <?php
    }
    else
    {
        echo "No session exists or session has expired. Please log in again.<br>";
        echo "<a href='login.html'>Login</a>";
    }
        ?>

</div>