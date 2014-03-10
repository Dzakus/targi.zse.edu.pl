<?php
if ( !empty($_POST)) {
    require '../php/dbConn.php';
    $mails = $_POST["mail"];
    $pass = sha1($_POST["pass"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE admins SET pass = ? WHERE mail = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($pass, $mails)) or print mysql_error();
    //header("Location: index.php?m=".$_GET["m"]);

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
        header("Location: login/index.php?req=".$_SERVER["SCRIPT_NAME"]);
    }
}
?>
<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Zmień hasło</h3>
        </div>

        <form class="form-horizontal" action=<?php echo "changePass.php?m=".$mail; ?> method="post">
<!--            <input type="hidden" name="id" value="--><?php //echo $id;?><!--"/>-->
            <div class="form-actions">
                <div class="form-group">
                    <label class="control-label">E-mail</label>
                    <input style="width: 50%;" class="form-control" name="mail" type="text"  placeholder="E-Mail">
                </div>

                <div class="form-group">
                    <label class="control-label">Nowe hasło</label>
                    <input style="width: 50%;" class="form-control" name="pass" type="password"  placeholder="Hasło">
                </div>
                <button type="submit" class="btn btn-danger">Tak</button>
                <a class="btn" href="index.php">Nie</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>