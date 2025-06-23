<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <?php
            require 'conn.php';

            // $stmt = $pdo->query("SELECT id, first_name, last_name, email FROM users where deleted_at IS NULL");
            // $users = $stmt->fetchAll();
            // var_dump($users);
        ?>

        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <!-- <?php foreach ($users as $index => $user): ?> -->
                <tr>
                    <td><?php echo $user["id"] ?></td>
                    <td><?php echo $user["first_name"] ?></td>
                    <td><?php echo $user["last_name"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td> <a href="user_edit.php?id=<?php echo $user['id'] ?>">Edit</a> </td>
                    <td> <a href="user_delete.php?id=<?php echo $user['id'] ?>">Delete</a> </td>
                    <td> <a href="user_view.php?id=<?php echo $user['id'] ?>">View</a> </td>
                </tr>
            <?php endforeach; ?>
        </table>

            <tr>
                <td>

                </td>
            </tr>
        </table>
    </body>
</html>