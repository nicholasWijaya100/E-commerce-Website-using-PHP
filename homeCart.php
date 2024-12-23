<?php
    include("koneksi.php");

    $isLoggedIn = isset($_SESSION['loggedUser']);

    // Press - LoginLogout
    if(isset($_GET['loginLogout'])){

        // If Logged In
        if($isLoggedIn){
            unset($_SESSION['loggedUser']);
            header("location: homeMenu.php");
        }// If Logged Out
        else{
            header("location: login.php");
        }
    }
    // Set Login / Logout Text
    $loginLogoutText = "Login";
    if($isLoggedIn){
        $loginLogoutText = "Logout";
    }
    // Press - Cart
    if(isset($_GET['pressCart']) && $isLoggedIn){
            header("location: homeCart.php");
    }
    // Set Cart Text
    $cartText = "";
    if($isLoggedIn){
        $cartText = "Cart";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
</head>
<body style=" color: black" onload='initPage()'>
    <nav class="navbar navbar-expand-sm px-3" style="background-color: white;">
        <div class="container-fluid">
            <img class="navbar-brand" src="assets/logo.png" height="65">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                
            </div>
            <div class="d-flex">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item me-3">
                    <a style="color: black; text-decoration: none;" href="#"><?php echo $cartText; ?></a>
                    </li>
                    <li class="nav-item mx-3">
                    <a style="color: black; text-decoration: none;" href="homeMenu.php">Menu</a>
                    </li>
                    <li class="nav-item mx-3">
                    <a style="color: black; text-decoration: none;" href="homeCart.php?loginLogout=true"><?php echo $loginLogoutText;?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id='menu-container' class="py-5 rounded-lg mx-auto" style="width: 70%;">
        <div id="cart_container" class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5" style="width: 100%;">
            
        </div>
    </div>
</body>

<!-- Alert "Successfully added to cart!" -->
<div class="alert alert-success fixed-bottom d-none" role="alert" id="success-alert">
    Successfully added to cart!
</div>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
<script>
    name = "<?php echo $_SESSION['loggedUser'][0][2];?>";

    function initPage() {
        // onload
        fetch_cart();
    }
    function fetch_cart() {
        let r = new XMLHttpRequest();
        let cart_container = document.getElementById("cart_container");


        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                cart_container.innerHTML = this.responseText;
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=fetchCart&cartName=`+name);
    }
    function deleteCart(id){
        let r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                initPage();
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=deleteCart&id=${id}`);
    }
    function paymentConfirm(){
        let r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                if(this.responseText == "true"){
                    window.location.replace("paymentConfirm.php");
                }
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=checkCart`);
    }
</script>