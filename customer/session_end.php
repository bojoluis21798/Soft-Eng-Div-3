<?php
	session_start();

	include("db_connect.php");


	// sets the table status to empty
	$sql = "UPDATE tables SET Status = 'empty' WHERE TableID = '".$_SESSION['tableId']."'";

	$conn->query($sql);

	//sets all the previous orders to complete to archive them
	$sql = "SELECT OrderID FROM tables_menu WHERE TableID = '".$_SESSION['tableId']."'";

	$result = $conn->query($sql); 

	while($row = $result->fetch_row()) {
		$sql = "UPDATE tables_menu SET Status = 'complete' WHERE OrderID = '".$row[0]."'";
		$conn->query($sql);
	}

	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 

	header("Location: index.php");
?>