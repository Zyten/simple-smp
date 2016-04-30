<?php
	include("db/dbc.php");
	session_start();
	//If your session isn't valid, it returns you to the login screen for protection
	if(empty($_SESSION['id_pentadbir_smp'])){
	 header("location:access-denied.php");
	}
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
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="nav-md">

    <div class="container body">
        <div class="main_container">
		
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
				
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"> <span>UTHM</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu title -->
                    <div class="profile">
						<span>&nbsp;&nbsp;&nbsp;SISTEM MAKLUMAT PELAJAR</span>
                    </div>
                    <!-- /menu title -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
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
                            <h3>Urus Pentadbir</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="clearfix"></div>
						<!-- Form kemaskini pentadbir - update pwd only - rest readonly -->
						<div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Kemaskini Maklumat</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <br />
                                    <form class="form-horizontal form-label-left input_mask" method="POST" action="editpentadbir.php">
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">ID Staf</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
												<input name="id" type="hidden" class="form-control" value="<?php echo $_SESSION['id_pentadbir_smp']?>">
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['no_staf_smp']?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Penuh</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['nama_penuh_smp']?>" readonly="readonly">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">No. K/P</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['no_kp_smp']?>" readonly="readonly" placeholder="931210085704">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kata Laluan Baru</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input required type="password" id="newpwd" name="newpwd" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kata Laluan Baru (Sekali lagi)</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input required type="password" id="cnewpwd" name="cnewpwd" class="form-control" value="">
                                            </div>
                                        </div>
										<!-- Display errors in update_errors stack if any and unset once done -->
										<?php if (isset($_SESSION['update_errors'])): ?>
										<div class="form-errors">
											<?php foreach($_SESSION['update_errors'] as $error): ?>
												<p><?php echo $error ?></p>
											<?php endforeach; ?>
										</div>
										<?php unset($_SESSION['update_errors']); endif;?>
										
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-4">
                                                <input type="submit" value="Simpan" name="kemaskini" class="pull-right btn btn-success" onclick="validateNewPassword()" />
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
						<!-- Form tambah pentadbir -->
						<div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Pentadbir</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left input_mask" method="POST" action="tambahpentadbir.php">
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">ID Staf</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input type="text" name="no_staf" class="form-control" required placeholder="" maxlength="5" pattern="(?=.*\d).{5}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Penuh</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input required type="text" name="nama_penuh" class="form-control" placeholder="">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">No. K/P</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input required type="text" pattern="\d*" maxlength="12" placeholder="cth. 951216085565" name="no_kp" class="form-control" placeholder="">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kata Laluan </label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input required type="password" id="pwd" name="pwd" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kata Laluan (Sekali lagi)</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <input required type="password" id="cpwd" name="cpwd" class="form-control" value="">
                                            </div>
                                        </div>
										<!-- Display errors in addnew_errors stack if any and unset once done -->
										<?php if (isset($_SESSION['addnew_errors'])): ?>
										<div class="form-errors">
											<?php foreach($_SESSION['addnew_errors'] as $error): ?>
												<p><?php echo $error ?></p>
											<?php endforeach; ?>
										</div>
										<?php unset($_SESSION['addnew_errors']); endif;?>
										
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-4">
                                                <input type="submit" value="Tambah" name="tambah" class="pull-right btn btn-success" onclick="validatePassword(this.form, '')" />
                                            </div>
                                        </div>
                                    </form>
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

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>
	<!-- JS validate password n confirm password for Kemaskini -->
	<script>
		var password = document.getElementById("pwd"), confirm_password = document.getElementById("cpwd");
		function validatePassword(){
		  if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Kata Laluan tidak sama");
		  } else {
			confirm_password.setCustomValidity('');
		  }
		}
		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>
	<!-- JS validate password n confirm password for Tambah -->
	<script>
		var password = document.getElementById("newpwd"), confirm_password = document.getElementById("cnewpwd");
		function validateNewPassword(){
		  if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Kata Laluan tidak sama");
		  } else {
			confirm_password.setCustomValidity('');
		  }
		}
		password.onchange = validateNewPassword;
		confirm_password.onkeyup = validateNewPassword;
	</script>
</body>

</html>