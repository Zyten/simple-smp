<?php
	include("db/dbc.php");
	session_start();

	// Defining your login details into variables
	$myusername=$_POST['myusername'];
	$mypassword=$_POST['mypassword'];
	
	// MySQL injection protections
	$myusername = mysqli_real_escape_string($conn, $myusername);
	//$mypassword = mysqli_real_escape_string($conn, $mypassword);
	//$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
	// Hash the password.  $hashedPassword will be a 60-character string.
	//$hashedPassword = password_hash($mypassword, PASSWORD_DEFAULT);

	//Query data for login
	$sql="SELECT id, no_staf, nama_penuh, no_kp, kata_laluan FROM jpentadbir WHERE no_staf='$myusername'" or die(mysql_error());
	$result=mysqli_query($conn, $sql) or die(mysqli_error());
	$user = mysqli_fetch_assoc($result);

	if(password_verify($mypassword, $user['kata_laluan'])){
		$_SESSION['id_pentadbir_smp'] = $user['id'];
		$_SESSION['no_staf_smp'] 	  = $user['no_staf'];
		$_SESSION['nama_penuh_smp']   = $user['nama_penuh'];
		$_SESSION['no_kp_smp'] 		  = $user['no_kp'];
		
		header("location:home.php");
	}
	//If the username or password is wrong, you will receive this message below.
	else {
		$_SESSION['errors'] = array("&nbsp;&nbsp;ID Staf atau Kata Laluan tidak tepat.");
		header("Location:index.php");
	}
?>