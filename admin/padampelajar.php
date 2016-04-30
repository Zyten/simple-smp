<?php
include("db/dbc.php");

$table = "jpelajar";

$id=$_REQUEST['delete_id'];
$id_sesi=$_REQUEST['id_sesi'];
$no_matrik=$_REQUEST['no_matrik'];

$query = "DELETE FROM jpelajar WHERE id = $id";
$result = mysqli_query($conn,$query) or die ('Error updating database');

if ($result){
	$filename = '../img/pelajar/'.$no_matrik.'.jpg';
	if (file_exists($filename)) {
		unlink($filename);}
    ?>
    <script>
        alert('Maklumat Pelajar Telah Dipadam.')
        window.location='urus-pelajar.php?id_sesi=<?php echo $id_sesi ?>'
    </script>
    <?php
} else {
    ?>
    <script>
        alert('Terdapat Ralat Semasa Proses Memadamkan Maklumat Pelajar. Sila Cuba Lagi.')
        window.location='urus-pelajar.php'
    </script>
    <?php

}
?>