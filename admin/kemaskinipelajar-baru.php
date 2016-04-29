<?php
include("db/dbc.php");

$nama_penuh = $_POST['nama_penuh'];
$no_kp = $_POST['no_kp'];
$no_matrik = $_POST['no_matrik'];
$id_kursus = $_POST['id_kursus'];
$id_sesi = $_POST['id_sesi'];
$id = $_POST['id'];

if(!isset($_FILES['avatar']) || $_FILES['avatar']['error'] == UPLOAD_ERR_NO_FILE) 
{
	echo '<script type="text/javascript">';
    echo '    alert("Pastikan anda muat naik gambar pelajar dengan format yang betul.");';
    echo '    window.location = "urus-pelajar.php?id_sesi='.$id_sesi.'";';
    echo '</script>';
}
else {

$query = "UPDATE jpelajar SET nama_penuh = '$nama_penuh', no_kp = '$no_kp', no_matrik = '$no_matrik',id_sesi = '$id_sesi', id_kursus = '$id_kursus'
					 WHERE id='$id'";
$result = mysqli_query($conn,$query) or die ('Error updating database');



if ($result){
    //start
    $errors= array();
    $file_name = $_FILES['avatar']['name'];
	$file_name = $no_matrik;
    $file_size =$_FILES['avatar']['size'];
    $file_tmp =$_FILES['avatar']['tmp_name'];
    $file_type=$_FILES['avatar']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['avatar']['name'])));

    $expensions= array("jpeg","jpg");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        $file_name = $no_matrik;
        move_uploaded_file($file_tmp,"../img/pelajar/".$file_name.".".$file_ext);

    }else{
        print_r($errors);
    }


    //end
    ?>

    <script type="text/javascript">
        alert("Maklumat telah dikemaskini")
        window.location = 'urus-pelajar.php?id_sesi=<?php echo $id_sesi; ?>'
    </script>
    <?php
    //echo 'Maklumat telah disimpan';
}

else { echo mysql_error(); }
}
?>
