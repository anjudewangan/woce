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

	<!-- Title -->
	<title>Blog | World of Circular Economy</title>
	
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

<script type='text/javascript'>
function preview_image2(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image2');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

<script type='text/javascript'>
function preview_image3(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image3');
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
							$query="select * from blog where id='".$_REQUEST['id']."'";
							$row=mysqli_query($con,$query);
							$record=mysqli_fetch_array($row);
							
							if(file_exists('../'.$record['blog_image'])){
								$blog_image='../'.$record['blog_image'];
							}else{
								$blog_image='images/dummy.png';
							}
							
							if(file_exists('../'.$record['blog_image2'])){
								$blog_image2='../'.$record['blog_image2'];
							}else{
								$blog_image2='images/dummy.png';
							}
							
							if(file_exists('../'.$record['blog_image3'])){
								$blog_image3='../'.$record['blog_image3'];
							}else{
								$blog_image3='images/dummy.png';
							}
							
							
						?>
							<!-- Page Header -->
							<div class="page-header">
								<div><h2 class="main-content-title tx-24 mg-b-5">Edit Blog</h2></div>
								<div><a href="view-blog.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
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
													<div class="row">
														<div class="col-md-6 form-group">
															<label>Date <sup>*</sup></label>
															<input type="date" name="blog_date" value="<?= $record['blog_date']; ?>" class="form-control" required>
														</div>
														<div class="col-md-6 form-group">
															<label>Author <sup>*</sup></label>
															<input type="text" name="author" value="<?= $record['author']; ?>" class="form-control" required>
														</div>
														<div class="col-md-6 form-group">
															<label>Title <sup>*</sup></label>
															<input type="text" name="title" value="<?= $record['title']; ?>" class="form-control" required>
														</div>
														
														<div class="col-md-6 form-group">
															<label>Sub Title</label>
															<input type="text" name="sub_title" value="<?= $record['sub_title']; ?>" class="form-control" >
														</div>
														<div class="col-md-12 form-group">
															<label>Descrition</label>
															<textarea name="description" class="form-control ckeditor" rows="5"><?= $record['description']; ?></textarea>
														</div>
														
														<div class="col-md-12 form-group">
															<label>Title-2 <sup>*</sup></label>
															<input type="text" name="title2" value="<?= $record['title2']; ?>" class="form-control">
														</div>
														
														<div class="col-md-12 form-group">
															<label>Descrition-2</label>
															<textarea name="description2" class="form-control ckeditor" rows="5"><?= $record['description2']; ?></textarea>
														</div>
														<div class="col-md-12 form-group">
															<label>Title-3 <sup>*</sup></label>
															<input type="text" name="title3" value="<?= $record['title3']; ?>" class="form-control">
														</div>
														
														<div class="col-md-12 form-group">
															<label>Descrition-3</label>
															<textarea name="description3" class="form-control ckeditor" rows="5"><?= $record['description3']; ?></textarea>
														</div>
														
														<div class="col-md-4 form-group image-upload">
															<label>Blog Image-1</label>
															<label for="file">
																<img src="<?= $blog_image; ?>" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
															</label>
															<input id="file" type="file" name="blog_image" onchange="preview_image(event)" />
														</div>
														
														<div class="col-md-4 form-group image-upload">
															<label>Blog Image-2</label>
															<label for="file2">
																<img src="<?= $blog_image2; ?>" id="output_image2" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
															</label>
															<input id="file2" type="file" name="blog_image2" onchange="preview_image2(event)" />
														</div>
														
														<div class="col-md-4 form-group image-upload">
															<label>Blog Image-3</label>
															<label for="file3">
																<img src="<?= $blog_image3; ?>" id="output_image3" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
															</label>
															<input id="file3" type="file" name="blog_image3" onchange="preview_image3(event)" />
														</div>
														
														
														
													</div>
													
													<div class="row row-sm">
														<div class="col-md-12 form-group" style="text-align: right;">
															<input type="hidden" value="<?= $record['id']; ?>" name="id" class="form-control" >
															<button type="submit" name="update_blog" class="btn ripple btn-primary" style="width:137px">Update</button>
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
								<div><h2 class="main-content-title tx-24 mg-b-5">New Blog</h2></div>
								<div><a href="view-blog.php" class="btn btn-primary btn-icon-text"><i class="fe fe-chevrons-left"></i> Back</a></div>
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
																<div class="col-md-6 form-group">
																	<label>Date <sup>*</sup></label>
																	<input type="date" name="blog_date" class="form-control" required>
																</div>
																<div class="col-md-6 form-group">
																	<label>Author <sup>*</sup></label>
																	<input type="text" name="author" class="form-control" required>
																</div>
																<div class="col-md-6 form-group">
																	<label>Title <sup>*</sup></label>
																	<input type="text" name="title" class="form-control" required>
																</div>
																
																<div class="col-md-6 form-group">
																	<label>Sub Title</label>
																	<input type="text" name="sub_title" class="form-control" >
																</div>
																<div class="col-md-12 form-group">
																	<label>Descrition</label>
																	<textarea name="description" class="form-control ckeditor" rows="5"></textarea>
																</div>
																
																<div class="col-md-12 form-group">
																	<label>Title-2 <sup>*</sup></label>
																	<input type="text" name="title2" class="form-control">
																</div>
																
																<div class="col-md-12 form-group">
																	<label>Descrition-2</label>
																	<textarea name="description2" class="form-control ckeditor" rows="5"></textarea>
																</div>
																<div class="col-md-12 form-group">
																	<label>Title-3 <sup>*</sup></label>
																	<input type="text" name="title3" class="form-control">
																</div>
																
																<div class="col-md-12 form-group">
																	<label>Descrition-3</label>
																	<textarea name="description3" class="form-control ckeditor" rows="5"></textarea>
																</div>
																
																<div class="col-md-4 form-group image-upload">
																	<label>Blog Image-1</label>
																	<label for="file">
																		<img src="images/dummy.png" id="output_image" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
																	</label>
																	<input id="file" type="file" name="blog_image" onchange="preview_image(event)" required />
																</div>
																
																<div class="col-md-4 form-group image-upload">
																	<label>Blog Image-2</label>
																	<label for="file2">
																		<img src="images/dummy.png" id="output_image2" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
																	</label>
																	<input id="file2" type="file" name="blog_image2" onchange="preview_image2(event)" />
																</div>
																
																<div class="col-md-4 form-group image-upload">
																	<label>Blog Image-3</label>
																	<label for="file3">
																		<img src="images/dummy.png" id="output_image3" style="width: 100%; height: auto; cursor: pointer; object-fit: cover;">
																	</label>
																	<input id="file3" type="file" name="blog_image3" onchange="preview_image3(event)" />
																</div>
																
																
																
															</div>
														</div>
														
													</div>
													
													<div class="row row-sm">
														<div class="col-md-12 form-group" style="text-align: right;">
															<button type="submit" name="add_blog" class="btn ripple btn-primary" style="width:137px">Save</button>
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