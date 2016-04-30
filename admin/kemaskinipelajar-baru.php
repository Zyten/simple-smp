<?php
include("db/dbc.php");

$nama_penuh = $_POST['nama_penuh'];
$no_kp = $_POST['no_kp'];
$no_matrik = $_POST['no_matrik'];
$id_kursus = $_POST['id_kursus'];
$id_sesi = $_POST['id_sesi'];
$id = $_POST['id'];

$currfilename = '../img/pelajar/'.$no_matrik.'.jpg';
$existing = false;
if (file_exists($currfilename)) {
	$_FILES['avatar']['error'] = UPLOAD_ERR_OK;
	$existing = true;
}

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

	if (file_exists($currfilename)) {
		$file_name = $no_matrik;
		$file_size = filesize($currfilename);
		$file_tmp ="../img/pelajar/".$file_name.".jpg";
		$file_type="image/jpeg";
		$file_ext="jpg";
	}
	
    $extensions = array("jpeg","jpg");

    if(in_array($file_ext,$extensions)=== false && $existing == false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[]='File size must be less than 2 MB';
    }

    if(empty($errors)==true){
		$src = imagecreatefromjpeg($file_tmp);
		list($width,$height)=getimagesize($file_tmp);

		$newwidth=277;
		//$newheight=($height/$width)*$newwidth;
		$newheight=277;
		$tmp=imagecreatetruecolor($newwidth,$newheight);

		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = "../img/pelajar/".$no_matrik.".".$file_ext;
		imagejpeg($tmp,$filename,100);

		imagedestroy($src);
		imagedestroy($tmp);
        /*$file_name = $no_matrik;
        move_uploaded_file($file_tmp,"../img/pelajar/".$file_name.".".$file_ext);*/

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
