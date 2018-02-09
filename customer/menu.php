<?php
include("check_session.php");
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

		/*.bodyButtonFo{			
			border-left: 2px solid black;
			border-bottom: 2px solid black;
		}		
		.bodyButtonDri{			
			border-left: 2px solid black;	

			border-right: 2px solid black;
			border-bottom: 2px solid black;	
		}
		.bodyButtonDes{			
			border-right : 2px solid black;
			border-bottom: 2px solid black;		
		}

		.bodyButtonFo:hover {		
			cursor: pointer;	
			background-color: rgb(230,230,230);				
		}
		.bodyButtonDri:hover {		
			cursor: pointer;	
			background-color: rgb(230,230,230);				
		}

		.bodyButtonDes:hover {		
			cursor: pointer;	
			background-color: rgb(230,230,230);				
		}*/

	</style>
	<body>
		<div class = "container-fluid">
			<!-- Modal -->
			<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Order Summary</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <!-- place the order summary here ~ -->
			      <div class="modal-body" id="orderModalBody">
					 
			      </div>
			      
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Navigation Panel b o i s -->
			<div id = "navPane" class = "row">
					<div id = "logo" class = "text-right col-sm-1">
						<div id = "circleSmall"> </div>
					</div>

					<div id = "tableNumber" class = "text-center col-sm-3">
						<div class = "navDes">
							<h3> Table <?php echo $_SESSION['tableId']?> </h3>
						</div>
					</div>

					<div id = "orderStatus" class = "col-sm-2">
						<div class = "navDes">
							<h3> Incomplete</h3>
						</div>
					</div>

					<div id = "menuButton" class = "navButton text-center col-sm-2">						
						<div class = "navDes">
							<h3> MENU </h3>
						</div>
					</div>

					<div id = "orderButton" class = "navButton text-center col-sm-2">	
						<div class = "navDes">
							<h3> ORDER </h3>
						</div>				
					</div>					

					<div id = "billOutButton" class = "navButton text-center col-sm-2">
						<div class = "navDes">
							<h3> BILL OUT </h3>
						</div>
					</div>
			</div>	

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
		$(document).ready(function(){

		//-- Click listeners (bcs screw buttons)
		//--- START NAV BAR
			//menu button
			$("#menuButton").on("click", function(){
				window.location.replace("#");
			});

			//order button
			$("#orderButton").on("click", function(){
				$("#orderModalBody").text("");	

				$.ajax({
					url: "crud_read.php",
					method: "POST",
					data: {menuType: "food", operation: "loadOrder"},
					dataType: "JSON",
					success: function(data){
						if(data.length > 0){
							var entries = data.sort();
							loadOrder(entries);
						} else {
							$("#orderModalBody").append("<div class='col-sm-12 text-center'>No Orders Yet!</div>");
						}
					}, error: function(XMLHttpRequest, textStatus, errorThrown) {
						console.log(XMLHttpRequest.responseText);
			        	alert("Status: " + textStatus); 
			        	alert("Error: " + errorThrown);
			    	}
				});

				$('#orderModal').modal('show');
			});

			//billout button
			$("#billOutButton").on("click", function(){
				window.location.replace("session_end.php");
			});	
		//--- END OF NAV BAR

		//--- START OF BODYBUTTONS (the big ass buttons)
			//food button
			$("#food").on("click", function(){
				window.location.replace("food.php");
			});

			//drink button
			$("#drinks").on("click", function(){
				window.location.replace("drink.php");
			});

			//dessert button
			$("#dessert").on("click", function(){
				window.location.replace("dessert.php");
			});	
		//--- END OF BODYBUTTONS			

		});		

		function loadOrder ( entries ) {
			var ctr = 1;

			for(i = 0; i < entries.length; i++) {
				if((i + 1 < entries.length) && (entries[i][0] === entries[i+1][0])) {
					ctr++;
				} else {
					$("#orderModalBody").append("<div class = 'row'><div class='col-sm-4 text-center'>"+ctr+"x"+"</div><div class='col-sm-8'>"+entries[i][1]+"</div></div>");
					ctr = 1;
				}
			}
		}
	</script>
</html>