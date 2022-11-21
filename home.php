<?php
    require_once("connection.php");
    $result = mysqli_fetch_array(mysqli_query($conn,"SELECT * from user where id=".$_SESSION["loggedIn"]["ID"]));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <form action="" method="POST">
        <h1>Welcome, <?= $result["username"] ?></h1>
        <input type="submit" formaction="index.php" value="Logout">
    </form>
    
</body>
</html>