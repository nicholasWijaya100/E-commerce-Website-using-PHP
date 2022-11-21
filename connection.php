<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'db_proyek_bwp_2022');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(isset($_SESSION["message"])){
        echo "<script>alert('$_SESSION[message]')</script>";
        unset($_SESSION["message"]);
    }
?>