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
</head>
<body style="background-color: #DAE0E6; color: black">
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
                    <a style="color: black; text-decoration: none;" href="index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="py-5 rounded-lg mx-auto" style="width: 70%;">
        <h2><strong>Edit Makanan</strong></h2>
        <div id="appetizer_container" class="d-flex flex-row flex-wrap bg-light p-5 rounded-lg mx-auto mt-5" style="width: 100%;">
            <div style="width: 100%;" class="mb-5 h3">Appetizer</div>
            <div class="card me-4 mb-5" style="width: 30%;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-primary">Delete</a>
                </div>
            </div>
            <div class="card mx-4 mb-5" style="width: 30%;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-primary">Delete</a>
                </div>
            </div>
            <div class="card ms-4 mb-5" style="width: 30%;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
<script>
    function loadMenu(){
        $.post("ajax.php",
            {jenis: "loadmenu"},
            function (result) { 
                var arr = JSON.parse(result);
                var kal = "<div style='width: 100%;' class='mb-5 h3'>Appetizer</div>";
                for(var i = 0; i < arr.length; i++){
                    kal = kal + "<div class='card me-4 mb-5' style='width: 30%;'>";
                        kal = kal + "<img src='" + arr[i]['menu_image'] + "' class='card-img-top' alt='...'>";
                        kal = kal + "<div class='card-body'>";
                            kal = kal + "<h5 class='card-title'>" + arr[i]['menu_name'] + "</h5>";
                            kal = kal + "<p class='card-text'>" + "Price: Rp." + arr[i]['menu_price']+ "</p>";
                            kal = kal + "<button type='button' name='editButton' class='btn btn-primary'>Edit</a>";
                            kal = kal + "<button type='button' name='deleteButton' class='btn btn-primary'>Delete</a>";
                        kal = kal + "</div>";
                    kal = kal + "</div>";
                }
                $("appetizer_container").html(kal);
             }
        );
    }

    loadMenu()
</script>