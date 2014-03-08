<html lang="pl">
<head>
    <meta charset="utf-8">
</head>
<h2>Upload plików html. Zalecane jest używanie Google Chrome.</h2>
<form action="index.php" method="post" enctype='multipart/form-data'>
    Nazwa szkoly: <input type="text" name="nazwa"/><br>
    Adres szkoly: <input type="text" name="adres"/><br>
    Telefon: <input type="text" name="telefon"/><br>
    Strona szkoly: <input type="text" name="strona"/><br>
    E-mail szkoly: <input type="text" name="mail"/><br>
    Plik (html) : <input type="file" name="file"/><br>
    <input type="submit" value="Wyślij">
</form>
</html>

<?php
require_once "../php/dbConn.php";
if(isset($_POST['nazwa']) && isset($_POST['adres']) && isset($_POST['adres']) && isset($_POST['strona']) && isset($_POST['mail'])){
	
	$nazwa=$_POST['nazwa'];
	$adres=$_POST['adres'];
	$telefon=$_POST['adres'];
	$strona=$_POST['strona'];
	$mail=$_POST['mail'];
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
		//$pdo->query("INSERT INTO `szkoly` (nazwa,html) VALUES ('".$nazwa."','".$plik['name']."')") or print mysql_error();
        $pdo->query("INSERT INTO `szkoly` (nazwa, adres, telefon, mail, html, link) VALUES ('".$nazwa."', '".$adres."', '".$telefon."', '".$mail."', '".$plik["name"]."', '".$strona."')") or print mysql_error();

    }
}
