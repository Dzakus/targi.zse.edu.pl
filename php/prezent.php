<?php
    require_once "php/dbConn.php";
    $centra=$pdo->query("SELECT * FROM centra");
    echo '<div class = "ramka span9">
        <h3>Prezentacje szkół</h3>';
    foreach($centra->fetchAll() as $centr)
    {
        $szkoly_centr=$pdo->query("SELECT * FROM szkoly WHERE ".$centr["id"]."=id_centrum");
        if($centr["id"]!=0) echo '<li style="margin-left:20px;">Centrum: '.$centr["centrum"];
        foreach($szkoly_centr->fetchAll() as $sql)
        {
            $prez=$pdo->query("SELECT * FROM prezentacje WHERE id = ".$sql["prez_id"]);
            $prez = $prez->fetch();
            
            $href = "prezentacje/".$prez["ftp"];
            echo '<ul class="punkt"><a href="'.$href.'">'.$sql["nazwa"].'</a></ul>';
        }
        if($centr["id"]!=0) echo '</li>';
    }
    echo '</div>';
?>