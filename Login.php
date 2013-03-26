<?php
require_once("includer.php");
class Login extends ChrisMysqli
{
	private $login = false,$mail,$password,$db;

	public function __construct()
	{
		$this->db = new ChrisMysqli();
		if($this->db)
		{
			session_start();
			if(isset($_GET['logout']))
			{
				echo "logout<br />";
				$_SESSION = array();
            	session_destroy();
            	$this->login = false;
			}
			else if(!empty($_SESSION['user_mail']) && ($_SESSION['user_logged_in'] == 1))
			{
				echo "sessionlogin<br />";
				$this->login = true;
			}
			else if(isset($_POST['login']))
			{
				echo "postlogin<br />";
				if(!empty($_POST['loginUser']) && !empty($_POST['loginPass']))
				{
					$this->doPostLogin();
				}
				else if(empty($_POST['loginUser'])){echo "empty mail<br />";}
				else if(empty($_POST['loginPass'])){echo "empty pass<br />";}
				else{echo "no post login operation..<br />";}
			}
			else{
				echo "no login variante<br />";
				return false;
			}
		}
		else{echo "no db connection...";}
	}

	private function doPostLogin()
	{
		echo "loggin in..<br />";
		$this->mail = $_POST['loginUser'];
		#var_dump($this->db);die();
		$loginData = $this->db->get('SELECT mail,pass FROM user WHERE mail = "'.$_POST['loginUser'].'"');
		if($loginData->num_rows() == 1)
		{
			$loginData = $loginData->fetch_row();
			if($loginData[1] == $_POST['loginPass'])
			{
				$_SESSION['user_mail'] = $loginData[1];
                $_SESSION['user_logged_in'] = 1;
				$this->login = true;
				return true;
			}
			else{echo "wrong pass";}
		}
		else{echo "user not in database";}
	}

	public function isLoggedIn(){return $this->login;}

}
?>
