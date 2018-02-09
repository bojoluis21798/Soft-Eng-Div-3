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
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="addModalClose">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <!-- place the order summary here ~ -->
			      <div class="modal-body text-center">
					 <h3 class='removePaddingTop'>How many?</h3>
					 <input type = "number" id = "qtyOrder" value = "0" min = "0">
					 <h3 hidden id='statusMessage' class='removePaddingTop'></h3>
			      </div>
			      
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-secondary modalAddBtn" data-dismiss="">Add</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addModalCloseBtn">Cancel</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal for Order -->
			<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Order Summary</h5>
			        <button type="button" id="modalOrderClose" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body" id='orderModalBody'>
					 
			      </div>
			      
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" id="modalOrderCloseBtn" data-dismiss="modal">Close</button>
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
		var menuId;
		var qty;
		$(document).ready(function(){
			// var test = "life is hell. i know everything in the universe, yet i could not fall in love. i was forever trapped in an infinite timeline of pain and suffering -- i envy death. technology is just another thing to distract you from the real joys of life. technology will kill you.";

		//--- Load the menu items
			$.ajax({
				url: "crud_read.php",
				method: "POST",
				data: {menuType : "food", operation: "loadMenu",}, 
				dataType: "json",
				success: function(data){
					console.log(data);
					if(!data) {
						alert("Error");
					} else {

						for(var x = 0; x < data.length; x++){
							loadRow(data[x][1], data[x][0]);
						}

					}
				}, error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert(XMLHttpRequest.responseText);
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

			//--- END NAV BAR

			//--- START SIDE BAR

			$("#backButton").on("click", function(){
				window.location.replace("menu.php");
			});	

			//--- END SIDE BAR

			$(document).on("click", ".addBtn", function(){
				$("#qtyOrder").val("0");
				$('#addModal').modal();
				$('#addModal').find('#addModalLabel').text($(this).parent().children(".foodLabel").text());
				menuId = $(this).parent().children(".foodId").val();
			});

			//--- INSIDE ADD MODAL

			$(".modalAddBtn").on("click", function(){
				qty =parseInt($("#qtyOrder").val());

				if(qty > 0) {
					$.ajax({
						url: "crud_create.php",
						method: "POST",
						data: {menuId: menuId, operation: "addOrder", quantity: qty}, 
						dataType: "text",
						success: function(data){
							if(data) {
								//Add a success thingy
							} 
						}, error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert(XMLHttpRequest.responseText);
			        		alert("Status: " + textStatus); 
			        		alert("Error: " + errorThrown);
			    		}
					});
				} else {
					//Make it throw an Error!
				}
			});
		});		

		//------ testing purposes
		
		//------ end of testing


		// A function that adds rows to .tablePane everytime it is called. It accepts the name of the product or any string lel
		function loadRow ( productName, productId ){
			// $(".tablePane").append("<div class = 'row'>	<div class = 'col-sm-12'> <div class = 'foodRow col-sm-8'>"+productName+" </div> <div class = 'col-sm-4'><button type = 'button' class = 'addBtn btn btn-light'>Add</button></div></div></div>");	
			$(".tablePane").append("<div class ='foodRow'><span class = 'foodLabel'>"+productName+"</span> <button type='button' class='addBtn btn btn-light'>Add</button><input type='hidden' class='foodId' value='"+productId+"'> </div>")		
		}

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


		//function that places the passed string to the modal -- #modalBody. Warning: NOT FORMATTED. Please give zai some time for this :'(
		// function loadSummary ( summaryDetails ) {
		// 	$("#modal-body").append("<h3>"+summaryDetails+"</h3>");
		// }
		// okay nevermind that it doesn't work for some reason

	</script>
</html>
