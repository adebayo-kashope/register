<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <!-- This is my dashboard -->
        <?php
            session_start();
            // print_r($_SESSION["loggedInUser"]);

            if(!isset($_SESSION["loggedInUser"])) {
                echo "You are not allowed on this page";
                exit();
            }

            echo "Hello " . $_SESSION["loggedInUser"]['first_name']. " Welcome to your dashboard";
            echo "This is a secret that i only want the logged in user to see";
        ?>
    </body>
</html>