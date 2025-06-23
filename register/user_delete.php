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

    $statement = $pdo->prepare('UPDATE users
                                SET deleted_at = :deleted_at
                                WHERE id = :id');

    $currDate =  date("Y-m-d H:i:s"); 
    $statement->execute([
        ':deleted_at' =>  $currDate,
        ':id' => $userId
    ]);

    echo "<h3>Deleted Successfully!</h3>";
    header("Location: users.php"); 
?>
    </body>
</html>