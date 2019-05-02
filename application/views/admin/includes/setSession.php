<?php 
	
	if($acc == "0")
	{
		$_SESSION['id'] = $id;
		$_SESSION['user'] = $user;
		$_SESSION['level'] = $userlevel;
		header("Location: ".base_url()."Admin/dashboard");
	}

?>