<?php
    include("koneksi.php");

    if(!isset($_SESSION['cart'])) {
        $_SESSION["cart"] = [];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body style="background-color: #DAE0E6; color: black" onload='initPage()'>
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
                    <a style="color: black; text-decoration: none;" href="homeCart.php">Cart</a>
                    </li>
                    <li class="nav-item mx-3">
                    <a style="color: black; text-decoration: none;" href="homeMenu.php">Menu</a>
                    </li>
                    <li class="nav-item mx-3">
                    <a style="color: black; text-decoration: none;" href="index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id='menu-container' class="py-5 rounded-lg mx-auto" style="width: 70%;">
        <h2><strong>Menu</strong></h2>
        <div id="appetizer_container" class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5" style="width: 100%;">
            
        </div>
        <div id="main_course_container" class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5" style="width: 100%;">
            
        </div>
        <div id="drinks_container" class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5" style="width: 100%;">
            
        </div>
        <div id="desert_container" class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5" style="width: 100%;">
            
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
    function fetch_menu_appetizer() {
        let r = new XMLHttpRequest();
        let appetizer_container = document.getElementById("appetizer_container");

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                appetizer_container.innerHTML = this.responseText;
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=fetchMenuAppetizer&isHome=true`);
    }

    function fetch_menu_main_course() {
        let r = new XMLHttpRequest();
        let main_course_container = document.getElementById("main_course_container");

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                main_course_container.innerHTML = this.responseText;
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=fetchMenuMainCourse&isHome=true`);
    }
    
    function fetch_menu_drinks() {
        let r = new XMLHttpRequest();
        let drinks_container = document.getElementById("drinks_container");

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                drinks_container.innerHTML = this.responseText;
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=fetchMenuDrinks&isHome=true`);
    }

    function fetch_menu_desert() {
        let r = new XMLHttpRequest();
        let desert_container = document.getElementById("desert_container");

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                desert_container.innerHTML = this.responseText;
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=fetchMenuDesert&isHome=true`);
    }

    function initPage() {
        fetch_menu_appetizer();
        fetch_menu_main_course();
        fetch_menu_drinks();
        fetch_menu_desert();
    }

    // Success Add to cart Alert
    function addCart(id){
        // Add Cart Ajax
        let r = new XMLHttpRequest();
        let menuId = id.substr(6);
        let quantityInput = document.getElementById("quantityInput" + menuId);
        let quantity = quantityInput.value;

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                initPage();
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=addCart&menuId=${menuId}&qty=${quantity}`);

        // Success Alert
        $("#success-alert").removeClass("d-none");
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    }

    function openMenuEditor() {
        let menuContainer = document.getElementById("menu-container");
        menuContainer.style.opacity = "50%";

        let popUp = document.getElementById("popUpMenuEditor");
        popUp.style.visibility = "visible";
        popUp.style.display = "block";
    }

    function closePopUp() {
        let menuContainer = document.getElementById("menu-container");
        menuContainer.style.opacity = "100%";

        let popUp = document.getElementById("popUpMenuEditor");
        popUp.style.visibility = "hidden";
        popUp.style.display = "none";
    }

    function deleteMenu(id) {
        let r = new XMLHttpRequest();
        let menuId = id.substr(6);

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                initPage();
            }
        }
        
        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=deleteMenu&menuId=${menuId}`);
    }
</script>