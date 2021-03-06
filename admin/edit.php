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
    $mail = $_GET["m"];
    $sa = $pdo->query('SELECT sa FROM admins WHERE SHA1(mail) = "'.$mail.'"')->fetch();
	$sa = $sa["sa"];
    if ($sa==0) {
        $uid = $pdo->query('SELECT id FROM szkoly WHERE SHA1(mail) = "'.$mail.'"')->fetch();
		$uid = $uid["id"];
        if (!($uid == $_GET["id"])) {
            header("Location: login/index.php?req=".$_SERVER["SCRIPT_NAME"]);
        }
    }
}
?>
 <body>
    <div class="container">
     
	    <div class="span10 offset1">
	        <div class="row">
	            <h3>Edytuj szkołę</h3>
	        </div>
	        <?php
            // if (!isset($_GET["id"])) {
            //      die("Nie można bez GET");
            // } 
            require_once '../php/dbConn.php'; 
            $szkola = $pdo->query("SELECT * FROM szkoly WHERE id = ".intval($_GET["id"]))->fetch();
            ?>
	        <form class="form-horizontal" action=<?php echo '"edit.php?id='.$_GET["id"].'&m='.$mail.'"'; ?> method="post" enctype="multipart/form-data">

					<div class="form-group">
	                <label class="control-label">Nazwa</label>
	                <input value= <?php echo '"'.$szkola["nazwa"].'"'; ?> style="width: 50%;" class="form-control" name="nazwa" type="text"  placeholder="Nazwa">
	          	</div>

	            <div class="form-group">
	                <label class="control-label">Adres</label>
	                <input value= <?php echo '"'.$szkola["adres"].'"'; ?>  style="width: 50%;" class="form-control" name="adres" type="text"  placeholder="Adres">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Telefon</label>
	                <input value= <?php echo '"'.$szkola["telefon"].'"'; ?>  style="width: 50%;" class="form-control" name="telefon" type="text"  placeholder="Telefon">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Adres E-mail</label>
	                <input value= <?php echo '"'.$szkola["mail"].'"'; ?>  style="width: 50%;" class="form-control" name="mail" type="text"  placeholder="E-mail">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Strona internetowa</label>
	                <input value= <?php echo '"'.$szkola["link"].'"'; ?>  style="width: 50%;" class="form-control" name="strona" type="text"  placeholder="Strona">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Plik html</label>
	                <input style="width: 50%;" name="file" type="file">
	          	</div>

	          	<button type="submit" disabled="disabled" class="btn btn-success">Edytuj</button>
	          	<a class="btn" href=<?php echo "index.php?m=".$_GET["m"]; ?>>Back</a>
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
if(isset($_POST['nazwa']) && isset($_POST['adres']) && isset($_POST['telefon']) && isset($_POST['strona']) && isset($_POST['mail'])) {
	$nazwa=htmlspecialchars($_POST['nazwa']);
	$adres=htmlspecialchars($_POST['adres']);
	$telefon=htmlspecialchars($_POST['telefon']);
	$strona=htmlspecialchars($_POST['strona']);
	$mail=htmlspecialchars($_POST['mail']);
    if ($_FILES["file"]["error"]===4) {
        echo "tag";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `szkoly` SET `nazwa`=?,`adres`=?,`telefon`=?,`mail`=?,`link`=? WHERE `id`=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nazwa,$adres,$telefon,$mail, $strona, $_GET["id"]));
        header("Location: index.php?m=".$_GET["m"]);
    }else{
        print_r($_FILES);
        $plik = $_FILES["file"];
        if ($plik["error"] > 0)
        {
            echo "Error: " . $plik["error"] . "<br>";
        }
        else
        {
            echo "<br>Upload: " . $plik["name"] . "<br>";
            echo "Type: " . $plik["type"] . "<br>";
            echo "Size: " . ($plik["size"] / 1024) . " kB<br>";
            echo "Stored in: " . $plik["tmp_name"];
            if(!is_dir("../szkoly/"))
            {
                mkdir("../szkoly", 0777);
            }
            move_uploaded_file($plik['tmp_name'],'../szkoly/'.$plik['name']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `szkoly` SET `nazwa`=?,`adres`=?,`telefon`=?,`mail`=?,`html`=?,`link`=? WHERE `id`=?";
            //$sql = "UPDATE szkoly SET nazwa=?,adres=?, telefon=?, mail=?, html=?, link=? WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nazwa,$adres,$telefon,$mail, $plik["name"], $strona, $_GET["id"]));

            header("Location: index.php?m=".$_GET["m"]);
        }
    }
	
}
