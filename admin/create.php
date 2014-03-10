<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link   href="../css/bootstrapValidator.css" rel="stylesheet">
    
    
</head>
<?php 
require_once 'login/login.php'; 
if (!Login::CheckLogged() || !isset($_GET["m"])) {
  header("Location: login/index.php?req=".$_SERVER["SCRIPT_NAME"]);
}else{
	require("../php/dbConn.php");
	$m = $_GET["m"];
	$sa = $pdo->query('SELECT sa FROM admins WHERE SHA1(mail) = "'.$m.'"')->fetch()["sa"];
	if ($sa==0) {
	    header("Location: login/index.php?req=".$_SERVER["SCRIPT_NAME"]);
	}
}
?>
 <body>
    <div class="container">
     
	    <div class="span10 offset1">
	        <div class="row">
	            <h3>Stwórz szkołę</h3>
	        </div>
	 
	        <form class="form-horizontal" action=<?php echo "create.php?m=".$m; ?> method="post" enctype="multipart/form-data">

					<div class="form-group">
	                <label class="control-label">Nazwa</label>
	                <input style="width: 50%;" class="form-control" name="nazwa" type="text"  placeholder="Nazwa">
	          	</div>

	            <div class="form-group">
	                <label class="control-label">Adres</label>
	                <input style="width: 50%;" class="form-control" name="adres" type="text"  placeholder="Adres">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Telefon</label>
	                <input style="width: 50%;" class="form-control" name="telefon" type="text"  placeholder="Telefon">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Adres E-mail</label>
	                <input style="width: 50%;" class="form-control" name="mail" type="text"  placeholder="E-mail">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Strona internetowa</label>
	                <input style="width: 50%;" class="form-control" name="strona" type="text"  placeholder="Strona">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Plik html</label>
	                <input style="width: 50%;" name="file" type="file">
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
  <script src="../js/checkValidation.js" type="text/javascript"></script>
</html>

<?php
require_once "../php/dbConn.php";
if(isset($_POST['nazwa']) && isset($_POST['adres']) && isset($_POST['telefon']) && isset($_POST['strona']) && isset($_POST['mail'])) {
	
	$nazwa=strip_tags(htmlspecialchars(mysql_real_escape_string($_POST['nazwa'])));
	$adres=strip_tags(htmlspecialchars(mysql_real_escape_string($_POST['adres'])));
	$telefon=strip_tags(htmlspecialchars(mysql_real_escape_string($_POST['telefon'])));
	$strona=strip_tags(htmlspecialchars(mysql_real_escape_string($_POST['strona'])));
	$mail=strip_tags(htmlspecialchars(mysql_real_escape_string($_POST['mail'])));
	$plik = $_FILES["file"];
    if ($plik["error"] > 0)
    {
        echo "Error: " . $plik["error"] . "<br>";
    }
	else
	{
		if(!is_dir("../szkoly/"))
		{
			mkdir("../szkoly", 0777);
		}
		move_uploaded_file($plik['tmp_name'],'../szkoly/'.$plik['name']);

        if(!is_dir("../prezentacje/"))
        {
            mkdir("../prezentacje", 0777);
        }
        move_uploaded_file($prezentacja['tmp_name'],'../prezentacje/'.$prezentacja['name']);
		
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO szkoly (nazwa, adres, telefon, mail, html, link) values(?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nazwa,$adres,$telefon,$mail, $plik["name"], $strona));
        $pass = generateRandomString(6);
        $sql = 'INSERT INTO admins (mail, pass) values(?, ?)';
	    $q = $pdo->prepare($sql);
	    echo "Hasło: ".$pass;
	    $q->execute(array($mail,sha1($pass))) or die(mysql_error());
        //header("Location: index.php?m=".$m);
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
