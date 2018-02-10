<?php
session_start();

include("db_connect.php");

$sql = "UPDATE tables SET Status = 'empty' WHERE TableID = '".$_SESSION['tableId']."'";

$conn->query($sql);

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header("Location: index.php");
?>