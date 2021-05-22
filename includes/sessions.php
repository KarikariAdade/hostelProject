<?php
session_start();
if (isset($_SESSION['user_id']) || isset($_SESSION['user_email'])) {
	$user_email = $_SESSION['user_email'];
	$user_id = $_SESSION['user_id'];
}
if (isset($_SESSION['admin_id']) || isset($_SESSION['admin_email'])) {
	$admin_email = $_SESSION['admin_email'];
	$admin_id = $_SESSION['id'];
}
?>