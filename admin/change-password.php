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
		<title>Change Password | Royal Brothers</title>
		
		<?php include "lib/header_link.php"; ?>
		
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
						<!-- Page Header -->
							<div class="page-header">
								<div><h2 class="main-content-title tx-24 mg-b-5">Change Password</h2></div>
							</div>
							<!-- End Page Header -->

							<!-- Row -->
							<div class="row row-sm">
								<div class="col-md-12">
									<div class="card custom-card">
										<div class="card-body">
											<p style="color:#009900;" id="success_message"></p>
											
											
												<div class="">
													<div class="row row-sm">
														<div class="col-md-4 form-group">
															<form id="change_password_form">
																<label>Old Password <sup>*</sup></label>
																<input type="password" name="old_password" class="form-control" required>
																<input type="hidden" name="update_password" value="update_password" required>
																<p style="color:#ff0000;" id="error_message"></p>
																<label>New Password <sup>*</sup></label>
																<input type="password" name="new_password" class="form-control" required><br />
																
																<label>Confirm Password <sup>*</sup></label>
																<input type="password" name="confirm_password" class="form-control" required>
																<p style="color:#ff0000;" id="error_message1"></p>
																<button type="submit" id="change_password_button" class="btn ripple btn-primary pull-right" style="width:137px">Update</button>
															</form>
														</div>
													</div>
													
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

			<?php include "lib/footer.php";  ?>
		
		</div>
        <!-- End Page -->
		
        <?php include "lib/footer_link1.php";  ?>

<script>
$(document).ready(function(){
	$('#change_password_form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url:'query.php',
			type:'POST',
			data:$('#change_password_form').serialize(),
			beforeSend:function(){  
				$('#change_password_button').val("Updating...");  
			},
			success:function(data){
				if (data == "success"){
                    $('#success_message').html('Password has been Updated Successfully.').css('color', 'green');
					$('#error_message').html('');
					$('#error_message1').html('');
					$('#change_password_form')[0].reset();
                }else if(data=='error'){
					$('#error_message1').html('Password not matching...').css('color', 'red');
					$('#error_message').html('');
				}
               else{
                   $('#error_message').html(data).css('color', 'red');
				   $('#error_message1').html('');
               }
				$('#change_password_button').val("Update");
				
			}
		});
	});
});
</script>

	</body>
</html>