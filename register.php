<?php
    require_once("connection.php");
    $result = mysqli_query($conn,"SELECT * from users");

    if(isset($_POST['register'])){
        $available = true;
        while($row = mysqli_fetch_array($result)){
            if($_POST["username"] == $row["username"]){
                $available = false;
            }
        }
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
        if($username == "admin"){
            $_SESSION["message"] = "Username tidak boleh admin.";
            header("Location: register.php");
            return;
        }

        if($username == "" || $pass == "" || $cpass == ""){
            $_SESSION["message"] = "harap isi semua field yang ada.";
            header("Location: register.php");
        }elseif($available){
            if($_POST["pass"] == $_POST["cpass"]){
                mysqli_query($conn,"INSERT into users values('','$username','$pass',0)");
                $_SESSION["message"] = "Berhasil register";
                header("Location: index.php");
            }else{
                $_SESSION["message"] = "Confirm Password not match";
                header("Location: register.php");
            }
        }else{
            $_SESSION["message"] = "Username sudah terdaftar";
            header("Location: register.php");
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
</head>
<body>
    <form action="" method="POST">
        <h1>Register</h1>
        <p>Username : <input type="text" name="username" placeholder="Masukan username"></p>
        <p>Password : <input type="password" name="pass" placeholder="Masukan Password"></p>
        <p>Confirm : <input type="password" name="cpass" placeholder="Masukan Confirm Password"></p>
        <input type="submit" value="Register" name="register">
        <input type="submit" value="Sign Up" formaction="index.php">
    </form>
</body>
</html>