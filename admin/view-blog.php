<?php
include "config.php";

if(empty($_SESSION['royal_brothers_admin'])){
	header("Location: ./");
}

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

        <!-- Title -->
		<title>Manage Blog | WOCE</title>

		<?php include "lib/header_link.php"; ?>

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
								<h2 class="main-content-title tx-24 mg-b-5">Manage Blog</h2>
								<?php
								if(isset($_SESSION['message1'])){
									echo $_SESSION['message1'];
									unset($_SESSION['message1']);
								}
								?>
							</div>
							<div><a href="blog.php" class="btn btn-primary btn-icon-text"><i class="fe fe-plus"></i> Add New Blog</a></div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12">
								<div class="card custom-card overflow-hidden">
									<div class="card-body">
										<!--div><a href="customer.php" class="btn btn-warning my-2 btn-icon-text" style="background-color: #eb6663;color: #fff;"><i class="fe fe-plus"></i> New Customer</a><br /></div-->
										
										<div class="table-responsive">
											<table class="table table-striped table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th>#</th>
														<th>Image</th>
														<th>Date</th>
														<th>Author</th>
														<th>Title</th>
														<th>Sub Title</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i=1;
													$query="select * from blog order by id desc";
													$row=mysqli_query($con,$query);
													while($record=mysqli_fetch_array($row)){
													?>
														<tr>
															<td><?= $i; ?></td>
															<td><img src="<?= '../'.$record['blog_image']; ?>" style="width:100px;"></td>
															<td><?= date("d M, Y",strtotime($record['blog_date'])); ?></td>
															<td><?= $record['author']; ?></td>
															<td><?= $record['title']; ?></td>
															<td><?= $record['sub_title']; ?></td>
															<td><?= $record['description']; ?></td>
															<td>
																<div class="btn-icon-list">
																	<a href="blog.php?id=<?= $record['id']; ?>" class="btn ripple btn-primary btn-icon"><i class="fa fa-edit"></i></a>
																	<a href="query.php?id=<?= $record['id']; ?>&action=del_blog" class="btn ripple btn-danger btn-icon" onclick="return deleteconfig()"><i class="fa fa-trash"></i></a>
																</div>
															</td>
														</tr>
													<?php
													$i++;
													}
													?>
													
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div>
			</div>
			<!-- End Main Content-->

			<?php include "lib/footer.php"; ?>
		
		</div>
        <!-- End Page -->
		
        <!-- Back-to-top -->
		
		<?php include "lib/footer_link.php"; ?>

<script>
	function deleteconfig()
	{
		var del=confirm("Are you sure you want to delete this record?");
		if (del==true)
			{}
		else
			{}
		return del;
	}
</script>
 
	</body>
</html>