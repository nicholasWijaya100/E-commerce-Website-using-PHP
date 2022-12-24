<?php
    include("koneksi.php");

    if(isset($_POST['addButton'])) {
        $name = $_POST['nameInput'];
        $category = $_POST['categoryInput'];
        $price = $_POST['priceInput'];
        $stock = $_POST['stockInput'];
        $picture = $_FILES["pictureInput"]["name"];

        if($name == "" || $category == "" || $price == "" || $stock == "" || $picture == "") {
            alert("All Fields Need to Be Filled");
        } else {
            $stmt = $conn->prepare("insert into menu(menu_kategori_id, menu_name, menu_price, menu_stok, menu_image) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $category, $name, $price, $stock, $picture);
            $stmt->execute();
            copy($_FILES["pictureInput"]["tmp_name"], 'assets/'.$picture);
        }
    }
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
<body >
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
    <div class="bg-light p-5 rounded-lg mx-auto mt-5" style="width: 50%;">
        <form action="" method="post" enctype="multipart/form-data">
            <h2><strong>Add Menu</strong></h2>
            <div class="mb-3 mt-5">
                <input type="text" class="form-control input-lg" name="nameInput" placeholder="Insert food name here">
            </div>
            <div class="mb-3">
                <select name="categoryInput" style="color: #6C84A7;" class="form-select" aria-label="Default select example">
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
                    <input type="number" class="form-control input-lg" name="priceInput" placeholder="Insert food price here">
                </div>
                <div class="col-6">
                    <input type="number" class="form-control input-lg" name="stockInput" placeholder="Insert food stock here">
                </div>
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend me-4">
                    <span class="form-control" id="inputGroupFileAddon01">Add Picture</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control" name="pictureInput"
                    aria-describedby="inputGroupFileAddon01">
                </div>
            </div>
            <div class="d-grid gap-2 mb-4">
                <button class="btn btn-success grey" type="submit" name="addButton">Add</button>
            </div>
        </form>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>