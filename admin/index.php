<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>CRUD</h3>
            </div>
            <div class="row">
            <p>
<<<<<<< HEAD
                <a href="create.php" class="btn btn-success">Create</a>
=======
                <a href="create.php" class="btn btn-success">Stwórz</a>
>>>>>>> 99a87b5f4fd3740c8d945f6518df610a8985d310
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
                      <th>Action</th>                      
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
<<<<<<< HEAD
                            echo '<td><button class="btn btn-success" href="edit.php?id='.$row['id'].'">Edytuj</button></td>';
=======
                            echo '<td><a class="btn btn-success" href="edit.php?id='.$row['id'].'">Edytuj</button></td>';
>>>>>>> 99a87b5f4fd3740c8d945f6518df610a8985d310
                            echo '</tr>';
                   }
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>