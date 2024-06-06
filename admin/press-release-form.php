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
	<meta name="keywords" content="">

	<!-- Title -->
	<title>Press Release | World of Circular Economy</title>
	
	<?php include "lib/header_link.php"; ?>
	<script src="ckeditor/ckeditor.js"></script>
<style>
.image-upload>input {
  display: none;
}
</style>

<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>		
	</head>

	<body class="main-body leftmenu">

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
						<?php
						if(isset($_REQUEST['id'])){
							$query="select * from press_release where id='".$_REQUEST['id']."'";
							$row=mysqli_query($con,$query);
							$record=mysqli_fetch_array($row);
						?>
							<!-- Page Header -->
							<div class="page-header">
								<div><h2 class="main-content-title tx-24 mg-b-5">Edit Press Release</h2></div>
								<div><a href="view-press-release.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
							</div>
							<!-- End Page Header -->

							<!-- Row -->
							<div class="row row-sm">
								<div class="col-md-12">
									<div class="card custom-card">
										<div class="card-body">
											<?php
											if(isset($_SESSION['message'])){
											?>
												<p style="color:#009900;"><?= $_SESSION['message']; ?></p>
											<?php
												unset($_SESSION['message']);
											}
											?>
											
											<form action="query.php" method="POST" enctype="multipart/form-data">
												<div class="">
													<div class="row row-sm">
														
														<div class="col-md-12 form-group">
															<div class="row">
															<div class="col-md-12 form-group">
																	<label>Headline <sup>*</sup></label>
																	<input type="text" value="<?= $record['title']; ?>" name="title" class="form-control" required>
																</div>
																<div class="col-md-6 form-group">
																	<label>Release Date <sup>*</sup></label>
																	<input type="date" value="<?= $record['release_date']; ?>" name="release_date" class="form-control" required>
																</div>
																																
																<div class="col-md-6 form-group">
																	<label>Document</label><br />
																	<input type="file" name="media_document" />
																</div>
																
															</div>
														</div>
														
													</div>
													
													<div class="row row-sm">
														<div class="col-md-12 form-group" style="text-align: right;">
															<input type="hidden" value="<?= $record['id']; ?>" name="id">
															<button type="submit" name="update_media1" class="btn ripple btn-primary" style="width:137px">Update</button>
														</div>
													</div>
													
													
												
												</div>
											</form>
										</div>
									</div>
								</div>
								
							</div>
							<!-- End Row -->
						<?php
						}else{
						?>
							<!-- Page Header -->
							<div class="page-header">
								<div><h2 class="main-content-title tx-24 mg-b-5">New Press Release</h2></div>
								<div><a href="view-press-release.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
							</div>
							<!-- End Page Header -->

							<!-- Row -->
							<div class="row row-sm">
								<div class="col-md-12">
									<div class="card custom-card">
										<div class="card-body">
											<?php
											if(isset($_SESSION['message'])){
											?>
												<p style="color:#009900;"><?= $_SESSION['message']; ?></p>
											<?php
												unset($_SESSION['message']);
											}
											?>
											
											<form action="query.php" method="POST" enctype="multipart/form-data">
												<div class="">
													<div class="row row-sm">														
														<div class="col-md-9 form-group">
															<div class="row">
															<div class="col-md-12 form-group">
																	<label>Headline <sup>*</sup></label>
																	<input type="text" name="title" class="form-control" required>
																</div>
																<div class="col-md-6 form-group">
																	<label>Release Date <sup>*</sup></label>
																	<input type="date" name="release_date" class="form-control" required>
																</div>
																																
																<div class="col-md-6 form-group">
																	<label>Document</label><br />
																	<input type="file" name="media_document" />
																</div>
																
															</div>
														</div>
														
													</div>
													
													<div class="row row-sm">
														<div class="col-md-12 form-group" style="text-align: right;">
														<input type="hidden" value="" name="id">
															<button type="submit" name="add_media1" class="btn ripple btn-primary" style="width:137px">Save</button>
														</div>
													</div>
													
												</div>
											</form>
										</div>
									</div>
								</div>
								
							</div>
							<!-- End Row -->
						<?php
						}
						?>

					</div>
				</div>
			</div>
			<!-- End Main Content-->

			<?php include "lib/footer.php";  ?>
		
		</div>
        <!-- End Page -->
		
        <?php include "lib/footer_link1.php";  ?>
	

	</body>
</html>