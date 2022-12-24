<?php
    include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body onload='initPage()'>
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
                    <a style="color: black; text-decoration: none;" href="adminAddFood.php">Add New Menu</a>
                    </li>
                    <li class="nav-item mx-3">
                    <a style="color: black; text-decoration: none;" href="adminEditFood.php">Edit Menu</a>
                    </li>
                    <li class="nav-item mx-3">
                    <a style="color: black; text-decoration: none;" href="adminReport.php">Laporan</a>
                    </li>
                    <li class="nav-item mx-3">
                    <a style="color: black; text-decoration: none;" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id='menu-container' class="py-5 rounded-lg mx-auto" style="width: 70%;">
        <h2><strong>Edit Makanan</strong></h2>
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
<div id='popUpMenuEditor' class="p-5 rounded-lg mx-auto" style="width: 50%; position: fixed; display: none; visibility: hidden; top: 25%; left: 25%; color: white; background-color: #F9F9FB;">
    <div><h4><strong style="color: black;">Edit Makanan</strong></h4></div>
    <div class="mb-3 mt-5">
        <input type="text" class="form-control input-lg" id="nameInput" placeholder="Insert food name here">
    </div>
    <div class="mb-3">
        <select id="categoryInput" style="color: #6C84A7;" class="form-select" aria-label="Default select example">
            <option value="" selected hidden disabled>Select Food Category</option>
            <?php
                $stmt = $conn->query("select * from kategori");
                $res = $stmt->fetch_all(MYSQLI_BOTH);
                foreach($res as $idx => $kategori_combo_item) {
                    $kategori_id = $kategori_combo_item['kategori_id'];
                    $kategori_name = $kategori_combo_item['kategori_name'];
                    echo"<option value='$kategori_id'>$kategori_name</option>";
                }
            ?>
        </select>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <input type="number" class="form-control input-lg" id="priceInput" placeholder="Insert food price here">
        </div>
        <div class="col-6">
            <input type="number" class="form-control input-lg" id="stockInput" placeholder="Insert food stock here">
        </div>
    </div>
    <div>
        <button class='btn btn-success me-1 grey' onclick='editMenu()'>Edit</button>
        <button class='btn btn-danger' onclick='closePopUp()'>Close</button>
    </div>
</div>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
<script>
    let currentEditId = -1;
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
        r.send(`jenis=fetchMenuAppetizer`);
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
        r.send(`jenis=fetchMenuMainCourse`);
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
        r.send(`jenis=fetchMenuDrinks`);
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
        r.send(`jenis=fetchMenuDesert`);
    }

    function initPage() {
        fetch_menu_appetizer();
        fetch_menu_main_course();
        fetch_menu_drinks();
        fetch_menu_desert();
    }

    function openMenuEditor(id) {
        currentEditId = id.substr(6);
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

    function editMenu() {
        let r = new XMLHttpRequest();
        let menu_name = document.getElementById("nameInput").value;
        let menu_category = document.getElementById("categoryInput").value;
        let menu_price = document.getElementById("priceInput").value;
        let menu_stock = document.getElementById("stockInput").value;

        r.onreadystatechange = function() {
            if ((this.readyState==4) && (this.status==200)) {
                initPage();
                closePopUp();
            }
        }

        r.open('POST', 'ajax.php');
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(`jenis=editMenu&menuId=${currentEditId}&menuName=${menu_name}&menuCategory=${menu_category}&menuPrice=${menu_price}&menuStock=${menu_stock}`);
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