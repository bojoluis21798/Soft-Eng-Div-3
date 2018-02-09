<?php
include("check_session.php");
?>
<!DOCTYPE html>
<html lang = "en">
<html>
	<head>
		<title>Dessert</title>

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

		#billOutButton{
			border-right: 1px solid black;
		}

		#orderStatus {
			color: red;
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

		/*.addBtn{
			right: 10px;			
		}*/

	/* screw this imma be doing CSS shapes */

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
			<!-- Modal for Adding -->
			<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="addModalLabel"></h5>
			        <button type="button" id='addModalClose' class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <!-- place the order summary here ~ -->
			      <div class="modal-body text-center">
					 <h3 class="removePaddingTop">How many?</h3>
					 <input type = "number" id="qtyOrder" value="0" min="0">
					 <h3 class="removePaddingTop" hidden id="successMessage"></h3>
			      </div>
			      
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-secondary" data-dismiss="">Add</button>
			        <button type="button" id='addModalCloseBtn' class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			      </div>
			    </div>
			  </div>
			</div>

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

			      <div class="modal-body">
					 <blockquote class="blockquote">
  						<p class="mb-0">Life is hell. I know everything in the universe, yet I could not fall in love. I was forever trapped in an infinite timeline of pain and suffering -- I envy death. Technology is just another thing to distract you from the real joys of life. Technology will kill you.</p>
					 </blockquote>
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
					<div class = "navDes">
						<div id = "circleSmall"> </div>
					</div>
				</div>

				<div id = "tableNumber" class = "text-center col-sm-3">
					<div class = "navDes">
						<h3> Table <?php echo $_SESSION['tableId']?> </h3>
					</div>
				</div>

				<div id = "orderStatus" class = "col-sm-2">					
					<div class = "navDes">
						<h3>Incomplete</h3>
					</div>
				</div>			

				<div id = "menuButton" class = "navButton text-center col-sm-2">											
					<div class = "navDes">
						<h3>MENU</h3> 
					</div>
				</div>

				<div id = "orderButton" class = "navButton text-center col-sm-2">						
					<div class = "navDes">
						<h3>ORDER</h3>	
					</div>				
				</div>					

				<div id = "billOutButton" class = "navButton text-center col-sm-2">					
					<div class = "navDes">
						<h3> BILL OUT </h3>
					</div>
				</div>			
			</div>

			<!-- Body Place Thingy -->

			
			<div class = "row">
				<!-- Side Bar -->
				<div class = "sideBar text-center col-sm-4">
					<div class = "foodImage">	
						<div id = "circleBig">logo here</div>					
					</div>

					<div class = "foodDescription">
						<h4>Dessert Name Lmao</h4>
					</div>

					<div class = "confirmButton">
						<input id = "backButton" class="btn btn-light" type="button" value="BACK TO MENU">
					</div>
				</div>

				<!-- Table -->	
				<!-- Load the rows here bois -->
				<div class = "content tablePane offset-sm-4 col-sm-8">
					
				</div>
			</div>						

		</div>
	</body>

	<script>
		$(document).ready(function(){

		//--- Load the menu items
			$.ajax({
				url: "crud_operations.php",
				method: "POST",
				data: {menuType : "desserts", operation: "read"}, 
				dataType: "json",
				success: function(data){
					console.log(data);
					if(!data) {
						alert("Error");
					} else {

						for(var x = 0; x < data.length; x++){
							loadRow(data[x][1]);
						}

					}
				}, error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest.responseText);
			        alert("Status: " + textStatus); 
			        alert("Error: " + errorThrown);
			    }
			});

		//-- Click listeners (bcs screw buttons)
			//--- START NAV BAR
			
			//menu button
			$("#menuButton").on("click", function(){
				window.location.replace("menu.php");
			});

			//order button
			$("#orderButton").on("click", function(){
				$('#orderModal').modal('show');
			});

			//billout button
			$("#billOutButton").on("click", function(){
				window.location.replace("session_end.php");
			});	

			//--- END NAV BAR

			//--- START SIDE BAR

			$("#backButton").on("click", function(){
				window.location.replace("menu.php");
			});	

			//--- END SIDE BAR

			$(".addBtn").on("click", function(){
				$('#addModal').modal('show');
				$('#addModal').find('#addModalLabel').text($(this).parent().children(".foodLabel").text());
			});

			//--- INSIDE MODAL

			$(".modalAddBtn").on("click", function(){
				//$.ajax({})
				// HAVE TO ADD AJAX
			});

			$("#addModalClose").on("click", function(){
				$("#qtyOrder").val(0);
			});

			$("#addModalCloseBtn").on("click", function(){
				$("#qtyOrder").val(0);
			});
		});

		// A function that adds rows to .tablePane everytime it is called. It accepts the name of the product or any string lel
		function loadRow ( productName ){
			// $(".tablePane").append("<div class = 'row'>	<div class = 'col-sm-12'> <div class = 'foodRow col-sm-8'>"+productName+" </div> <div class = 'col-sm-4'><button type = 'button' class = 'addBtn btn btn-light'>Add</button></div></div></div>");	
			$(".tablePane").append("<div class = 'foodRow'> <span class='foodLabel'>"+productName+"</span> <button type = 'button' class = 'addBtn btn btn-light'>Add</button> </div>")		
		}
	</script>
</html>
