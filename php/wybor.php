<?php
    require_once "php/dbConn.php";
    $szkoly=$pdo->query('SELECT * FROM szkoly');
    echo '<div class = "ramka span9">
    <h3>Wybór szkoły</h3>
    <ul>';
    foreach($szkoly->fetchAll() as $sql){
        //echo ' <li><a class = "linker" link = "'.$sql["html"].'">'.$sql["nazwa"].'</a>'.$sql["html"].'</li>';
        echo ' <li><a href = "?page=1&id='.$sql["id"].'&link='.sha1($sql["html"]).'">'.$sql["nazwa"].'</a>';
    }
    echo ' </ul>
        </div>';
?>