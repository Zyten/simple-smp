<?php
include("db/dbc.php");

$batch = $_POST['batch'];

$query= mysqli_query($conn,"SELECT nama FROM jsesi WHERE nama LIKE '%$batch%'");
$row = mysqli_fetch_array($query);
$rowcount = mysqli_num_rows($query);

if ($rowcount >= 1) {
     ?>
        <script type="text/javascript">
            alert("Batch Yang Sama Telah Didaftarkan!")
            window.location = 'urus-batch.php'
        </script>
    <?php

} else {
    $query = "INSERT INTO jsesi (nama) VALUES ('$batch')";
    mysqli_query($conn,$query) or die ('Error updating database');
    ?>
    <script type="text/javascript">
        //var name = prompt("What is your name?", "Type your name here");
        alert("Batch Telah Disimpan")
        window.location = 'urus-batch.php'

    </script>
    <?php
}
?>

