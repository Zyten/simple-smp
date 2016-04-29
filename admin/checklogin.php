<?php
	include("db/dbc.php");
	session_start();

	// Defining your login details into variables
	$myusername=$_POST['myusername'];
	$mypassword=$_POST['mypassword'];
	
	// MySQL injection protections
	$myusername = mysqli_real_escape_string($conn, $myusername);
	$mypassword = mysqli_real_escape_string($conn, $mypassword);
	$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
	$tbl_name="jpentadbir"; // Table name

	//Query data for login
	$sql="SELECT * FROM $tbl_name WHERE no_staf='$myusername' AND kata_laluan='$encrypted_mypassword'" or die(mysqli_error());
	$result=mysqli_query($conn, $sql) or die(mysqli_error());

	// Checking results rows
	$count=mysqli_num_rows($result);
	// If username and password is a match, the count will be 1

	if($count==1){
		$user = mysqli_fetch_assoc($result);
		$_SESSION['id_pentadbir_smp'] = $user['id'];
		$_SESSION['no_staf_smp'] 	  = $user['no_staf'];
		$_SESSION['nama_penuh_smp']   = $user['nama_penuh'];
		$_SESSION['no_kp_smp'] 		  = $user['no_kp'];
		
		//Query status_pengundian
		$sql="SELECT * FROM jflag jf WHERE jf.id=0" or die(mysqli_error());
		$result=mysqli_query($conn, $sql) or die(mysqli_error());
		
		$stat = mysqli_fetch_assoc($result);

		//Save status_pengundian in SESSION
		$_SESSION['status_pengundian'] = $stat['status_pengundian'];
		
		header("location:home.php");
	}
	//If the username or password is wrong, you will receive this message below.
	else {
		$_SESSION['errors'] = array("&nbsp;&nbsp;ID Staf atau Kata Laluan tidak tepat.");
		header("Location:index.php");
	}
?>