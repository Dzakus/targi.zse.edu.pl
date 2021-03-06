<?php
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        require '../php/dbConn.php';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM szkoly WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        header("Location: index.php?m=".$_GET["m"]);
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
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
                        <h3>Usuń szkołe</h3>
                    </div>
                     
                    <form class="form-horizontal" action=<?php echo "delete.php?m=".$mail; ?> method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-danger">Czy jesteś pewien?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Tak</button>
                          <a class="btn" href=<?php echo "index.php?m=".$_GET["m"]; ?>>Nie</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>