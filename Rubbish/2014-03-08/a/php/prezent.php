<?php
    require_once "php/dbConn.php";
    $szkoly=$pdo->query('SELECT * FROM szkoly');
    echo '<div class = "ramka span9">
    <h2>Wybór szkoły</h2>
    <ul>';
    foreach($szkoly->fetchAll() as $sql){
        echo ' <li><a href="'.$sql["link"].'">'.$sql["nazwa"].'</a></li>';
    }
    echo ' </ul>
        </div>';
?>