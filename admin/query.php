<?php
include "config.php";

$today=date("Y-m-d");

if(isset($_POST['login'])){
	$user		=	mysqli_real_escape_string($con,$_POST['user']);
	$password	=	mysqli_real_escape_string($con,$_POST['password']);
	
	$query="select * from login where user='$user' and password='$password'";
	$row=mysqli_query($con,$query);
	if(mysqli_num_rows($row) > 0){
		echo "Success";
		$_SESSION['royal_brothers_admin']=$user;
	}else{
		echo "Invalid User or Password...";
	}
}

if(isset($_POST['forgot_password'])){
	$email		=	mysqli_real_escape_string($con,$_POST['email']);
	
	$query="select * from login where email='$email'";
	$row=mysqli_query($con,$query);
	if(mysqli_num_rows($row) > 0){
		$record=mysqli_fetch_array($row);
		
		$email1 = "ittechsoftwaresolutions@hotmail.com";
		$to	=	$email;
		$subject = "Password Recover";
		$from='Royal Brothers';
		
		$message ="<html>
				<head>
					<style>
						.coloumn1{
							max-width:100%;
							min-height:1px;
							float:left;
							width:25%;
						}
						.coloumn2{
							max-width:100%;
							min-height:1px;
							float:left;
							width:50%;
							background-color:#fff;
							padding:50px 15px 20px;
							text-align: center;
							font-family: Gotham,Arial;
							border: 1px solid #eee;
							box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.1), 0 2px 5px 0 rgba(0, 0, 0, 0.19)
						}
						@media only screen and (max-width: 900px) and  (min-width: 200px){
							.coloumn1{
								width:5%;
							}
							.coloumn2{
								width:90%;
							}
						}
					</style>
				</head>
				<body>
					<div class='coloumn1'></div>
					<div class='coloumn2'>
						<h1 style='text-transform: uppercase;'>YOUR PASSWORD HAS BEEN RECOVERED SUCCESSFULLY!</h1><br/><br/><br/>
						<h2>PLEASE USE PASSWORD GIVEN BELOW TO LOGIN YOUR ACCOUNT.</h2><br/>
						<h3>PASSWORD = ".$record['password']."</h3>
						
						
						<br /><br /><br />
						<h2>THANKS & REGARDS,</h2><br /><br />
					</div>
					<div class='coloumn1'></div>
				</body>
			</html>";
			
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.$from."\r\n".'Reply-To: '.$email1."\r\n" .'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);
		
		echo "Success";
	}else{
		echo "Invalid Email Address...";
	}
}
	
