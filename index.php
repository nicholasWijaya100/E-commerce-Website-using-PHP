<?php
    include("koneksi.php");
    $complete = true;
    $exist = true;
    $correct = true;

    if(isset($_POST['loginBtn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "admin" && $password = "admin") {
            header("Location: adminAddFood.php");
        } else if($username == "" || $password == "") {
            $complete = false;
            $_SESSION["message"] = "Mohon isi semua field";
        } else {
            $stmt = $conn->query("select * from users where username='$username'");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            if(count($res) == 0) {
                $_SESSION["message"] = "Username tidak ditemukan";
                $exist = false;
            } else {
                if($password != $res[0]['password']) {
                    $_SESSION["message"] = "Password Salah";
                    $correct = false;
                } else {
                    $_SESSION['loggedUser'] = $res[0];
                    header("location: homeMenu.php");
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
            <?php 
                if(!$complete) echo '<div class="message-box">Mohon isi semua field</div>';
                elseif(!$exist) echo '<div class="message-box">Username tidak ditemukan</div>';
                elseif(!$correct) echo '<div class="message-box">Password Salah</div>';

            ?>
            
            <input type="submit" name="loginBtn" value="Login" class="login-buttons">
            <input type="submit" formaction="register.php" value="Register" class="login-buttons">
        </form>
    </div>
</body>
</html>