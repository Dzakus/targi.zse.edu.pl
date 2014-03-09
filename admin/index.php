<?php ob_start(); ?>
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
            <div class="row">
                <h3>CRUD</h3>
                <a href="login/logout.php" class="btn btn-danger" style="top: 10px;right: 10px;position: absolute;">Wyloguj się</a>
            </div>
            <div class="row">
            <p>
                <a href="create.php" class="btn btn-success">Dodaj szkołe</a>
                <a href="admin.php" class="btn btn-success">Dodaj admina</a>
            </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nazwa szkoly</th>
                      <th>Adres szkoly</th>
                      <th>Telefon</th>
                      <th>Strona szkoly</th>
                      <th>E-mail szkoly</th>
                      <th>Plik (html)</th>
                      <th>Akcja</th>                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   require_once("../php/dbConn.php");
                   $sql = 'SELECT * FROM szkoly ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['nazwa'] . '</td>';
                            echo '<td>'. $row['adres'] . '</td>';
                            echo '<td>'. $row['telefon'] . '</td>';
                            echo '<td>'. $row['link'] . '</td>';
                            echo '<td>'. $row['mail'] . '</td>';
                            echo '<td>'. $row['html'] . '</td>';
                            echo '<td width = 150px>
                            <a class="btn btn-success" href="edit.php?id='.$row['id'].'">Edytuj</a>
                            <a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Usuń</a>
                            </td>';
                            echo '</tr>';
                   }
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>