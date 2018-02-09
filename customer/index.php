<?php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<link rel = "stylesheet" href = "css/bootstrap.min.css">
		<script src = "js/jquery-3.1.1.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
	</head>
	
	<style>
		.modal-dialog {
			margin-top: 40vh;
		}

		.header {
			position: fixed;
			top:18%;
			height:5px;
			width: 100%;
			background-color:black;
		}

		.title{
			margin-top:5%;
		}
		
		#secnd{
			margin-top:3%;
		}
		
		img{
			margin-top:1%;
		}

		.btn{
			width:80px;
			height:80px;
			margin-top:6%;
			border-radius:20px;
			border: 1px solid #e6e6e6;			
		}

		.password {
			width: 50%;
		}

	</style>
	
	<body>
		<!--Modal-->
		<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
			  	<div class="modal-content">
			    	<div class="modal-header text-center">
			    		<h5 class="modal-title" id="exampleModalLabel">Enter Password</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
			      	</div>

			      	<!-- place the order summary here ~ -->
			      	<div class="modal-body">
			      		<center>
			      			<h4 id='warningMessage' hidden>Wrong Password!</h4>
			      			<input type="password" class="form-control password" id="password">
			      		</center>
			      	</div>
			    </div>
			</div>
		</div>

		<center>
		<img src = "images/zai.jpg" class="rounded-circle" height="100px;" id='topLogo'>
		</center>
	
		<div class="header">
		</div>
				
		<div class="title text-center">
			<h2>Welcome to Boards & Bites <br> Which <strong>table</strong> are you located at?</h2>
		</div>
		<div class = "imagePane text-center">
			<img src = "images/zai.jpg" id="secnd" class="rounded-circle" height="150px;" >		
		</div>			
		<center>
				<button type = "button" class = "btn btn-light"> <h2>1</h2>	</button>
				<button type = "button" class = "btn btn-light"> <h2>2</h2>	</button>
				<button type = "button" class = "btn btn-light"> <h2>3</h2>	</button>
				<button type = "button" class = "btn btn-light"> <h2>4</h2>	</button>
				<button type = "button" class = "btn btn-light"> <h2>5</h2>	</button>
				<button type = "button" class = "btn btn-light"> <h2>6</h2>	</button>
				<button type = "button" class = "btn btn-light"> <h2>7</h2>	</button>
				<button type = "button" class = "btn btn-light"> <h2>8</h2>	</button>
		</center>
	</body>
</html>

<script>
	$(document).ready(function(){
		$( ".btn" ).click(function() {
			window.location.replace("menu.php?tableId="+$(this).children("h2").text()+"");
		});

		$( "#topLogo" ).click(function(){
			$('#passwordModal').modal('show');
		});

		$( "#password" ).keyup(function(){
			$.ajax({
				url: "admin_check.php",
				method: "POST",
				data: {password : $(this).val()}, 
				dataType: "json",
				success: function(data){
					if(data) {
						window.location.replace("admin.php");
					}
				}
			});
		});
	});
	
</script>
