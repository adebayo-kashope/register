<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <form action="register.php" method="POST">
            <input type="text" name="first_name">
            <input type="text" name="last_name">
            <input type="text" name="email">
            <input type="password" name="password">
            <button type="submit">Submit</button>
        </form>

        <?php
            require 'conn.php';
            require 'functions.php';


            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // var_dump($_POST);
                // die();
                $clean = sanitizeInput($_POST);
                $firstName = $clean["first_name"];
                $lastName = $clean["last_name"];
                $email = $clean["email"];
                $password = $clean["password"];

                $statement = $pdo->prepare('INSERT INTO users (first_name, last_name, email, password) 
                                            VALUES (:first_name, :last_name, :email, :password) ');

                $statement->execute([
                    ':first_name' => $firstName,
                    ':last_name' => $lastName,
                    ':email' => $email,
                    ':password' => password_hash($password, PASSWORD_BCRYPT)
                ]);

                echo "<h3>Form Submitted!</h3>";


                //save into DB
            }
            


            echo "Ji";
        ?>
    </body>
</html>