<?php
require_once("/includer.php");
class Login extends ChrisMysqli
{
	private $login = false,$mail,$password;

	public function __construct()
	{
		parent::__construct();
		if($this->db)
		{
			session_start();
			if(isset($_POST['logout']))
			{
				echo "logout";
				$_SESSION = array();
            	session_destroy();
            	$this->login = false;
			}
			else if(!empty($_SESSION['mail']) && ($_SESSION['loggedIn'] == 1))
			{
				echo "sessionlogin";
				$this->login = true;
			}
			else if(isset($_POST['login']))
			{
				echo "postlogin";
				if(!empty($_POST['loginUser']) && !empty($_POST['LoginPass']))
				{
					$this->doPostLogin();
				}
				else if(empty($_POST['loginUser'])){echo "empty mail";}
				else if(empty($_POST['LoginPass'])){echo "empty pass";}
			}
			else{return false;}
		}
		else{echo "no db connection...";}
	}

	private function doPostLogin()
	{
		$this->mail = $_POST['loginUser'];
		$loginData = $db->get("SELECT mail,pass FROM user WHERE mail = ".$_POST['loginUser']);
		if($loginData->num_rows() == 1)
		{
			$loginData = $loginData->fetch_row();
			if($loginData['pass'] == $_POST['LoginPass'])
			{
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