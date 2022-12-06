<?php 
	session_start();
	$_SESSION["message"] = "";

	$servername = "localhost";
	$username 	= "root";
	$password 	= "";
	$dbname     = "db_proyek_bwp_2022"; 
	$conn 		= new mysqli($servername, $username, $password, $dbname);

    function alert($msg) {
        echo"<script>alert('$msg')</script>";
    }
?>