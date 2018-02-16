		var menuId;
		var qty;
		$(document).ready(function(){
			// var test = "life is hell. i know everything in the universe, yet i could not fall in love. i was forever trapped in an infinite timeline of pain and suffering -- i envy death. technology is just another thing to distract you from the real joys of life. technology will kill you.";

		//--- Load the menu items
			if(menuType !== "mainMenu") {
				$.ajax({
					url: "crud_read.php",
					method: "POST",
					data: {menuType : menuType, operation: "loadMenu",}, 
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
			}
			
		//-- Click listeners (bcs screw buttons)
			//--- START NAV BAR

			//menu button

			$("#menuButton").on("click", function(){
				if(menuType !== "mainMenu") {
					window.location.replace("menu.php");
				}
			});

			//order button
			$("#orderButton").on("click", function(){
				$("#orderModalBody").text("");	

				$.ajax({
					url: "crud_read.php",
					method: "POST",
					data: {menuType: menuType, operation: "loadOrder"},
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