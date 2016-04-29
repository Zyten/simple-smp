<?php
include("db/dbc.php");

$table = "jpelajar";

$id=$_REQUEST['delete_id'];

$query1 = "DELETE FROM jpelajar WHERE id_sesi = $id";
$query2 = "DELETE FROM jsesi WHERE id = $id";
$result = (mysqli_query($conn,$query1) AND mysqli_query($conn,$query2)) or die ('Error updating database');

    if ($result){
        ?>
        <script>
            alert('Batch Telah Dipadam.')
            window.location='urus-batch.php'
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Terdapat Ralat Semasa Proses Memadamkan Batch. Sila Cuba Lagi.')
            window.location='urus-batch.php'
        </script>
        <?php

}
?>