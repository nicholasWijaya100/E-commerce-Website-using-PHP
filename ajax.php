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
                        echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                        echo"<div class='row mb-2'>";
                        echo"<div class='col-6 fs-5'>Quantity: </div>";
                        echo"<div class='col-6'><input type='number' class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                        echo"</div>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</button>";
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
                        echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                        echo"<div class='row mb-2'>";
                        echo"<div class='col-6 fs-5'>Quantity: </div>";
                        echo"<div class='col-6'><input type='number' class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                        echo"</div>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</button>";
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
                        echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                        echo"<div class='row mb-2'>";
                        echo"<div class='col-6 fs-5'>Quantity: </div>";
                        echo"<div class='col-6'><input type='number' class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                        echo"</div>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</button>";
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
                        echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                        echo"<div class='row mb-2'>";
                        echo"<div class='col-6 fs-5'>Quantity: </div>";
                        echo"<div class='col-6'><input type='number' class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                        echo"</div>";
                        echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1'>Add to Cart</button>";
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
    if($_POST['jenis'] == "fetchCart"){
        // Header
        echo"<div style='width: 100%;' class='mb-5 h3'>Cart</div>";
        echo"
            <table class='table'>
                <tr>
                    <th class='col'>No.</th>
                    <th class='col'>Nama Menu</th>
                    <th class='col'>Quantity</th>
                    <th class='col'>Harga</th>
                    <th class='col'>Subtotal</th>
                    <th class='col'></th>
                </tr>
        ";

        // Items
        $total = 0;
        foreach($_SESSION['cart'] as $i => $x){
            $item = mysqli_fetch_array(mysqli_query($conn, "select * from menu where menu_id = '".$x['id']."'"));
            $total += $x['qty']*$item['menu_price'];
            echo "
                <tr>
                    <td>".($i+1)."</td>
                    <td>".$item['menu_name']."</td>
                    <td>".$x['qty']."</td>
                    <td>".$item['menu_price']."</td>
                    <td>".$x['qty']*$item['menu_price']."</td>
                    <td><button type='button' id='$i' onclick='deleteCart(this.id)' name='deleteButton' class='btn btn-primary'>Delete</button></td>
                </tr>
            ";
        }

        // Grand Total
        echo "<tr>
        <td colspan='4'><b>Grand Total : </b></td>
        <td colspan='1'><b>$total</b></td>
        <td colspan='1'>
            <form method='post' action='paymentConfirm.php'>
            <button type='submit' name='temp' class='btn btn-primary'>Payment</button>
            </form>
        </td>
        <tr>";
        echo"</table>";
    }
    

    if($_POST['jenis'] == "deleteMenu"){
        $menuId = $_POST['menuId'];
        $stmt = $conn->query("delete from menu where menu_id = '$menuId'");
    }

    if($_POST['jenis'] == "editMenu") {
        $menuId = $_POST['menuId'];
        $menuName = $_POST['menuName'];
        $menuCategory = $_POST['menuCategory'];
        $menuPrice = $_POST['menuPrice'];
        $menuStock = $_POST['menuStock'];
        $stmt = $conn->query("update menu set menu_kategori_id = '$menuCategory', menu_name = '$menuName', menu_price = '$menuPrice', menu_stok = '$menuStock' where menu_id = '$menuId'");
    }

    if($_POST['jenis'] == "deleteCart"){
        $id = $_POST['id'];
        unset($_SESSION['cart'][$id]);
    }
    if($_POST['jenis'] == "addCart"){
        $menuId = $_POST['menuId'];
        $qty = $_POST['qty'];

        $stmt = $conn->query("select menu_name, menu_price from menu where menu_id = '$menuId'");
        $res = $stmt->fetch_all(MYSQLI_BOTH);
        $price = $res[0]['menu_price'];
        $name = $res[0]['menu_name'];

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
                'qty' => intval($qty),
                'price' => intval($price),
                'namaproduk' => $name
            );

            $_SESSION["cart"][] = $newItem;
        }
        else{
            // Sudah ada di cart
            $_SESSION["cart"][$cartIndex]["qty"] += $qty;
        }
    }
    if($_POST['jenis'] == "midtranspayment") {
        $htrans_user_id = $_SESSION['loggedUser']['user_id'];
        $htrans_tanggal_transaksi = date('Y-m-d');
        $htrans_total = $_SESSION['subtotal'];
        $htrans_status = 1;

        //$stmt = $conn->query("insert into htrans(htrans_user_id, htrans_tanggal_transaksi, htrans_total, htrans_status) values($htrans_user_id, $htrans_tanggal_transaksi, $htrans_total, $htrans_status)");
        $stmt = $conn->prepare("insert into htrans(htrans_user_id, htrans_tanggal_transaksi, htrans_total, htrans_status) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $htrans_user_id, $htrans_tanggal_transaksi, $htrans_total, $htrans_status);
        $stmt->execute();
    }
?>