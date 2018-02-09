<?php
	session_start();

	if( isset($_SESSION['tableId']) && isset($_POST['operation']) ) {
		$ret = false;
		$sql;

		include("db_connect.php");

		switch($_POST['operation']) {
			case "create": 	
				if( isset($_POST['menuId']) ) {
					$sql = "INSERT INTO tables_menu (TableID, MenuID, Status) VALUES ('".$_SESSION['tableId']."', '".$_POST['menuId']."', 'pending');";

					if($conn->query($sql)) {
						$ret = true;
					}

				}

				break;

			case "read":
				if( isset($_POST['readType']) ){
					switch() {
						case "": 
					} 
				}
				
				if( isset($_POST['menuType']) ) {
					$sql = "SELECT menuID, Name FROM menu WHERE Type = '".$_POST['menuType']."'";

					if($result = $conn->query($sql)) {
						$ret = array();

						while($row = $result->fetch_row()) {
							array_push($ret, $row);
						}

						if( !empty($ret) ){
							$ret = json_encode($ret);	
						} else {
							$ret = false;
						}
					}
				}
				
				break;
			case "update": break;
			case "delete": break;
		}

		echo $ret;

	} else {
		echo false;
	}
?>