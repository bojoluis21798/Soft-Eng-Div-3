<?php
	include("check_session.php");
?>
<!DOCTYPE html>
<html lang = "en">
<html>
	<head>
		<title>Food</title>

			<link rel = "stylesheet" href = "css/bootstrap.min.css">
			<script src="js/jquery-3.1.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</head>

	<style>
	html, body{
		height: 100% !important;
		overflow: hidden;
	}

	/* --- Navigation bar --- */
		.navButton {			
			border-left: 1px solid black;
			vertical-align: middle;			
		}

		.navButton:hover {		
			cursor: pointer;	
			background-color: rgb(230,230,230);				
		}	

		.navDes, h3{
			padding-top: 17px;
			text-align: center;
			vertical-align: middle;
			font-family: "Calibri";
			font-size: 1.2em;
			font-weight: bold;
		}

		.removePaddingTop {
			padding-top: 0px !important;
		}	

		#orderStatus {
			color: red;
		}

		#billOutButton{
			border-right: 1px solid black;
		}

		#navPane{		
			z-index: 999;
			background-color: white;
			vertical-align: middle;
			border-top: 1px solid black;
			border-bottom: 2px solid black;
			border-left: 1px solid black;
			height: 6em;
			position: fixed;
			width: 100%;
		}		

		#foodLogo{
			border: 1px solid black;
			border-radius: 50%;			
		}

	/* --- Sidebar --- */		

		.sideBar{
			margin-top: 6em;
			height: 100%;		
			border-right: 2px solid black;
			position: fixed;
		}

		.foodImage{
			display: inline-block;
			vertical-align: middle;
			height: 50%;	
			margin-top: 10%;					
		}

		#backButton{			
			margin-top: 10%;		
			width: 80%;
			padding-top: 10px; 
			padding-bottom: 10px; 
		}		

	/* --- Table Part --- */
		.tablePane{					
			margin-top: 6em;
			height: 90vh !important;					
		}

		.foodRow{			
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 20px;
			border-bottom: 1px solid black;
		}

		.wrapper {
			display: flex;
			height: 100vh;
		}

		.content {
			overflow-y: scroll;
		}

		#circleBig {
			width: 300px;
			height: 300px;
			border: 1px solid black;
			border-radius: 50%;				
		}

		#circleSmall {			
			width: 30px;
			height: 30px;
			border: 1px solid black;
			border-radius: 50%;				
		}		


	</style>

	<body>		
		<div class = "container-fluid">	
						
			<!-- This is where the Nav Bar and Modals are -->

			<?php include("menu_nav.php");?>

			<!-- Body Place Thingy -->
			
			<div class = "row">
				<!-- Side Bar -->
				<div class = "sideBar text-center col-sm-4">
					<div class = "foodImage">	
						<div id = "circleBig">logo here</div>					
					</div>

					<div class = "foodDescription">
						<h4>Food Name Lmao</h4>
					</div>

					<div class = "confirmButton">
						<input id = "backButton" class="btn btn-light" type="button" value="BACK TO MENU">
					</div>
				</div>

				<!-- Table -->	
				<!-- Load the rows here bois -->
				<div class ="content tablePane offset-sm-4 col-sm-8">
					
				</div>
			</div>						

		</div>
	</body>
	<script>
		var menuType = "food";
	</script>
	<script src="js/menu.js"></script>
</html>
