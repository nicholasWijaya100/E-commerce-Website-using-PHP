<?php
    require_once("connection.php");
    $currentID = $_SESSION['loggedIn']['user_id'];
    $result = mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where user_id = '$currentID'"));

    $stmt = $conn->prepare("SELECT * FROM kategori");
    $stmt->execute();
    $listKategori = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<style>
    .hilang{
        visibility: hidden;
    }
    .muncul{
        visibility: visible;
    }
</style>
<body onload="load_ajax()">
    <form action="" method="POST">
        <h1>Welcome, <?= $result["username"] ?></h1>
        <input type="submit" formaction="index.php" value="Logout">
    </form>
    <input type="radio" id="rbNama" name="rbSearch" value="nama" checked onclick="checkRb(value)"> Nama 
    <input type="radio" id="rbKategori" name="rbSearch" value="kategori" onclick="checkRb(value)"> Kategori  
    <input type="radio" id="rbHarga" name="rbSearch" value="harga" onclick="checkRb(value)"> Harga  
    <br>
    <input type="text" id="search" placeholder="Search Menu">
    <select name="kategori_id" id="cbKategori" style="visibility: hidden;">
      <?php
      if ($listKategori !== null) {
        foreach ($listKategori as $key => $value) {
      ?>
          <option value="<?= $value['kategori_id'] ?>"><?= $value['kategori_nama'] ?></option>
      <?php
        }
      }
      ?>

    </select>
    <table border="1" id="tabelMenu">
    
    </table>

    <script>
        hasilSearch = document.getElementById("search");
        rbNama = document.getElementById("rbNama");
        rbKategori = document.getElementById("rbKategori");
        rbHarga = document.getElementById("rbHarga");

        cbKategori = document.getElementById("cbKategori");

        function load_ajax() {
            fetchMenu();
        }

        function fetchMenu(){
            hasilSearch = document.getElementById("search").value;
            r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if ((this.readyState==4) && (this.status==200)) {
                    tabelMenu.innerHTML = this.responseText;
                }
            }

            r.open('GET', 'fetchMenu.php?keyword='+hasilSearch);
            r.send();
        }
        
        hasilSearch.oninput = function (){
            fetchMenu();
        };

        function checkRb(value){
            if(value == "nama"){
                document.getElementById("search").style.visibility="visible";
                document.getElementById("cbKategori").style.visibility="hidden";
            }else if(value == "kategori"){
                document.getElementById("cbKategori").style.visibility="visible";
                document.getElementById("search").style.visibility="hidden";
            }
        }

    </script>
</body>
</html>