<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link   href="../css/bootstrapValidator.css" rel="stylesheet">
    
    
</head>
 <body>
    <div class="container">
     
	    <div class="span10 offset1">
	        <div class="row">
	            <h3>Dodaj admina</h3>
	        </div>
	 
	        <form class="form-horizontal" action="admin.php" method="post">

				<div class="form-group">
	                <label class="control-label">E-mail</label>
	                <input style="width: 50%;" class="form-control" name="mail" type="text"  placeholder="E-Mail">
	          	</div>

	            <div class="form-group">
	                <label class="control-label">Hasło</label>
	                <input style="width: 50%;" class="form-control" name="pass" type="password"  placeholder="Hasło">
	          	</div>
	          	<button type="submit" disabled="disabled" class="btn btn-success">Create</button>
	          	<a class="btn" href="index.php">Back</a>
	        </form>
	    </div>
                 
    </div> <!-- /container -->
  </body>
  <script src="../js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/bootstrapValidator.js"></script>
  <script type="text/javascript">
  	$(document).ready(function() {
    $('.form-horizontal').bootstrapValidator({
        message: "Coś poszło nie tak",
        submitButtons: $('button.btn.btn-success'),
        submitHandler: function(validator, form) {
        	form.submit();
        },
        live: 'enabled',
        fields: {
            pass: {
                message: "Kiepska adres",
                validators: {
                    stringLength: {
                    	message:"Za krótkie hasło, min to 6 znaków",
                    	min:6
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            mail: {
                message: "Kiepski mail",
                validators: {
                    emailAddress: {
                    	message: "Nieprawidłowy adres e-mail, jeśli jesteś pewien, że jest prawidłowy skontaktuj się z administratorem"
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }
        }
    });
});
  </script>
</html>

<?php
require_once "../php/dbConn.php";
require_once 'login/login.php'; 
if (!Login::CheckLogged() || !isset($_GET["m"])) {
  header("Location: login/index.php?req=".$_SERVER["SCRIPT_NAME"]);
}else{
    $mail = $_GET["m"];
    $sa = $pdo->query('SELECT sa FROM admins WHERE SHA1(mail) = "'.$mail.'"')->fetch()["sa"];
    if ($sa==0) {
        header("Location: login/index.php?req=".$_SERVER["SCRIPT_NAME"]);
    }
}

if(isset($_POST['mail']) && isset($_POST['pass'])) {
	
	$mail=strip_tags(htmlspecialchars(mysql_real_escape_string($_POST['mail'])));
	$pass=strip_tags(htmlspecialchars(mysql_real_escape_string($_POST['pass'])));
	$sql = "INSERT INTO admins (mail, pass) values(?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($mail,sha1($pass)));
    header("Location: index.php");
    
}