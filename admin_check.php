<?php
	if( isset($_POST['password']) ){
		$pass = $_POST['password'];

		echo ($pass == "1234") ? true : false;
	}else{
		echo false;
	}
?>