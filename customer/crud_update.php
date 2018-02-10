<?php
	if($start === false || !isset($start) ){
		session_start();
	}

	if( isset($_SESSION['tableId']) && isset($_POST['operation']) ) {
		$ret = false;
		$sql;

		include("db_connect.php");

		switch($_POST['operation']) {
			case "setTableStatus":

				if( isset($status) ) {
					$sql = "UPDATE tables SET Status = 'pending' WHERE TableID = '".$_SESSION['tableId']."'";

					if($conn->query($sql)) {
						$ret = NULL;
					}
				}

				break;
				
		}

		echo $ret;

	} else {
		echo false;
	}
?>