<?php


use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
include_once("../includes/connection_inner.php");

$name		= $_POST['name'];
$email		= $_POST['email'];
$phone		= $_POST['phone'];
$message	= $_POST['message'];
$country	= $_POST['country'];
$reason		= $_POST['reason'];
$emailformat = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$txtEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);


if (empty($name)) {

	echo json_encode(array("class_name" => 'name', "error" => "Please enter name"));
	exit;
}   elseif (empty($email)) {

	echo json_encode(array("class_name" => 'email', "error" => "Please enter email id"));
	exit;	
}	elseif (!preg_match($emailformat, $txtEmail) && !empty($txtEmail)) {

	echo json_encode(array("class_name" => 'email', "error" => "Please enter valid email id"));
	exit;
}   elseif (empty($phone)) {

	echo json_encode(array("class_name" => 'phone', "error" => "Please enter phone number"));
	exit;

} elseif ((strlen($phone) < 10 || strlen($phone) > 10) && !empty($phone)) {

	echo json_encode(array("class_name" => 'phone', "error" => "Phone number must be equal to 10 digit"));
	exit;
} elseif (empty($country)) {

	echo json_encode(array("class_name" => 'country', "error" => "Please select country"));
	exit;
} elseif (empty($reason)) {

	echo json_encode(array("class_name" => 'reason', "error" => "Please enter reason"));
	exit;	
} elseif (empty($message)) {

	echo json_encode(array("class_name" => 'message', "error" => "Please write your message"));
	exit;
} else {

	$Q_obj->ContactSubmit($_POST);
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SetLanguage('en');
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.googlemail.com';
	$mail->Username = 'woce4u@gmail.com';
	$mail->Password = 'bhhxczmxbiqfzauv';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->SMTPKeepAlive = true;
	$mail->setFrom('woce4u@gmail.com', 'WOCE Team');
	$mail->Subject = 'Thankyou for Connecting with WOCE';
	$mail->CharSet = 'utf-8';

	$mail->addAddress($email, '');

	$content = file_get_contents(dirname(__FILE__) . '/message.html');
	$content = str_replace('%name%', $name, $content);

	$mail->msgHTML($content, __DIR__);

	if (!$mail->Send()) {
		echo json_encode(array("class_name" => 'success-message', "error" => 'Error while sending Email.: ' . $mail->ErrorInfo));
	} else {
		echo json_encode(array("class_name" => 'success-message', "msg" => 'Awesome start! Your green commitment is noted. Expect a response from us soon.!'));
	}
	$mail->clearAddresses();
	$mail->smtpClose();

	exit;
}
