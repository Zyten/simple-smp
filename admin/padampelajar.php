<?php
include("db/dbc.php");

$table = "jpelajar";

$id=$_REQUEST['delete_id'];
$id_sesi=$_REQUEST['id_sesi'];

$query = "DELETE FROM jpelajar WHERE id = $id";
$result = mysqli_query($conn,$query) or die ('Error updating database');

if ($result){
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