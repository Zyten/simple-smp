<?php
	include("db/dbc.php");
	session_start();
	//If your session isn't valid, it returns you to the login screen for protection
	if(empty($_SESSION['id_pentadbir_smp'])){
	 header("location:access-denied.php");
	}
	if(!isset($_SESSION['search_found']))
		$_SESSION['search_found'] = 0;

	$id_sesi = $_REQUEST['id_sesi'];
?>

<?php
	//$result = mysqli_query($conn, "SELECT jc.id as id_calon, jp.nama_penuh, jp.no_matrik, jp.no_kp, jk.nama_penuh as nama_kursus
	//		  FROM jcalon jc, jpelajar jp, jkursus jk WHERE jc.id_pelajar=jp.id AND jp.id_kursus=jk.id");
$limit = 25;
if (isset($_GET["page"])) { $page = $_GET["page"]; $page = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT jp.id as id, jp.nama_penuh, jp.no_matrik, jp.no_kp, jp.id_kursus, jk.nama_penuh as nama_kursus FROM
jkursus jk, jpelajar jp WHERE jp.id_kursus=jk.id AND jp.id_sesi='$id_sesi' LIMIT $start_from, $limit";
$rs_result = mysqli_query ($conn,$sql);

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
	<script type="text/javascript">
        function delete_id(id, id_sesi)
        {
            if(confirm('Padam maklumat pelajar?'))
            {
                window.location='padampelajar.php?delete_id='+id+'&id_sesi='+id_sesi
            }
        }
        function update_id(id, nama_penuh, no_matrik, no_kp, id_kursus, id_sesi)
        {
            if(confirm('Kemaskini maklumat pelajar?'))
            {
                window.location='kemaskinipelajar.php?id='+id+'&nama_penuh='+nama_penuh+'&no_matrik='+no_matrik+'&no_kp='+no_kp+'&id_kursus='+id_kursus+'&id_sesi='+id_sesi
            }
        }
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
	
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
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
                        <!-- Form tambah calon -->
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_content">
								<form class="form-horizontal form-label-left" novalidate action="tambahpelajar.php" method="post" enctype="multipart/form-data">
									<span class="section">Tambah Pelajar</span>
									<div class="col-md-9 col-sm-9 col-xs-9">
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Penuh <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="id_sesi" class="form-control col-md-7 col-xs-12" name="id_sesi" type="hidden" value="<?php echo $id_sesi; ?>">
											<input required id="nama_penuh" class="form-control col-md-7 col-xs-12" name="nama_penuh" required="required" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kp">No. Kad Pengenalan <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input required type="text" pattern="\d*" maxlength="12" placeholder="cth. 951216085565" id="no_kp" name="no_kp" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_matrik">No. Kad Pelajar <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input required  type="text" pattern="\d*" maxlength="8" placeholder="cth. 17214001" id="no_matrik" name="no_matrik" data-validate-linked="no_matrik" required="required" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kursus">Kursus <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
										<select name="id_kursus" class="form-control col-md-7 col-xs-12">
											<?php while ($row = mysqli_fetch_assoc($senarai_kursus)) { ?>
												<option value="<?php echo $row['id']?>"><?php echo $row['singkatan']?></option>
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

						<!-- Display list of all calon in table -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Senarai Pelajar</h2>
								<form action="resetcalon.php" method="POST" onsubmit="return confirm('Teruskan dengan reset calon?');">
									<!--submit form buang semua calon
									<button type="submit" name="creset" class="source pull-right btn btn-danger">Reset Calon</button> -->
									<?php if (isset($_SESSION['creset_errors'])): ?>
										<div class="form-errors">
											<?php foreach($_SESSION['creset_errors'] as $error): ?>
												<p style='margin-top:.5%;'>&nbsp;&nbsp;|&nbsp;<?php echo $error ?></p>
											<?php endforeach; ?>
										</div>
									<?php unset($_SESSION['creset_errors']); endif;?>
								</form>
                                    <div class="clearfix"></div>
                                </div>
								<!-- Display errors in del_errors stack if any and unset once done -->	
                                <div class="x_content">
                                    <table id="myTable" style="max-width:none;table-layout:fixed; word-wrap: break-word;" class="table table-striped responsive-utilities jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">Nama Penuh </th>
                                                <th class="column-title">No. Kad Pelajar </th>
                                                <th class="column-title">No. K/p </th>
                                                <th class="column-title">Kursus </th>
                                                <th class="column-title no-link last" colspan="2"><span class="nobr">Urus</span></th>
											</tr>
										</thead>

										<tbody>

                                        <?php
                                        $temp = 1;
                                        while ($row = mysqli_fetch_assoc($rs_result)) {
                                            ?>
                                            <tr class='even pointer'>
                                                <td class='a-center '><?php echo $temp; ?></td>
                                                <td class=' '><?php echo $row['nama_penuh']; ?></td>
                                                <td class=' '><?php echo $row['no_matrik']; ?></td>
                                                <td class=' '><?php echo $row['no_kp']; ?></td>
                                                <td class=' '><?php echo $row['nama_kursus']; ?></td>
                                                <td class=' last'><a href='javascript:update_id(<?php echo $row['id']; ?>,"<?php echo $row['nama_penuh']; ?>",<?php echo $row['no_matrik']; ?>,<?php echo $row['no_kp']; ?>,<?php echo $row['id_kursus']; ?>,<?php echo $id_sesi; ?>)'><input class='btn btn-link btn-xs' type='submit' name='tambah' value='Kemaskini' style='color:red; margin-top:-3%'/></a>
                                                <td class=' last'><a href='javascript:delete_id(<?php echo $row['id']; ?>,<?php echo $id_sesi; ?>)'><input class='btn btn-link btn-xs' type='submit' name='tambah' value='Padam' style='color:red; margin-top:-3%'/></a></td>
                                            </tr>
                                            <?php
                                            $temp++;
                                        };
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    $sql = "SELECT COUNT(id) FROM jpelajar WHERE id_sesi = '$id_sesi'";
                                    $rs_result = mysqli_query($conn,	$sql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];
                                    $total_pages = ceil($total_records / $limit);
                                    $pagLink = "<div class='pagination'>";
                                    for ($i=1; $i<=$total_pages; $i++) {
                                        $pagLink .= "<a href='urus-pelajar.php?id_sesi=".$id_sesi."&page=".$i."'>&nbsp;&nbsp;".$i."&nbsp;&nbsp;</a>";
                                    };
                                    echo $pagLink . "</div>";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div>

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
						<p class="pull-right">
							Hakcipta Terpelihara © 2016 |
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
	
	<!-- form validation -->
    <script src="js/validator/validator.js"></script>
    <script>
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });
    </script>

</body>

</html>