<?php 
	//Start session
	session_start();
	
	//Destroy all session variables 
	//session_destroy();
	unset($_SESSION['id_pentadbir_smp']);
	unset($_SESSION['no_staf_smp']);
	unset($_SESSION['nama_penuh_smp']);
	unset($_SESSION['no_kp_smp']);
	
	header("location:index.php");
?>
