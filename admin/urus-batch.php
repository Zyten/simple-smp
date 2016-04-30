<?php
include("db/dbc.php");
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['id_pentadbir_smp'])){
    header("location:access-denied.php");
}
if(!isset($_SESSION['search_found']))
    $_SESSION['search_found'] = 0;
?>

<?php
$result = mysqli_query($conn, "SELECT * FROM jsesi");

$_SESSION['jum_calon'] = mysqli_num_rows($result);
?>

    <!DOCTYPE html>
    <html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Maklumat Pelajar UTHM</title>

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
    <script type="text/javascript">
        function delete_id(id)
        {
            if(confirm('Padam maklumat?'))
            {
                window.location='padambatch.php?delete_id='+id
            }
        }
        function edit_id(id)
        {
            //if(confirm('Urus Pelajar'))
            //{
                window.location='urus-pelajar.php?id_sesi='+id
            //}
        }
    </script>
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

                    <span>&nbsp;&nbsp;&nbsp;SISTEM MAKLUMAT PELAJAR</span>
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
                                <a  href="urus-pentadbir.php"><i class="fa fa-user-md"></i> Urus Pentadbir</a>
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
                    <!-- Display list of all calon in table -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Senarai Batch</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <form name="borangdaftar" method="post" action="tambahbatchsimpan.php">
                                    <table width="380" border="0">
                                        <tr>
                                            <td width="280"><label>Tambah Batch</label></td>
                                            <td width="20">:</td>
                                            <td width="80"><input type="text" name="batch" size="30"/></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Simpan" class="btn btn-primary" value="Tambah" />
                                                <label>
                                                    <input class="btn btn-danger" type="reset" name="reset" value="Padam" />
                                                </label></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <br>
                            <!-- Display errors in del_errors stack if any and unset once done -->
                            <div class="x_content">
                                <?php if (isset($_SESSION['del_errors'])): ?>
                                    <div class="form-errors">
                                        <?php foreach($_SESSION['del_errors'] as $error): ?>
                                            <p><?php echo $error ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php unset($_SESSION['del_errors']); endif;?>

                                <table style="max-width:none;table-layout:fixed; word-wrap: break-word;" class="table table-striped responsive-utilities jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title">#</th>
                                        <th class="column-title">Batch</th>
                                        <th class="column-title no-link last"><span class="nobr">Tindakan</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $temp = 1;
                                    while ($row=mysqli_fetch_array($result)){
                                        //echo "<form class='form-horizontal form-label-left' action='buangcalon.php' method='POST'>";
                                        echo "<input type='hidden' name='delkey' value='".$row['id']."'/>";
                                        echo "<tr class='even pointer'>";
                                        echo "	<td class='a-center '>".$temp."</td>";
                                        echo "	<td class=' '>".$row['nama']."</td>";
                                        echo "	<td class=' last'>
	                                    <a href='javascript:edit_id(" .$row['id']. ")'><input class='btn btn-link btn-xs' type='submit' name='tambah' value='Urus' style='color:green;'/></a>
	                                    <a href='javascript:delete_id(" .$row['id']. ")'><input class='btn btn-link btn-xs' type='submit' name='tambah' value='Padam' style='color:red;'/></a></td>";
                                        echo "</tr>";
                                        //echo "</form>";
                                        $temp++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- footer content -->

            <footer>
                <div class="">
					<p class="text-center"> Penafian: Universiti Tun Hussein Onn Malaysia (UTHM) 
						adalah tidak bertanggungjawab bagi apa-apa kehilangan atau kerugian yang disebabkan oleh penggunaan mana-mana 
						maklumat yang diperolehi dari sistem ini.
					</p>
                    <p class="pull-right"> Hakcipta Terpelihara © 2016 |
                        <span class="lead"> <i class="fa fa-paw"></i> <a href="http://www.uthm.edu.my/v2/">UTHM</a></span>
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

    </html><?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/27/2016
 * Time: 11:16 PM
 */