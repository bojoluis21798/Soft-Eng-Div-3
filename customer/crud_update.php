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

			case "setOrderStatus":

				$sql = "UPDATE tables_menu SET Status = 'received' WHERE TableID = '".$_POST['TableID']."' AND OrderID = '".$_POST['OrderID']."'";

				$conn->query($sql);

				$queryCount = "SELECT COUNT(*) FROM tables_menu WHERE TableID = '".$_POST['TableID']."' AND (Status = 'pending' OR Status = 'received')";
				$qCount = $conn->query($queryCount);
				$qRow = $qCount->fetch_row();


				$receivedCount = "SELECT COUNT(*) FROM tables_menu WHERE TableID = '".$_POST['TableID']."' AND Status = 'received'";
				$rCount = $conn->query($receivedCount);
				$rRow = $rCount->fetch_row();

				if((int)$qRow[0] == (int)$rRow[0]){
					$sql = "UPDATE tables SET Status = 'served' WHERE TableID = '".$_POST['TableID']."'";
					if($conn->query($sql)) {
						$ret = TRUE;
					}
				}

				break;
		}

		echo $ret;

	} else {
		echo false;
	}
?>