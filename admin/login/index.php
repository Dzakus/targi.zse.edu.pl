<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
    body {
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #eee;
	}

	.form-signin {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.form-signin .form-signin-heading,
	.form-signin .checkbox {
	  margin-bottom: 10px;
	}
	.form-signin .checkbox {
	  font-weight: normal;
	}
	.form-signin .form-control {
	  position: relative;
	  height: auto;
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
</style>
</head>


<div class="container">
	<form method="post" class="form-signin" role="form" action=<?php echo '"index.php?req='.$_GET["req"].'"' ?> >
	    <h2 class="form-signin-heading">Zaloguj się</h2>
	    <input name="mail" type="email" class="form-control" placeholder="Email address" required autofocus>
	    <input name = "pass" type="password" class="form-control" placeholder="Haseło" required>
	    <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
	</form>

</div> <!-- /container -->

<?php 
require_once 'login.php'; 
if (isset($_POST["mail"]) && isset($_POST["pass"])) {
	if(Login::CheckExistance($_POST["mail"], $_POST["pass"])){
		Login::_Login();
		header("Location: ".$_GET["req"]."?m=".sha1($_POST["mail"]));
	}
}

?>