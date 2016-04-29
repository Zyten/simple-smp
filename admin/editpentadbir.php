<?php
	include("db/dbc.php");
	session_start();
	
	if (isset($_POST['kemaskini']))
	{
		$myId= $_POST['id'];
		$myKataLaluan = $_POST['newpwd'];
		$myNewKataLaluan = $_POST['cnewpwd'];
		
		if($myKataLaluan != $myNewKataLaluan)
			$_SESSION['update_errors'] = array("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ralat. Kata Laluan tidak sama.");

		else {
			$newKataLaluan = md5($myKataLaluan); //This will make your password encrypted into md5, a high security hash
			//Query update kata_laluan
			$sql = mysqli_query($conn, "UPDATE jpentadbir SET kata_laluan='$newKataLaluan' WHERE id = '$myId'" )
					or die( mysqli_error() );
					
			$_SESSION['update_errors'] = array("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berjaya. Kata Laluan anda telah dikemaskini.");
		}
		header("location:urus-pentadbir.php");
		exit();
	}
?>