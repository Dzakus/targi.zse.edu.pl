<?php
	require_once 'html/top.html';
	require_once 'php/menu.php';
	
	if(!isset($_GET["page"]))
	{
		$_GET["page"] = 0;
	}
	
	switch($_GET["page"])
	{
		case 0:
		{
			require_once 'html/home.html';
			break;
		}
		case 1:
		{
            if(!isset($_GET["link"])){

			    require_once 'php/wybor.php';
            }else{
                if ($handle = opendir('szkoly/')) {
                    while (false !== ($entry = readdir($handle))) {
                        if(sha1($entry)===$_GET["link"]){
                            echo '<div class="ramka span9">';
                                require_once "php/dbConn.php";
                                $wynik = $pdo->query("SELECT * FROM szkoly WHERE id = ".$_GET["id"]."")->fetchAll();
                                print_r($wynik);
                                require_once "szkoly/".$entry;
                            echo "</div>";
                            break;
                        }
                    }
                }
          }
            break;
		}
		
		case 2:
		{
			require_once 'php/prezent.php';
            break;
		}
		
		case 3:
		{
			require_once 'html/ser_inf.html';
            break;
		}
		
		default:
		{
			require_once 'html/home.html';
            break;
        }
	}
	require_once 'html/footer.html'
	?>
	<div class="strzalka" style="display:none; width: 64px; height: 64px; position: fixed; bottom: 0; left: 0;">
		<img onclick="go_top()" src="images/arrow.png" style="height:64px;cursor:hand;" />
	</div> 
<!-- //centrum kształcenia zawodowego i ustawicznego
//kilińskiego 25, grota roweckiego 64 -->
	
<script src="js/jquery.min.js" type="application/javascript"></script>
<script type="application/javascript">
	$( document ).scroll(function() {
		if (window.pageYOffset>0) {
			$("div.strzalka").show("fast", "swing");
		}else{
			$("div.strzalka").hide("fast", "swing");
		};
  		console.log(window.pageYOffset);
	});
    function go_top(){
            $("html, body").animate({ scrollTop: 0 }, 1000);
    }
</script>