<?php
    include("koneksi.php");

    if(isset($_POST['loginBtn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if($username == "admin" && $password = "admin") {
            header("Location: adminFood.php");
        } else if($username == "" || $password == "") {
            $_SESSION["message"] = "Mohon isi semua field";
        } else {
            $stmt = $conn->query("select * from users where username='$username'");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            if(count($res) == 0) {
                $_SESSION["message"] = "Username tidak ditemukan";
            } else {
                if($password != $res[0]['password']) {
                    $_SESSION["message"] = "Password Salah";
                } else {
                    $_SESSION['loggedUser'] = $res[0];
                    header("location: home1.php");
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="login-card">
        <h1>Login</h1><br>
        <form action="" method="POST">
            <div class="form-rows">
                <input type="text" name="username" placeholder="Username" class="text-input">
            </div>
            <div class="form-rows">
                <input type="password" name="password" placeholder="Password" class="text-input">
            </div>
            <input type="submit" name="loginBtn" value="Login" class="login-buttons">
            <input type="submit" formaction="register.php" value="Register" class="login-buttons">
        </form>
    </div>
</body>
</html>