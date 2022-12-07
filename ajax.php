<?php
    include("koneksi.php");
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

    if($_POST['jenis'] == "deleteMenu"){
        $menuId = $_POST['menuId'];
        $stmt = $conn->query("delete from menu where menu_id = '$menuId'");
    }
?>