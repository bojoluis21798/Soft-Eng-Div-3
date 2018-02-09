<?php
	session_start();

	if( isset($_SESSION['tableId']) && isset($_POST['operation']) ) {
		$ret = false;
		$sql;

		include("db_connect.php");

		switch($_POST['operation']) {
			case "addOrder":
				if( isset($_POST['menuId']) && isset($_POST['quantity']) ) {
					$x = 0;
					$sql = "INSERT INTO tables_menu (TableID, MenuID, Status) VALUES ('".$_SESSION['tableId']."', '".$_POST['menuId']."', 'pending');";

					while($x < $_POST['quantity']) {

						if($conn->query($sql)) {
							$ret = true;
						}

						$x++;
					}
				}

				break;
				
		}

		echo $ret;

	} else {
		echo false;
	}
?>