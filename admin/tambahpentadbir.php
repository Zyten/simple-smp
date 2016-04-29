<?php
	include("db/dbc.php");
	session_start();
	if (isset($_POST['tambah']))
	{	
		$myNoStaf = addslashes( $_POST['no_staf'] ); //prevents types of SQL injection
		
		$queryExist=mysqli_query($conn, "SELECT id FROM jpentadbir jpe WHERE jpe.no_staf='$myNoStaf'");
		
		if (mysqli_num_rows($queryExist) == 1) //record exists in jpentadbir
		{
			$_SESSION['addnew_errors'] = array("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ralat. Staf sudah ada dalam senarai pentadbir.");
		}
		else{
			$myNamaPenuh = addslashes( $_POST['nama_penuh'] ); //prevents types of SQL injection
			$myNoKP = $_POST['no_kp'];
			$myKataLaluan = $_POST['pwd'];
			$myNewKataLaluan = $_POST['cpwd'];
			
			if($myKataLaluan != $myNewKataLaluan)
				$_SESSION['addnew_errors'] = array("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ralat. Kata Laluan tidak sama.");

			else{
				$newKataLaluan = md5($myKataLaluan); //This will make your password encrypted into md5, a high security hash
                
				//Query insert new pentadbir into table pentadbir
				$sql = mysqli_query( $conn, "INSERT INTO jpentadbir(no_staf, nama_penuh, no_kp, kata_laluan) VALUES ('$myNoStaf','$myNamaPenuh', '$myNoKP', '$newKataLaluan')" )
						or die( mysqli_error() );

				$_SESSION['addnew_errors'] = array("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Akaun pentadbir berjaya dibuat.");
			}
		}
		
		header("location:urus-pentadbir.php");
		exit();
	}
?>