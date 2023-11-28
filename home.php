<?php
include ("db.php");
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

try {
    $db->insertUser($email, $password);
    echo "Succes";
} catch (PDOException $e) {
    echo "Error inserting' . ".$e->getmessage();
 }
}

$users = $db->selectUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        <tr>
            <?php foreach ($users as $user) { ?>
                <tr>
            <td><?php echo $user["id"]?></td>
            <td><?php echo $user["email"]?></td>
            <td><?php echo $user['password']?></td>
        </tr>
            <?php
            }
            ?>
        </tr> 
    </table>

    <form method="post">
       <input type="text" name="email">
       <input type="password" name="password">
       <input type="submit">
    </form>
</body>
</html>