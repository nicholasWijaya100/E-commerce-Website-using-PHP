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
    <link rel="stylesheet" href="style.css">
</head>
<body onload='initPage()'>
    <nav class="navbar navbar-expand-sm px-3"  style="background-color: white;">
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
        <!-- Filters -->
        <h2><strong>Filters</strong></h2>
        <div id="filter_container" class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto my-5 row" style="width: 100%;">
            <div class='col-4 d-flex flex-row align-items-center'>
                <div class='me-3'><input type="radio" id="rbNama" name="rbSearch" value="nama" checked onclick="checkRb(value)"> Nama</div>
                <div class='me-3'><input type="radio" id="rbKategori" name="rbSearch" value="kategori" onclick="checkRb(value)"> Kategori</div> 
                <div><input type="radio" id="rbHarga" name="rbSearch" value="harga" onclick="checkRb(value)"> Harga</div>
            </div>
            <div class='col-8'>
                <input class="form-control input-lg" type="text" id="searchNama" placeholder="Search Menu By Nama">
                <select name="kategori_id" id="cbKategori" class="form-select" style="visibility: hidden; display: none;">
                    <option value="Semua">Semua</option>
                    <option value="1">Appetizer</option>
                    <option value="2">Main Course</option>
                    <option value="3">Drinks</option>
                    <option value="4">Desert</option>
                </select>
                <input class="form-control input-lg" type="text" id="searchHarga" placeholder="Search Menu By Harga" style="visibility: hidden; display: none;">
            </div>
        </div>

        <!-- Menu -->
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
    searchNama = document.getElementById("searchNama");
    searchHarga = document.getElementById("searchHarga");
    cbKategori = document.getElementById("cbKategori");

    rbNama = document.getElementById("rbNama");
    rbKategori = document.getElementById("rbKategori");
    rbHarga = document.getElementById("rbHarga");
    
    hasilSearch = "";
    hasilCb = "Semua";
    cekHarga = 0;

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
        r.send(`jenis=fetchMenuAppetizer&isHome=true&keyword=`+hasilSearch+`&kat=`+hasilCb+`&harga=`+cekHarga);
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
        r.send(`jenis=fetchMenuMainCourse&isHome=true&keyword=`+hasilSearch+`&kat=`+hasilCb+`&harga=`+cekHarga);
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
        r.send(`jenis=fetchMenuDrinks&isHome=true&keyword=`+hasilSearch+`&kat=`+hasilCb+`&harga=`+cekHarga);
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
        r.send(`jenis=fetchMenuDesert&isHome=true&keyword=`+hasilSearch+`&kat=`+hasilCb+`&harga=`+cekHarga);
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
        if(quantity > 0){
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

    // Filter Functions
    

    function fetchMenu(){
        fetch_menu_appetizer();
        fetch_menu_main_course();
        fetch_menu_drinks();
        fetch_menu_desert();
    }
    
    searchNama.oninput = function (){
        hasilSearch = document.getElementById("searchNama").value;
        fetchMenu();
    };
    searchHarga.oninput = function (){
        if(!isNaN(searchHarga.value)){
            cekHarga = document.getElementById("searchHarga").value;
            if(cekHarga == 0){
                cekHarga = 99999999;
            }
            fetchMenu();
        }
    };

    function checkRb(value){
        if(value == "nama"){
            reset();
            document.getElementById("searchNama").style.visibility="visible";
            document.getElementById("cbKategori").style.visibility="hidden";
            document.getElementById("searchHarga").style.visibility="hidden";
            document.getElementById("searchNama").style.display="block";
            document.getElementById("cbKategori").style.display="none";
            document.getElementById("searchHarga").style.display="none";
        }else if(value == "kategori"){
            reset();
            document.getElementById("searchNama").style.visibility="hidden";
            document.getElementById("cbKategori").style.visibility="visible";
            document.getElementById("searchHarga").style.visibility="hidden";
            document.getElementById("searchNama").style.display="none";
            document.getElementById("cbKategori").style.display="block";
            document.getElementById("searchHarga").style.display="none";
        }else if(value == "harga"){
            reset();
            document.getElementById("searchNama").style.visibility="hidden";
            document.getElementById("cbKategori").style.visibility="hidden";
            document.getElementById("searchHarga").style.visibility="visible";
            document.getElementById("searchNama").style.display="none";
            document.getElementById("cbKategori").style.display="none";
            document.getElementById("searchHarga").style.display="block";
        }
    }

    function reset(){
        hasilSearch = "";
        hasilCb = "Semua";
        cekHarga = 0;
        document.getElementById("searchNama").value = "";
        document.getElementById("searchHarga").value = "";
        fetchMenu();
    }

    cbKategori.onchange = (ev) =>{
        hasilCb = cbKategori.options[cbKategori.selectedIndex].value;
        fetchMenu();
    }
</script>