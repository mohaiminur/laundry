<?php 
require_once('../class/User.php');
if(isset($_POST['pwd'])){
	$pwd =$_POST['pwd'];
	$pwd = md5($pwd);

	$uid = $_SESSION['user_logged'];
	$res = $user->change_pass($pwd, $uid);
	$return['valid'] = false;
	if($res){
		$return['valid'] = true;
		$return['msg'] = 'Password Change Successfully!';
	}
	echo json_encode($return);

}//end isset
$user->Disconnect();