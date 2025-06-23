<?php 
    require 'conn.php';
    require 'functions.php';
    
    var_dump($_SERVER["REQUEST_METHOD"]);
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $userId = (int) $_GET["id"];
        // var_dump($userId);
        $statement = $pdo->prepare('SELECT id, first_name, last_name, email FROM users where id = :id');
        $statement->execute([
            ':id' => $userId
        ]);

        $user = $statement->fetch();

    }

    var_dump($_SERVER["REQUEST_METHOD"]);
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "entered here";
        $clean = sanitizeInput($_POST);
        $firstName = $clean["first_name"];
        $lastName = $clean["last_name"];
        $email = $clean["email"];
        $id = $clean["user_id"];

        // $statement = $pdo->prepare('INSERT INTO users (first_name, last_name, email, password) 
        //                             VALUES (:first_name, :last_name, :email, :password) ');
        $statement = $pdo->prepare('UPDATE users
                                    SET first_name = :first_name, last_name = :last_name, email = :email
                                    WHERE id = :id');

        $statement->execute([
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':email' => $email,
            ':id' => $id
        ]);

        echo "<h3>Updated Successfully!</h3>";
        header("Location: users.php"); 

        //save into DB
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editing <?php  ?></title>
    </head>
    <body>
        <form action="user_edit.php" method="POST">
            <input type="text" name="first_name" value="<?php echo $user['first_name'] ?>">
            <input type="text" name="last_name" value="<?php echo $user['last_name'] ?>">
            <input type="text" name="email" value="<?php echo $user['email'] ?>">
            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>"  >
            <button type="submit">Submit</button>
        </form>

        <?php


            
            

        ?>
    </body>
</html>