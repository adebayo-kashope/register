<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="login.php" method="POST">
            <input type="text" name="email">
            <input type="password" name="password">
            <button type="submit">Submit</button>
        </form>

        <?php
            require 'conn.php';
            require 'functions.php';

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $clean = sanitizeInput($_POST);
                $email = $clean["email"];
                $password = $clean["password"];

                if(is_null($password) || ($password == "")) {
                    echo "Credentials cannot be null";
                    return;
                }
                
                $stmt = $pdo->prepare('SELECT id, email, password, first_name FROM users where email = :email');

                $stmt->execute([
                    ':email' => $email
                ]);

                $user = $stmt->fetch();
                if($user) {
                    if(password_verify($password, $user["password"])) {
                        echo "Login Successful";
                        session_start();
                        $_SESSION["loggedInUser"] = $user;
                        header("Location: dashboard.php"); 
                        exit();
                    }else{
                        echo "Incorrect Credentials";
                    }
                    die();
                }else{
                    echo "Incorrect Credentials";
                }
                


            }

        ?>
    </body>
</html>