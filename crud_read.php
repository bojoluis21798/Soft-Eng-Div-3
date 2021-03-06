<?php
	session_start();

	if( isset($_SESSION['tableId']) && isset($_POST['operation']) && isset($_POST['menuType'])) {
		$ret = false;
		$sql;

		include("db_connect.php");

		switch($_POST['operation']){
			case "loadMenu": 

				$sql = "SELECT menuID, Name FROM menu WHERE Type = '".$_POST['menuType']."'";

				if($result = $conn->query($sql)) {
					$ret = array();

					while($row = $result->fetch_row()) {
						array_push($ret, $row);
					}

					if( !empty($ret) ){
						$ret = json_encode($ret);	
					}
				}

				break;

			case "loadOrder": 

				$sql = "SELECT tables_menu.MenuID, menu.Name 
						FROM tables_menu 
						INNER JOIN menu 
						ON tables_menu.MenuID = menu.MenuID 
						WHERE tables_menu.TableID = '".$_SESSION['tableId']."' AND (tables_menu.Status = 'pending' OR tables_menu.Status = 'received')";

				if($result = $conn->query($sql)) {
					$ret = array();

					while($row = $result->fetch_row()) {
						array_push($ret, $row);
					}

					$ret = json_encode($ret);	
				}

				break;
			case "loadTables": 

				break;
		}

		echo $ret;

	} else {
		echo false;
	}
?>