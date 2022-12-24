<?php
    include("koneksi.php");

    $complete = true;
    $conf = true;
    $exist = true;
    $success = false;

    if(isset($_POST['registerBtn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $fpassword = md5($password);
        
        if($username == "" || $password == "" || $cpassword == "") {
            $_SESSION["message"] = "Mohon isi semua field";
            $complete = false;
        } else {
            if($password != $cpassword) {
                $_SESSION["message"] = "Password dan confirm password tidak sama";
                $conf = false;
            } else {
                $stmt = $conn->query("select * from users where username = '$username'");
                $res = $stmt->fetch_all(MYSQLI_BOTH);
                if(count($res) > 0) {
                    $_SESSION["message"] = "Username sudah dipakai, silahkan pilih username lain";
                    $exist = true;
                } else {
                    $stmt = $conn->prepare("insert into users(username, password) values(?, ?)");
                    $stmt->bind_param("ss", $username, $fpassword);
                    $stmt->execute();
                    $_SESSION["message"] = "Register Berhasil";
                    $success = true;
                }   
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-card regis-tall">
        <form action="" method="POST">

            
            <h1>Register</h1>
            <div class="form-rows">
                <input type="text" name="username" placeholder="Masukan username" class= "text-input">
            </div>
            <div class="form-rows">
                <input type="password" name="password" placeholder="Masukan Password" class= "text-input">
            </div>
            <div class="form-rows">
            <input type="password" name="cpassword" placeholder="Masukan Confirm Password" class= "text-input">
            </div>
            
            <?php 
                if(!$complete) echo '<div class="message-box">Mohon isi semua field</div>';
                elseif(!$conf) echo '<div class="message-box">Password dan confirm password tidak sama</div>';
                elseif(!$exist) echo '<div class="message-box">Username sudah dipakai, silahkan pilih username lain</div>';
                elseif($success) echo '<div class="message-box inversed-message">Registered Success</div>';

            ?>
           
            
            <input type="submit" value="Login" formaction="login.php" class="login-buttons">
            <input type="submit" value="Register" name="registerBtn" class="login-buttons">

        </form>
    </div>
</body>
</html>