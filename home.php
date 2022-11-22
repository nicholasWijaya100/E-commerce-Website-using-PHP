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
    <input type="text" id="searchNama" placeholder="Search Menu By Nama">
    <select name="kategori_id" id="cbKategori" style="visibility: hidden;">
        <?php
        if ($listKategori !== null) {
            ?>
        <option value="Semua">Semua</option>
        <?php
        foreach ($listKategori as $key => $value) {
            ?>
          <option value="<?= $value['kategori_id'] ?>"><?= $value['kategori_name'] ?></option>
          <?php
            }
        }
        ?>

    </select>
    <input type="text" id="searchHarga" placeholder="Search Menu By Harga" style="visibility: hidden;">
    <table border="1" id="tabelMenu">
    
    </table>

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
        function load_ajax() {
            fetchMenu();
        }

        function fetchMenu(){
            r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if ((this.readyState==4) && (this.status==200)) {
                    tabelMenu.innerHTML = this.responseText;
                }
            }
            
            r.open('GET', 'fetchMenu.php?keyword='+hasilSearch+'&kat='+hasilCb+'&harga='+cekHarga);
            r.send();
        }
        
        searchNama.oninput = function (){
            hasilSearch = document.getElementById("searchNama").value;
            fetchMenu();
        };
        searchHarga.oninput = function (){
            if(!isNaN(searchHarga.value)){
                cekHarga = document.getElementById("searchHarga").value;
                fetchMenu();
            }
        };

        function checkRb(value){
            if(value == "nama"){
                reset();
                document.getElementById("searchNama").style.visibility="visible";
                document.getElementById("cbKategori").style.visibility="hidden";
                document.getElementById("searchHarga").style.visibility="hidden";
            }else if(value == "kategori"){
                reset();
                document.getElementById("searchNama").style.visibility="hidden";
                document.getElementById("cbKategori").style.visibility="visible";
                document.getElementById("searchHarga").style.visibility="hidden";
            }else if(value == "harga"){
                reset();
                document.getElementById("searchNama").style.visibility="hidden";
                document.getElementById("cbKategori").style.visibility="hidden";
                document.getElementById("searchHarga").style.visibility="visible";
            }
        }

        function reset(){
            hasilSearch = "";
            hasilCb = "Semua";
            cekHarga = 0;
            document.getElementById("searchNama").value = "";
            document.getElementById("searchHarga").value = 0;
            fetchMenu();
        }

        cbKategori.onchange = (ev) =>{
            hasilCb = cbKategori.options[cbKategori.selectedIndex].value;
            fetchMenu();
        }

    </script>
</body>
</html>