if(isset($_REQUEST['add_media'])){
	$category		=	mysqli_real_escape_string($con,$_POST['category']);
	$release_date	=	mysqli_real_escape_string($con,$_POST['release_date']);
	$title			=	mysqli_real_escape_string($con,$_POST['title']);
	$author			=	mysqli_real_escape_string($con,$_POST['author']);
	$media_url		=	mysqli_real_escape_string($con,$_POST['media_url']);
	$description	=	mysqli_real_escape_string($con,$_POST['description']);
	
	$query="insert into media (category,release_date,title,author,media_url,description) values ('$category','$release_date','$title','$author','$media_url','$description')";
	if($row=mysqli_query($con,$query)){
		$id=mysqli_insert_id($con);
		
		if($_FILES["media_image"]["name"] != '')
		{
			$test = explode('.', $_FILES["media_image"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/media/' . $name;  
			$location1 = 'assets/img/media/' . $name;  
			if(move_uploaded_file($_FILES["media_image"]["tmp_name"], $location))
			{
				$query="update media set media_image='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		
		if($_FILES["media_document"]["name"] != '')
		{
			$test = explode('.', $_FILES["media_document"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/media/' . $name;  
			$location1 = 'assets/img/media/' . $name;  
			if(move_uploaded_file($_FILES["media_document"]["tmp_name"], $location))
			{
				$query="update media set media_document='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		$_SESSION['message']="Media Added Successfully...";
		header("Location: media.php");
	}
	else{
		echo "Something went wrong...";
	}
}

if(isset($_REQUEST['update_media'])){
	$id				=	mysqli_real_escape_string($con,$_POST['id']);
	$category		=	mysqli_real_escape_string($con,$_POST['category']);
	$release_date	=	mysqli_real_escape_string($con,$_POST['release_date']);
	$title			=	mysqli_real_escape_string($con,$_POST['title']);
	$author			=	mysqli_real_escape_string($con,$_POST['author']);
	$media_url		=	mysqli_real_escape_string($con,$_POST['media_url']);
	$description	=	mysqli_real_escape_string($con,$_POST['description']);
	
	$query="update media set category='$category', release_date='$release_date', title='$title', author='$author', media_url='$media_url', description='$description' where id='$id'";
	if($row=mysqli_query($con,$query)){
		if($_FILES["media_image"]["name"] != '')
		{
			$test = explode('.', $_FILES["media_image"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/media/' . $name;  
			$location1 = 'assets/img/media/' . $name;  
			if(move_uploaded_file($_FILES["media_image"]["tmp_name"], $location))
			{
				$query="update media set media_image='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		
		if($_FILES["media_document"]["name"] != '')
		{
			$test = explode('.', $_FILES["media_document"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/media/' . $name;  
			$location1 = 'assets/img/media/' . $name;  
			if(move_uploaded_file($_FILES["media_document"]["tmp_name"], $location))
			{
				$query="update media set media_document='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		$_SESSION['message']="Media Updated Successfully...";
		header("Location: media.php?id=$id");
	}
	else{
		echo "Something went wrong...";
	}
}


if(isset($_REQUEST['add_blog'])){
	$blog_date		=	mysqli_real_escape_string($con,$_POST['blog_date']);
	$author			=	mysqli_real_escape_string($con,$_POST['author']);
	$title			=	mysqli_real_escape_string($con,$_POST['title']);
	$sub_title		=	mysqli_real_escape_string($con,$_POST['sub_title']);
	$description	=	mysqli_real_escape_string($con,$_POST['description']);
	$title2			=	mysqli_real_escape_string($con,$_POST['title2']);
	$description2	=	mysqli_real_escape_string($con,$_POST['description2']);
	$title3			=	mysqli_real_escape_string($con,$_POST['title3']);
	$description3	=	mysqli_real_escape_string($con,$_POST['description3']);
	
	$query="insert into blog (blog_date,author,title,sub_title,description,title2,description2,title3,description3) values ('$blog_date','$author','$title','$sub_title','$description','$title2','$description2','$title3','$description3')";
	if($row=mysqli_query($con,$query)){
		$id=mysqli_insert_id($con);
		
		if($_FILES["blog_image"]["name"] != '')
		{
			$test = explode('.', $_FILES["blog_image"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/blog/' . $name;  
			$location1 = 'assets/img/blog/' . $name;  
			if(move_uploaded_file($_FILES["blog_image"]["tmp_name"], $location))
			{
				$query="update blog set blog_image='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		
		if($_FILES["blog_image2"]["name"] != '')
		{
			$test = explode('.', $_FILES["blog_image2"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/blog/' . $name;  
			$location1 = 'assets/img/blog/' . $name;  
			if(move_uploaded_file($_FILES["blog_image2"]["tmp_name"], $location))
			{
				$query="update blog set blog_image2='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		if($_FILES["blog_image3"]["name"] != '')
		{
			$test = explode('.', $_FILES["blog_image3"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/blog/' . $name;  
			$location1 = 'assets/img/blog/' . $name;  
			if(move_uploaded_file($_FILES["blog_image3"]["tmp_name"], $location))
			{
				$query="update blog set blog_image3='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		
		
		$_SESSION['message']="Blog Added Successfully...";
		header("Location: blog.php");
	}
	else{
		echo "Something went wrong...";
	}
}




if(isset($_REQUEST['update_blog'])){
	$id				=	mysqli_real_escape_string($con,$_POST['id']);
	$blog_date		=	mysqli_real_escape_string($con,$_POST['blog_date']);
	$author			=	mysqli_real_escape_string($con,$_POST['author']);
	$title			=	mysqli_real_escape_string($con,$_POST['title']);
	$sub_title		=	mysqli_real_escape_string($con,$_POST['sub_title']);
	$description	=	mysqli_real_escape_string($con,$_POST['description']);
	$title2			=	mysqli_real_escape_string($con,$_POST['title2']);
	$description2	=	mysqli_real_escape_string($con,$_POST['description2']);
	$title3			=	mysqli_real_escape_string($con,$_POST['title3']);
	$description3	=	mysqli_real_escape_string($con,$_POST['description3']);
	
	$query="update blog set blog_date='$blog_date', author='$author', title='$title', sub_title='$sub_title', description='$description', title2='$title2', description2='$description2', title3='$title3', description3='$description3' where id='$id'";
	if($row=mysqli_query($con,$query)){
		//$id=mysqli_insert_id($con);
		
		if($_FILES["blog_image"]["name"] != '')
		{
			$test = explode('.', $_FILES["blog_image"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/blog/' . $name;  
			$location1 = 'assets/img/blog/' . $name;  
			if(move_uploaded_file($_FILES["blog_image"]["tmp_name"], $location))
			{
				$query="update blog set blog_image='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		
		if($_FILES["blog_image2"]["name"] != '')
		{
			$test = explode('.', $_FILES["blog_image2"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/blog/' . $name;  
			$location1 = 'assets/img/blog/' . $name;  
			if(move_uploaded_file($_FILES["blog_image2"]["tmp_name"], $location))
			{
				$query="update blog set blog_image2='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		if($_FILES["blog_image3"]["name"] != '')
		{
			$test = explode('.', $_FILES["blog_image3"]["name"]);
			$ext = end($test);
			$name = rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/blog/' . $name;  
			$location1 = 'assets/img/blog/' . $name;  
			if(move_uploaded_file($_FILES["blog_image3"]["tmp_name"], $location))
			{
				$query="update blog set blog_image3='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		
		$_SESSION['message']="Blog Updated Successfully...";
		header("Location: blog.php?id=$id");
	}
	else{
		echo "Something went wrong...";
	}
}


if(isset($_REQUEST['action'])){
	if($_REQUEST['action']=='del_blog'){
		$id		=	mysqli_real_escape_string($con,$_REQUEST['id']);
		
		$query="delete from blog where id='".$_REQUEST['id']."'";
		if(mysqli_query($con,$query)){
			$_SESSION['message1']='<span style="color:#ff0000;">Blog Deleted Successfully!</span>';
		}else{
			$_SESSION['message1']='<span style="color:#ff0000;">Something Went Wrong!</span>';
		}
		header("Location: view-blog.php");
	}
}
	

if(isset($_REQUEST['action'])){
	if($_REQUEST['action']=='del_media'){
		$id		=	mysqli_real_escape_string($con,$_REQUEST['id']);
		
		$query="delete from media where id='".$_REQUEST['id']."'";
		if(mysqli_query($con,$query)){
			$_SESSION['message1']='<span style="color:#ff0000;">Media Deleted Successfully!</span>';
		}else{
			$_SESSION['message1']='<span style="color:#ff0000;">Something Went Wrong!</span>';
		}
		header("Location: view-media.php");
	}
}
	



if(isset($_REQUEST['add_media1'])){
	$release_date	=	mysqli_real_escape_string($con,$_POST['release_date']);
	$title			=	mysqli_real_escape_string($con,$_POST['title']);
	
	$query="insert into press_release (release_date,title) values ('$release_date','$title')";
	if($row=mysqli_query($con,$query)){
		$id=mysqli_insert_id($con);
		
		if($_FILES["media_document"]["name"] != '')
		{
			$test = explode('.', $_FILES["media_document"]["name"]);
			$ext = end($test);
			$name = 'doc-'.rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/media/' . $name;  
			$location1 = 'assets/img/media/' . $name;  
			if(move_uploaded_file($_FILES["media_document"]["tmp_name"], $location))
			{
				$query="update press_release set media_document='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		$_SESSION['message']="Press Release Added Successfully...";
		header("Location: press-release-form.php");
	}
	else{
		echo "Something went wrong...";
	}
}

if(isset($_REQUEST['update_media1'])){
	$id				=	mysqli_real_escape_string($con,$_POST['id']);
	$release_date	=	mysqli_real_escape_string($con,$_POST['release_date']);
	$title			=	mysqli_real_escape_string($con,$_POST['title']);
	
	$query="update press_release set release_date='$release_date', title='$title' where id='$id'";
	if($row=mysqli_query($con,$query)){
		
		if($_FILES["media_document"]["name"] != '')
		{
			$test = explode('.', $_FILES["media_document"]["name"]);
			$ext = end($test);
			$name = 'doc-'.rand(10000, 99999) . '.' . $ext;
			$location = '../assets/img/media/' . $name;  
			$location1 = 'assets/img/media/' . $name;  
			if(move_uploaded_file($_FILES["media_document"]["tmp_name"], $location))
			{
				$query="update press_release set media_document='$location1' where id='$id'";
				mysqli_query($con,$query);
			}
		}
		$_SESSION['message']="Press Release Updated Successfully...";
		header("Location: press-release-form.php?id=$id");
	}
	else{
		echo "Something went wrong...";
	}
}

if(isset($_REQUEST['action'])){
	if($_REQUEST['action']=='del_media1'){
		$id		=	mysqli_real_escape_string($con,$_REQUEST['id']);
		
		$query="delete from press_release where id='".$_REQUEST['id']."'";
		if(mysqli_query($con,$query)){
			$_SESSION['message1']='<span style="color:#ff0000;">Press Release Deleted Successfully!</span>';
		}else{
			$_SESSION['message1']='<span style="color:#ff0000;">Something Went Wrong!</span>';
		}
		header("Location: view-issued-by-woce.php");
	}
}


if(isset($_REQUEST['action'])){
	if($_REQUEST['action']=='del_contact'){
		$id		=	mysqli_real_escape_string($con,$_REQUEST['id']);
		
		$query="delete from contact where id='".$_REQUEST['id']."'";
		if(mysqli_query($con,$query)){
			$_SESSION['message1']='<span style="color:#ff0000;">Data Deleted Successfully!</span>';
		}else{
			$_SESSION['message1']='<span style="color:#ff0000;">Something Went Wrong!</span>';
		}
		header("Location: view-contact.php");
	}
}


if(isset($_REQUEST['action'])){
	if($_REQUEST['action']=='del_schedule_demo'){
		$id		=	mysqli_real_escape_string($con,$_REQUEST['id']);
		
		$query="delete from schedule_demo where id='".$_REQUEST['id']."'";
		if(mysqli_query($con,$query)){
			$_SESSION['message1']='<span style="color:#ff0000;">Data Deleted Successfully!</span>';
		}else{
			$_SESSION['message1']='<span style="color:#ff0000;">Something Went Wrong!</span>';
		}
		header("Location: view-schedule.php");
	}
}







?>