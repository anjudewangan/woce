<?php
session_start();
if(isset($_SESSION['royal_brothers_admin']))
{
	unset($_SESSION['royal_brothers_admin']);
	header("Location: ./");
}
else{
	header("Location: ./");
}
?>