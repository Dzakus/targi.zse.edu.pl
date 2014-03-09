<?php
	ob_start(); 
	require_once 'login.php'; 
	Login::_Logout();
	header("Location: ../../index.php");
?>