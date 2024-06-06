<?php
include "config.php";
if(empty($_SESSION['royal_brothers_admin'])){
	header("Location: ./");
}

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

        <!-- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>

		<!-- Title -->
		<title>Dashboard</title>

		<!-- Bootstrap css-->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

		<!-- Style css-->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/skins.css" rel="stylesheet">
		<link href="assets/css/dark-style.css" rel="stylesheet">
		<link href="assets/css/colors/default.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">

		<!-- Select2 css-->
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">
		
				<!-- Mutipleselect css-->
		<link rel="stylesheet" href="assets/plugins/multipleselect/multiple-select.css">
		
		<!-- Sidemenu css-->
		<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">

		<!-- Switcher css-->
		<link href="assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="assets/switcher/demo.css" rel="stylesheet">   

	</head>

	<body class="main-body leftmenu">

		<!-- Switcher -->
		
		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
        <!-- End Loader -->
        
		<!-- Page -->
		<div class="page">

			<?php include "lib/sidebar.php"; ?> 
			
			<?php include "lib/header.php"; ?>
			
			<?php include "lib/mobile_header.php"; ?>
			<!-- Mobile-header closed -->
			<!-- Main Content-->
			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">

		
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">World of Circular Economy</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!--Row-->
						<div class="row row-sm">
							<div class="col-sm-12 col-lg-12 col-xl-12">

								
								<!--Row-->
								<div class="row row-sm text">
								
									<div class="col-xl-12">
										<div class="card custom-card">
											<div class="card-body">
												<div class="card-item">
													<div class="card-item-title mb-2 text-center">
														<label class="main-content-label tx-16 font-weight-bold mb-1">Welcome to WORLD OF CIRCULAR ECONOMY Admin</label>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									
									
									
								</div>
								<!--End row-->

								<!--row-->
								
							</div><!-- col end -->
							
						</div><!-- Row end -->

					</div>
				</div>
			</div>
			<!-- End Main Content-->

		<!-- Main Footer-->
			<?php include "lib/footer.php";  ?>
			<!--End Footer-->				<!-- Sidebar -->
			
			<!-- End Sidebar -->		
		</div>
        <!-- End Page -->
		
         <?php include "lib/footer_link1.php";  ?>
	</body>


</html>