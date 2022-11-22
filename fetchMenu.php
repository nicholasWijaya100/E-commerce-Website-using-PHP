<?php
	require("connection.php");
    $hasilSearch = $_GET['keyword'];
    $keyword = "%" . $hasilSearch . "%";
    $select_query = "SELECT * FROM menu WHERE name LIKE '%$keyword%'";
	$res = $conn->query($select_query);
	$ctr = 0;
	echo "<table>";
		echo "<tr>";
		echo 	"<th class='col'>Gambar</th>";
		echo 	"<th class='col'>Nama</th>";
		echo 	"<th class='col'>Harga</th>";
		echo "</tr>";
	while($row = $res->fetch_assoc()) {
		$ctr++;
		echo "<tr>";
            echo "<td><img src=".$row["image"]." width='200px' height='100px'></td>";
			echo "<td>".$row['name']."</td>";
			echo "<td> Rp. ".$row["price"]."</td>";
            echo "<td>"."<button onclick='btnKurang(this)' value='".$row['menu_id']."'>-</button> <input type='text' class ='qty' id='qty". $row['menu_id'] . "' value=0> <button onclick='btnTambah(this)' value='".$row['menu_id']."'>+</button>"."</td>";
            echo "<input type='hidden' id='harga". $row['menu_id'] . "' value='".$row['price']."'";
        echo "</tr>";
	}
	if($ctr == 0){
		echo "<tr>";
			echo "<td colspan='5'>Tidak ada Menu</td>";
		echo "</tr>";
	}
	echo "</table>";
?>