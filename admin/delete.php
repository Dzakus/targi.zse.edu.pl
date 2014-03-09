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
        header("Location: index.php");
         
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
if (!Login::CheckLogged()) {
  header("Location: login/index.php?req=".$_SERVER["SCRIPT_NAME"]);
}
?>
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Usuń szkołe</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-danger">Czy jesteś pewien?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Tak</button>
                          <a class="btn" href="index.php">Nie</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>