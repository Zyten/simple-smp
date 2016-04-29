<?php
	include("db/dbc.php");
	session_start();
	if(isset($_POST['submit'])) {
		$key=$_POST['key'];
		//Unset session variables after each search
		$_SESSION['qid'] 		 = NULL;
		$_SESSION['qnama_penuh'] = NULL;
	    $_SESSION['qno_kp'] 	 = NULL;
	    $_SESSION['qjabatan']    = NULL;
        //Query pelajar based on searched matric number
		$query=mysqli_query($conn, "SELECT jp.id, jp.nama_penuh, jp.no_kp, jk.singkatan FROM jpelajar jp, jkursus jk WHERE no_matrik='$key' AND jp.id_kursus = jk.id");
		
		$count=mysqli_num_rows($query); //If found, num rows will be 1
		
		if($count == 1) {
			while($row=mysqli_fetch_array($query))
			{
			  $_SESSION['qid'] 		   = $row['id'];
			  $_SESSION['qnama_penuh'] = $row['nama_penuh'];
			  $_SESSION['qno_kp'] 	   = $row['no_kp'];
			  $_SESSION['qjabatan']    = $row['singkatan'];
			}
			$_SESSION['search_found'] = 1;
		}
		
		else{
			while($row=mysqli_fetch_row($query))
			{
			 $_SESSION['qnama_penuh'] = "N/A";
			 $_SESSION['qno_kp'] 	  = "N/A";
			 $_SESSION['qjabatan']    = "N/A";
			}
			$_SESSION['search_errors'] = array("&nbsp;&nbsp;Sila masukkan No. Kad Pelajar yang tepat.");
		}
		header("location:urus-calon.php");
		exit();
	}
?>