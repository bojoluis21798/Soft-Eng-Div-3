<?php
session_start();
if( !isset($_SESSION['tableId']) && !isset($_GET['tableId']) ) {

	session_unset();
	session_destroy();
	header("location: index.php");

} else {
	if( isset($_GET['tableId']) ) {
		$_SESSION['tableId'] = (int) $_GET['tableId'];
 	}
}
