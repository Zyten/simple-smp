<?php

include("db/dbc.php");
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['id_pentadbir'])){
    header("location:access-denied.php");
}
if(!isset($_SESSION['search_found']))
    $_SESSION['search_found'] = 0;

$id=$_REQUEST['id'];
$nama_penuh=$_REQUEST['nama_penuh'];
$no_matrik=$_REQUEST['no_matrik'];
$no_kp=$_REQUEST['no_kp'];
$id_kursus=$_REQUEST['id_kursus'];
$id_sesi=$_REQUEST['id_sesi'];

$sql = "SELECT id, nama_penuh, singkatan FROM jkursus;";
$senarai_kursus=mysqli_query ($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pencalonan MPP UTHM</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- some CSS styling changes and overrides -->
    <style>
        .kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        .kv-avatar .file-input {
            display: table-cell;
            max-width: 220px;
        }
    </style>

    <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
         This must be loaded before fileinput.min.js -->
    <script src="js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
    <script src="js/fileinput.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/jquery-1.12.0.min.js"></script>
</head>


<body class="nav-md">

<div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="home.php" class="site_title"> <span>UTHM</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">

                    <span>&nbsp;&nbsp;&nbsp;SISTEM PENCALONAN MPP</span>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3></h3>
                        <ul class="nav side-menu">
                            <li>
                                <a  href="home.php"><i class="fa fa-home"></i> Utama</a>
                            </li>
                            <li>
                                <a  href="urus-batch.php"><i class="fa fa-user"></i> Urus Pelajar</span></a>
                            </li>
                            <li>
                                <a  href="urus-calon.php"><i class="fa fa-user"></i> Urus Calon</span></a>
                            </li>
                            <li>
                                <a  href="urus-pentadbir.php"><i class="fa fa-user-md"></i> Urus Pentadbir</a>
                            </li>
                            <li>
                                <a  href="keputusan.php"><i class="fa fa-list"></i> Keputusan</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <ul class="nav pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Keluar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="page-title">
                    <div class="title_left">
                        <h3>Urus Pelajar</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="clearfix"></div>
                    <!-- Form tambah calon -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" novalidate action="kemaskinipelajar-baru.php" method="post" enctype="multipart/form-data">
                                <span class="section">Kemaskini Maklumat Pelajar</span>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Penuh <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="id_sesi" class="form-control col-md-7 col-xs-12" name="id" type="hidden" value="<?php echo $id; ?>">
                                            <input id="id_sesi" class="form-control col-md-7 col-xs-12" name="id_sesi" type="hidden" value="<?php echo $id_sesi; ?>">
                                            <input id="nama_penuh" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" value="<?php echo $nama_penuh; ?>" data-validate-words="2" name="nama_penuh" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">No. Kad Pengenalan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="no_kp" name="no_kp" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $no_kp; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">No. Kad Pelajar <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="no_matrik" name="no_matrik" data-validate-linked="email" required="required"  value="<?php echo $no_matrik; ?>" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Kursus <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<select id="id_kursus" name="id_kursus" class="form-control col-md-7 col-xs-12"> 
											<?php while ($row = mysqli_fetch_assoc($senarai_kursus)) { ?>
												<option value=<?php $row['id']?>><?php echo $row['singkatan']?></option>
											<?php } ?>
											</select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button style="margin-top:2%" type="submit" class="btn btn-success">Tambah</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <!-- the avatar markup -->
                                    <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none"></div>

                                    <div class="kv-avatar center-block" style="width:200px">
                                        <input id="avatar" name="avatar" type="file" class="file-loading" >
                                    </div>
                                    <!-- include other inputs if needed and include a form submit (save) button -->

                                    <!-- your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

            <!-- footer content -->

            <footer>
                <div class="">
                    <p class="pull-right"> Hakcipta Terpelihara © 2016 |
                        <span class="lead"> <i class="fa fa-paw"></i> <a href="http://www.ilpledang.gov.my/v5/index.php/en/">ILP LEDANG</a></span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

        </div>
        <!-- /page content -->
    </div>

</div>

<script src="js/bootstrap.min.js"></script>

<script src="js/custom.js"></script>

<!-- the fileinput plugin initialization -->
<script>
    $("#avatar").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="img/default_avatar_male.jpg" alt="Your Avatar" style="width:160px">',
        layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
</script>

</body>

</html>