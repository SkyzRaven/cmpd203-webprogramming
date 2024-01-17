<?php
    session_start();

    echo "<head><link rel='stylesheet' type='text/css' href='reference.css'><title>Log Out</title></head>";
    echo "<div id='container'>";

    if(isset($_SESSION["userName"]))
    {
        session_unset();
        session_destroy();

        echo "<br><p style='color:red;'>You have successfully log out.</p>";
        echo "<br><a href='login.html'><button>Return to Login</button></a>";
        echo "<br><br><a href='index.html'><button>Return to Index</button></a></div>";
    }
    else
    {
        
        echo "No session exists or session is expired. Please log in again";
        echo "<br><br><a href='login.html'><button>Return to Login</button></a></div>";
    }
?>