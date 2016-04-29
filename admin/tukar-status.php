<?php
	include("db/dbc.php");
	session_start();
	//If btn tutup submitted
	if(isset($_POST['tutup'])) {
		
		$sql = mysqli_query( $conn, "UPDATE jflag SET status_pengundian=0 WHERE id=0")
					or die( mysqli_error() );
					
		$_SESSION['status_errors'] = array("Pengundian telah ditutup.");
		$_SESSION['status_pengundian']=0;
		unset($_SESSION['tutup']);
		header("location:keputusan.php");
		exit();
	}
	//If btn buka submitted
	if(isset($_POST['buka'])) {
		//Query tukar status_pengundian
		$sql = mysqli_query($conn, "UPDATE jflag SET status_pengundian=1 WHERE id=0")
			   or die( mysqli_error() );
				
		$_SESSION['status_errors'] = array("Pengundian telah dibuka.");
		unset($_SESSION['buka']);
		$_SESSION['status_pengundian']=1;
		header("location:keputusan.php");
		exit();
	}
?>