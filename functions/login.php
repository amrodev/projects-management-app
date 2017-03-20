<? 
ob_start();

require_once "languages/common.php";
?>
<?php 
require('../lib/users.php');
require('../lib/Encryption.php');



if( !empty($_POST['username']) && !empty($_POST['password']))
{

	$username      = $_POST['username'];
	$password      = $_POST['password'];
	$_enc          = new Encryption();
	$user_password = $_enc->encode($password);
	$_user         = new Users();
	$exist         = $_user->isUser($username);
	if ($exist == true) 
	{
		$user_data = $_user->get_userdata('userName',$username);
		if ($user_data[0]['active'] == 0) 
	    {
           //$lang['login_userStatusSuspended']; 
	       //header("Location: ../index.php");
	       
	    }
	    if($user_data[0]['userPassword'] == $user_password) 
	    {
			session_start();
	    	$_SESSION['user_login'] = true;
	    	$_SESSION['user_id']   = $user_data[0]['id'];
			$_SESSION['username']  = $user_data[0]['userName'];
			$_SESSION['useremail'] = $user_data[0]['userEmail'];
			$_SESSION['user_level'] = $user_data[0]['userLevel'];
			header("Location: ../dashboard.php");
		    }
	    else
	    {
		    //header("Location: ../index.php");
		    //echo $_SESSION['loginMessage'] = $lang['login_userMessage'];
	    }
		
	}
/////////////////////////////////////////////////////////////////////////////////
	
}
else{
	   //header("Location: ../index.php");
	   //echo $_SESSION['admin_login_message'] = 'empty ';
}

?>

<? ob_flush(); ?>