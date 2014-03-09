 
<?php 
class Login {
	public static function CheckLogged()
	{
		session_start();
		if (isset($_SESSION["logged"]) && $_SESSION["logged"]===1) {
			return true;
		}else{
			return false;
		}
	}
	public static function CheckExistance($mail, $pass)
	{
		require_once '../../php/dbConn.php';
		$pass = sha1($pass);
		$ex = $pdo->prepare("SELECT * FROM admins WHERE mail = ? AND pass = ?");
		$ex->execute(array($mail,$pass));
		if ($ex->rowCount()>0) {
			return true;
		}else{
			return false;
		}
	}
	public static function _Login()
	{
		session_start();
		$_SESSION['logged'] = 1;
	}

	public static function _Logout()
	{
		session_start();
		$_SESSION['logged'] = 0;
	}
}

?>