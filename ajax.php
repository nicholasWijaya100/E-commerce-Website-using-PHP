<?php
    include("koneksi.php");
    if(isset($_POST['isHome'])){
        // Home Menu
        if($_POST['jenis'] == "fetchMenuAppetizer"){
            $hasilSearch = $_POST['keyword'];
            $hasilCb = $_POST['kat'];
            $cekHarga = $_POST['harga'];
            $keyword = "%" . $hasilSearch . "%";
            $isLoggedIn = $_POST['isLoggedIn'];

            if($hasilCb == "Semua")
                if($cekHarga == 0)
                    $select_query = "select * from menu where menu_kategori_id = 1 and menu_name like '$keyword'";
                else 
                    $select_query = "select * from menu where menu_kategori_id = 1 and menu_price <= $cekHarga";
            else
                $select_query = "select * from menu where menu_kategori_id = 1 and menu_kategori_id = '$hasilCb'";

            $stmt = $conn->query($select_query);
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            echo"<div style='width: 100%;' class='mb-5 h3'>Appetizer</div>";
            if($res){
                foreach($res as $idx => $menu) {
                    $menu_id = $menu['menu_id'];
                    $menu_name = $menu['menu_name'];
                    $menu_image = $menu['menu_image'];
                    $menu_price = $menu['menu_price'];
                    $menu_stok = $menu['menu_stok'];
                    echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                        echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                        echo"<div class='card-body cream'>";
                            echo"<h5 class='card-title'>$menu_name</h5>";
                            echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                            echo"<div class='row mb-2'>";
                            echo"<div class='col-6 fs-5'>Quantity: </div>";
                            echo"<div class='col-6'><input type='number' min='0' max=$menu_stok class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                            echo"</div>";
                            if($isLoggedIn == 'true'){
                                echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1 grey'>Add to Cart</button>";
                            }
                        echo"</div>";
                    echo"</div>";
                }
            }
    
            
        }
    
        if($_POST['jenis'] == "fetchMenuMainCourse"){
            $hasilSearch = $_POST['keyword'];
            $hasilCb = $_POST['kat'];
            $cekHarga = $_POST['harga'];
            $keyword = "%" . $hasilSearch . "%";
            $isLoggedIn = $_POST['isLoggedIn'];

            if($hasilCb == "Semua")
                if($cekHarga == 0)
                    $select_query = "select * from menu where menu_kategori_id = 2 and menu_name like '$keyword'";
                else 
                    $select_query = "select * from menu where menu_kategori_id = 2 and menu_price <= $cekHarga";
            else
                $select_query = "select * from menu where menu_kategori_id = 2 and menu_kategori_id = '$hasilCb'";

            $stmt = $conn->query($select_query);
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            echo"<div style='width: 100%;' class='mb-5 h3'>Main Course</div>";
            if($res){
                foreach($res as $idx => $menu) {
                    $menu_id = $menu['menu_id'];
                    $menu_name = $menu['menu_name'];
                    $menu_image = $menu['menu_image'];
                    $menu_price = $menu['menu_price'];
                    $menu_stok = $menu['menu_stok'];
                    echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                        echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                        echo"<div class='card-body cream'>";
                            echo"<h5 class='card-title'>$menu_name</h5>";
                            echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                            echo"<div class='row mb-2'>";
                            echo"<div class='col-6 fs-5'>Quantity: </div>";
                            echo"<div class='col-6'><input type='number' min='0' max=$menu_stok class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                            echo"</div>";
                            if($isLoggedIn == 'true'){
                                echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1 grey'>Add to Cart</button>";
                            }
                        echo"</div>";
                    echo"</div>";
                }
            }
    
            
        }
    
        if($_POST['jenis'] == "fetchMenuDrinks"){
            $hasilSearch = $_POST['keyword'];
            $hasilCb = $_POST['kat'];
            $cekHarga = $_POST['harga'];
            $keyword = "%" . $hasilSearch . "%";
            $isLoggedIn = $_POST['isLoggedIn'];

            if($hasilCb == "Semua")
                if($cekHarga == 0)
                    $select_query = "select * from menu where menu_kategori_id = 3 and menu_name like '$keyword'";
                else 
                    $select_query = "select * from menu where menu_kategori_id = 3 and menu_price <= $cekHarga";
            else
                $select_query = "select * from menu where menu_kategori_id = 3 and menu_kategori_id = '$hasilCb'";

            $stmt = $conn->query($select_query);
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            echo"<div style='width: 100%;' class='mb-5 h3'>Drinks</div>";
            if($res){
                foreach($res as $idx => $menu) {
                    $menu_id = $menu['menu_id'];
                    $menu_name = $menu['menu_name'];
                    $menu_image = $menu['menu_image'];
                    $menu_price = $menu['menu_price'];
                    $menu_stok = $menu['menu_stok'];
                    echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                        echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                        echo"<div class='card-body cream'>";
                            echo"<h5 class='card-title'>$menu_name</h5>";
                            echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                            echo"<div class='row mb-2'>";
                            echo"<div class='col-6 fs-5'>Quantity: </div>";
                            echo"<div class='col-6'><input type='number' min='0' max=$menu_stok class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                            echo"</div>";
                            if($isLoggedIn == 'true'){
                                echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1 grey'>Add to Cart</button>";
                            }
                        echo"</div>";
                    echo"</div>";
                }
            }
            
        }
    
        if($_POST['jenis'] == "fetchMenuDesert"){
            $hasilSearch = $_POST['keyword'];
            $hasilCb = $_POST['kat'];
            $cekHarga = $_POST['harga'];
            $keyword = "%" . $hasilSearch . "%";
            $isLoggedIn = $_POST['isLoggedIn'];

            if($hasilCb == "Semua")
                if($cekHarga == 0)
                    $select_query = "select * from menu where menu_kategori_id = 4 and menu_name like '$keyword'";
                else 
                    $select_query = "select * from menu where menu_kategori_id = 4 and menu_price <= $cekHarga";
            else
                $select_query = "select * from menu where menu_kategori_id = 4 and menu_kategori_id = '$hasilCb'";

            $stmt = $conn->query($select_query);
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            echo"<div style='width: 100%;' class='mb-5 h3'>Desert</div>";
            if($res){
                foreach($res as $idx => $menu) {
                    $menu_id = $menu['menu_id'];
                    $menu_name = $menu['menu_name'];
                    $menu_image = $menu['menu_image'];
                    $menu_price = $menu['menu_price'];
                    $menu_stok = $menu['menu_stok'];
                    echo"<div class='card me-4 mb-5' style='width: 30%;'>";
                        echo"<img src='assets/$menu_image' height='200px' width='290px' class='card-img-top' alt='...'>";
                        echo"<div class='card-body cream'>";
                            echo"<h5 class='card-title'>$menu_name</h5>";
                            echo"<div class='card-text mb-1'>Price: Rp.$menu_price</div>";
                            echo"<div class='row mb-2'>";
                            echo"<div class='col-6 fs-5'>Quantity: </div>";
                            echo"<div class='col-6'><input type='number' min='0' max=$menu_stok class='form-control input-lg' id='quantityInput$menu_id' value='0'></div>";
                            echo"</div>";
                            if($isLoggedIn == 'true'){
                                echo"<button type='button' id='menuId$menu_id' onclick='addCart(this.id)' name='addCartButton' class='btn btn-primary me-1 grey'>Add to Cart</button>";
                            }
                        echo"</div>";
                    echo"</div>";
                }
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
                    echo"<div class='card-body cream'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1 grey'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-danger'>Delete</a>";
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
                    echo"<div class='card-body cream'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1 grey'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-danger'>Delete</a>";
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
                    echo"<div class='card-body cream'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1 grey'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-danger'>Delete</a>";
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
                    echo"<div class='card-body cream'>";
                        echo"<h5 class='card-title'>$menu_name</h5>";
                        echo"<div class='card-text'>Price: Rp.$menu_price</div>";
                        echo"<p class='card-text'>Stok: $menu_stok</p>";
                        echo"<button type='button' id='menuId$menu_id' onclick='openMenuEditor(this.id)' name='editButton' class='btn btn-primary me-1 grey'>Edit</a>";
                        echo"<button type='button' id='menuId$menu_id' onclick='deleteMenu(this.id)' name='deleteButton' class='btn btn-danger'>Delete</a>";
                    echo"</div>";
                echo"</div>";
            }
        }

        if($_POST['jenis'] == "fetchLaporan"){
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            if($startDate == '' || $endDate == '') {
                $startDate = '2022-12-01';
                $endDate = '2022-12-31';
            }
            echo "<h2><strong>Laporan</strong></h2>";
            echo"<div class='row'>";
                echo"<div class='col-1'></div>";
                echo"<div class='col-4'>";
                    echo"From Date: <input id='startDate' class='form-control' type='date' value='$startDate'  onchange='fetch_laporan_isi_refresh()'>";
                echo"</div>"; 
                echo"<div class='col-2'></div>";
                echo"<div class='col-4'>";
                    echo"To Date: <input id='endDate' class='form-control' type='date'  value='$endDate' onchange='fetch_laporan_isi_refresh()'>";
                echo"</div>";
                echo"<div class='col-1'></div>";
            echo"</div>";
            $stmt = $conn->query("select * from htrans left join users on htrans.htrans_user_id = users.user_id where htrans_tanggal_transaksi between '$startDate' and '$endDate'");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            foreach($res as $idx => $laporan){
                echo '<div class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5 rounded" style="width: 100%;">';
                // Header
                echo"
                    <h4>".$laporan['username']." | ".$laporan['htrans_tanggal_transaksi']."</h4>
                    <table class='table'>
                        
                        <tr>
                            <th class='col'>No.</th>
                            <th class='col'>Nama Menu</th>
                            <th class='col'>Quantity</th>
                            <th class='col'>Subtotal</th>
                            <th class='col'></th>
                        </tr>
                ";

                // Items 
                $total = 0;
                $totalqty = 0;
                $i = 0;
                $stmta = $conn->query("select * from dtrans left join menu on dtrans.dtrans_menu_id = menu.menu_id where dtrans_htrans_id=".$laporan['htrans_id']);
                $resa = $stmta->fetch_all(MYSQLI_BOTH);
                foreach($resa as $idxa => $laporana){
                    echo "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>".$laporana['menu_name']."</td>
                            <td>".$laporana['dtrans_quantity']."</td>
                            <td>".$laporana['dtrans_subtotal']."</td>
                            
                        </tr>
                    ";
                    $i ++;
                    $total += $laporana['dtrans_subtotal'];
                    $totalqty += $laporana['dtrans_quantity'];
                }
                echo "<tr>
                <td colspan='2'><b>Grand Total : </b></td>
                <td colspan='1'><b>$totalqty</b></td>
                <td colspan='1'><b>$total</b></td>
                <tr>";
                echo '</table>';
                echo '</div>';
            }

            //Total Penhasilan Periode
            $stmt = $conn->query("select sum(htrans.htrans_total) as 'final' from htrans left join users on htrans.htrans_user_id = users.user_id where htrans_tanggal_transaksi between '$startDate' and '$endDate'");
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            $total = $res[0]['final'];
            echo '<div class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5 rounded" style="width: 100%;">';
                echo"Pendapatan mulai tanggal ($startDate) sampai tanggal ($endDate) =  <b>Rp.$total</b>";
            echo "</div>";
        }
    }

    

    if($_POST['jenis'] == "fetchCart" && isset($_SESSION['cart'])){
        // Header
        $cartName = $_POST['cartName'];
        echo"<div style='width: 100%;' class='mb-5 h3'>$cartName's Cart</div>";
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
            <form method='post'>
            <button type='submit' name='temp' class='btn btn-primary' onclick='paymentConfirm()'>Payment</button>
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
        $htrans_user_id = $_SESSION['loggedUser'][0]['user_id'];
        $htrans_tanggal_transaksi = date('Y-m-d');
        $htrans_total = $_SESSION['subtotal'];
        $htrans_status = 1;

        //$stmt = $conn->query("insert into htrans(htrans_user_id, htrans_tanggal_transaksi, htrans_total, htrans_status) values($htrans_user_id, $htrans_tanggal_transaksi, $htrans_total, $htrans_status)");
        $stmt = $conn->prepare("insert into htrans(htrans_user_id, htrans_tanggal_transaksi, htrans_total, htrans_status) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $htrans_user_id, $htrans_tanggal_transaksi, $htrans_total, $htrans_status);
        $stmt->execute();

        $stmt = $conn->query("SELECT htrans_id FROM htrans ORDER BY htrans_id DESC LIMIT 1");
        $res = $stmt->fetch_all(MYSQLI_BOTH);
        $dtrans_htrans_id = $res[0]['htrans_id'];

        $cart = $_SESSION['cart']; 
        foreach($cart as $idx => $item) {
            $dtrans_menu_id = $cart[$idx]['id'];
            $dtrans_price = intval($cart[$idx]['price']);
            $dtrans_quantity = intval($cart[$idx]['qty']);
            $dtrans_total = $dtrans_price * $dtrans_quantity;
            $stmt = $conn->prepare("insert into dtrans(dtrans_htrans_id, dtrans_menu_id, dtrans_quantity, dtrans_subtotal) values(?, ?, ?, ?)");
            $stmt->bind_param("ssss", $dtrans_htrans_id, $dtrans_menu_id, $dtrans_quantity, $dtrans_total);
            $stmt->execute();
        }
        unset($_SESSION['cart']);
    }
    if($_POST['jenis'] == "checkCart"){
        // Check
        $cart = $_SESSION['cart'];
        $checkStock = true;
        $_SESSION["tess"] = "AA";

        foreach($cart as $idx => $x){
            
            $select_query = "select * from menu where menu_name = '".$x['namaproduk']."'";
            $stmt = $conn->query($select_query);
            $res = $stmt->fetch_all(MYSQLI_BOTH);
            if($res[0]['menu_stok'] < $x['qty']){
                $checkStok = false;
            }
        }
        if($checkStock == true){
            echo "true";

            // ilangi stock
            foreach($cart as $idx => $x){
                $stokakhir = $res[0]['menu_stok'] - $x['qty'];
                $temo = $x['namaproduk'];
                $conn->query("update menu set menu_stok = $stokakhir where menu_name = '$temo'");
            }
        }
        else{
            echo "";
        }

    }
?>