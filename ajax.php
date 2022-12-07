<?php
    include("koneksi.php");
    if(isset($_POST['isHome'])){
        // Home Menu
        if($_POST['jenis'] == "fetchMenuAppetizer"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 1");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Appetizer</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    
        if($_POST['jenis'] == "fetchMenuMainCourse"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 2");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Main Course</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    
        if($_POST['jenis'] == "fetchMenuDrinks"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 3");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Drinks</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    
        if($_POST['jenis'] == "fetchMenuDesert"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 4");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Desert</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    }
    else{
        // Admin Menu
        if($_POST['jenis'] == "fetchMenuAppetizer"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 1");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Appetizer</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-primary'>Delete</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    
        if($_POST['jenis'] == "fetchMenuMainCourse"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 2");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Main Course</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-primary'>Delete</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    
        if($_POST['jenis'] == "fetchMenuDrinks"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 3");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Drinks</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-primary'>Delete</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    
        if($_POST['jenis'] == "fetchMenuDesert"){
            $stmt = $conn->query("select * from menu where menu_kategori_id = 4");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
    
            echo"<div style='width: 100%;' class='mb-5 h3'>Desert</div>";
            foreach($res as $idx => $menu) {
                $menu_id = $menu['menu_id'];
                $menu_name = $menu['menu_name'];
                $menu_image = $menu['menu_image'];
                $menu_price = $menu['menu_price'];
                $menu_stok = $menu['menu_stok'];
                echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                    echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                    echo"<div class='card-body'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-primary'>Delete</a>";
                    echo"</div>";
                echo"</div>";
            }
        }
    }
    

    if($_POST['jenis'] == "deleteMenu"){
        $menuId = $_POST['menuId'];
        $stmt = $conn->query("delete from menu where menu_id = '$menuId'");
    }
    if($_POST['jenis'] == "addCart"){
        $menuId = $_POST['menuId'];
        if(!isset($_SESSION["cart"])){
            $_SESSION["cart"] = [];
        }
        $cartIndex = -1;
        foreach($_SESSION["cart"] as $i => $x){
            if($x["id"] == $menuId){
                $cartIndex = $i;
            }
        }

        if($cartIndex == -1){
            // Belum ada di cart
            $newItem = array(
                'id' => $menuId,
                'qty' => 1
            );

            $_SESSION["cart"][] = $newItem;
        }
        else{
            // Sudah ada di cart
            $_SESSION["cart"][$cartIndex]["qty"] ++;
        }
    }
?>