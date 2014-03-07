<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link   href="../css/bootstrapValidator.css" rel="stylesheet">
    
    
</head>
 <body>
    <div class="container">
     
	    <div class="span10 offset1">
	        <div class="row">
	            <h3>Stwórz szkołę</h3>
	        </div>
	 
	        <form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">

					<div class="form-group">
	                <label class="control-label">Nazwa</label>
	                <input style="width: 50%;" class="form-control" name="nazwa" type="text"  placeholder="Nazwa">
	          	</div>

	            <div class="form-group">
	                <label class="control-label">Adres</label>
	                <input style="width: 50%;" class="form-control" name="adres" type="text"  placeholder="Adres">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Telefon</label>
	                <input style="width: 50%;" class="form-control" name="telefon" type="text"  placeholder="Telefon">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Adres E-mail</label>
	                <input style="width: 50%;" class="form-control" name="mail" type="text"  placeholder="E-mail">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Strona internetowa</label>
	                <input style="width: 50%;" class="form-control" name="strona" type="text"  placeholder="Strona">
	          	</div>
	          	<div class="form-group">
	                <label class="control-label">Plik html</label>
	                <input style="width: 50%;" name="file" type="file">
	          	</div>

	          	<button type="submit" disabled="disabled" class="btn btn-success">Create</button>
	          	<a class="btn" href="index_fajny.php">Back</a>
	        </form>
	    </div>
                 
    </div> <!-- /container -->
  </body>
  <script src="../js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/bootstrapValidator.js"></script>
  <script type="text/javascript">
  	$(document).ready(function() {
    $('.form-horizontal').bootstrapValidator({
        // The default error message for all fields
        // You can specify the error message for any fields
        message: "Coś poszło nie tak",

        // The submit buttons selector
        // These buttons will be disabled when the form input are invalid
        submitButtons: $('button'),

        // Custom submit handler
        // The handler has two arguments
        // - validator is the instance of BootstrapValidator
        // - form is jQuery object representing the current form
        // By default, submitHandler is null
        submitHandler: function(validator, form) {
        	form.submit();
        },
        live: 'enabled',
        fields: {
            nazwa: {
                message: "Kiepska nazwa",
                validators: {
                    stringLength: {
                    	message:"Za krótka ta nazwa, min to 10 znaków",
                    	min:10
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            adres: {
                message: "Kiepska adres",
                validators: {
                    stringLength: {
                    	message:"Za krótki ten adres, min to 10 znaków",
                    	min:10
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            telefon: {
                message: "Kiepska numer telefonu",
                validators: {
                    digits: {
                    	message: "To pole może zawierać tylko cyfry"
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            mail: {
                message: "Kiepska mail",
                validators: {
                    emailAddress: {
                    	message: "Nieprawidłowy adres e-mail, jeśli jesteś pewien, że jest prawidłowy skontaktuj się z administratorem"
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            strona: {
            	message: "Kiepska stronkia", 
            	validators: {
            		uri: {
            			message: "Nieprawidłowy adres URL, powinien on tak wyglądać: http://www.loremipsum.com"
            		},
                    notEmpty:{
                    	message: "Puste pole"
                    }
            	}
            }
        }
    });
});
  </script>
</html>

<?php
require_once "../php/dbConn.php";
if(isset($_POST['nazwa']) && isset($_POST['adres']) && isset($_POST['telefon']) && isset($_POST['strona']) && isset($_POST['mail'])) {
	print_r($_POST);
	print_r($_FILES);
	$nazwa=$_POST['nazwa'];
	$adres=$_POST['adres'];
	$telefon=$_POST['telefon'];
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
		
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO szkoly (nazwa, adres, telefon, mail, html, link) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nazwa,$adres,$telefon,$mail, $plik["name"], $strona));
            header("Location: index.php");
    }
}
