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
            <h3>Dodaj prezentacje</h3>
        </div>

        <form class="form-horizontal" action=<?php echo '"prezAdd.php?id='.$_GET["id"].'&m='.$_GET["m"].'"'; ?> method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="control-label">Lokalizacja na FTP:</label>
                <input style="width: 50%;" class="form-control" name="ftp" type="text"  placeholder="FTP">
            </div>

            <div class="form-group">
                <label class="control-label">Lokalizacja w sieci</label>
                <input style="width: 50%;" class="form-control" name="link" type="text"  placeholder="Sieć">
            </div>

            <button type="submit" class="btn btn-success">Create</button>
            <a class="btn" href=<?php echo "index.php?m=".$_GET["m"]; ?>>Back</a>
        </form>
    </div>

</div> <!-- /container -->
</body>
<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<?php
if(isset($_POST["link"]) && isset($_POST["ftp"])){
    require_once "../php/dbConn.php";
    $link = $_POST["link"];
    $ftp = $_POST["ftp"];
    $sql = 'INSERT INTO prezentacje (link, ftp) VALUES (?,?)';
    $q = $pdo->prepare($sql);
    $q->execute(array($link, $ftp));
    $prez_id = $pdo->lastInsertId();
    $sql = 'UPDATE szkoly SET prez_id = ? WHERE id = ?';
    $q = $pdo->prepare($sql);
    $q->execute(array($prez_id, $_GET["id"]));
}