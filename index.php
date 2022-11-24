<?php
    require_once("connection.php");
    
    $result = mysqli_query($conn,"SELECT * from users");

    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        if($username == "admin" && $pass == "admin"){
            $_SESSION["loggedIn"] = [
                "username" => 'admin'
            ];
            header("Location: admin.php");
            return;
        }
        if($username == "" || $pass==""){
            $_SESSION["message"] = "Mohon isi semua field";
            header("Location: index.php");
            return;
        }
        $check = false;
        #fetch_array digunakan untuk mengakses hasil query dalam bentuk array assosiatif
        while($row = mysqli_fetch_array($result)){
            if($username == $row["username"]){
                $check = true;
                if($pass == $row["password"]){
                    $_SESSION["loggedIn"] = [
                        "user_id" => $row["user_id"],
                        "username" => $username
                    ];
                    echo $_SESSION["loggedIn"]["user_id"];
                    header("Location: home.php");
                }else{
                    $_SESSION["message"] = "Password tidak sesuai";
                    header("Location: index.php");
                }
                break;
            }
        }

        if(!$check){
            $_SESSION["message"] = "Username belum terdaftar";
            header("Location: index.php");
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
                <input type="password" name="pass" placeholder="Password" class="text-input">
                
            </div>

            <input type="submit" formaction="register.php" value="Register" class="login-buttons">
            <input type="submit" name="login" value="Sign In" class="login-buttons">

        </form>
        
    </div>
</body>
</html>