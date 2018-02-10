<?php
	include("check_session.php");
	
	if( isset($_GET['tableId']) ){
		$status = "pending";
		$start = true;
		$_POST["operation"] = "setTableStatus";
		include("crud_update.php");
	} 
	
?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<title>Menu</title>
		<link rel = "stylesheet" href = "css/bootstrap.min.css">
		<script src = "js/jquery-3.1.1.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<!--<link rel = "stylesheet" href = "css/bootstrap.min.css"\
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>-->
	</head>
	<style>

	html, body {
		height: 100%;
	}
	/* --- Navigation bar --- */
	
		.navButton {			
			border-left: 1px solid black;
			vertical-align: center;			
		}

		.navButton:hover {		
			cursor: pointer;	
			background-color: rgb(230,230,230);				
		}	

		#billOutButton{
			border-right: 1px solid black;
		}

		#navPane{							
			border-top: 1px solid black;
			border-bottom: 2px solid black;
			border-left: 1px solid black;
			height: 6em;
		}	

		.navDes, h3{
			padding-top: 17px;
			text-align: center;
			vertical-align: middle;
			font-family: "Calibri";
			font-size: 1.2em;
			font-weight: bold;
		}	

		#orderStatus {
			color: red;
		}

		#foodLogo{
			border: 1px solid black;
			border-radius: 50%;			
		}

	/* --- Sidebar --- */	
		.container-fluid .navbody{
			position: fixed;
			padding-left: 0;
			padding-right: 0;
		}			

		#confirmButton{			
			margin-top: 10%;		
			width: 80%;
			padding-top: 10px; 
			padding-bottom: 10px; 
		}		

		.foodDescription, h4{
			vertical-align: middle;
			line-height:29.7em;
		}

		.bodyButton{
			border-left: 2px solid black;
			border-bottom: 2px solid black;
		}

		.bodyButton:hover {		
			cursor: pointer;	
			background-color: rgb(230,230,230);				
		}

	</style>
	<body>
		<div class = "container-fluid">
			<!-- This is where the Nav Bar and Modals are -->

			<?php include("menu_nav.php");?>

			<!-- Body Place Thingy -->

			<!--Body-->
			<div id = "navBody" class = "heightRow row test">
				<div id = "food" class = "bodyButton text-center col-sm-4">
					<div class = "foodDescription">
						<h4><strong>FOOD</strong></h4>
					</div>
				</div>
				
				<div id ="drinks" class = "bodyButton text-center col-sm-4">
					<div class = "foodDescription">
						<h4><strong>DRINKS</strong></h4>
					</div>
				</div>
				<div id ="dessert" class = "bodyButton text-center col-sm-4">
					<div class = "foodDescription">
						<h4><strong>DESSERT</strong></h4>
					</div>
				</div>
			</div>
		</div>	
	</body>
	<script>
		var menuType = "mainMenu";
	</script>
	<script src="js/menu.js"></script>
</html>