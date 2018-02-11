<!DOCTYPE html>
<?php
	require('db_connect.php');
	$ctr = 1;
	$order = 1;

?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Catamaran:400,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400" rel="stylesheet">

<style>

	.support-text{
		font-size : 28px;
		font-weight : 200;
		font-family: 'Source Sans Pro', sans-serif;
	}

	.info-text{
		font-size : 20px;
		font-weight : 600;
		font-family: 'Source Sans Pro', sans-serif;
	}

	.status-text{
		font-size : 32px;
		font-weight : 600;
		font-family: 'Source Sans Pro', sans-serif;
		margin : 6px;
	}

	.important-text{
		font-size : 28px;
		font-weight : 400;
		font-family: 'Source Sans Pro', sans-serif;
	}

	.table-container{
		overflow-y : auto;
	}

	.content-container{
		height : 450px;
		width: 500px;
		overflow-y : auto;
		display: inline-block;
	}

	.card {
		margin-top: 3rem;
		width: 37vw;
		margin-left: 5.5vw;
	}

	.red {
		background-color: red;
	}

	.blue {
		background-color: blue;
	}

	.orange {
		background-color: orange;
	}

	.green {
		background-color: green;
	}

	.yellow {
		background-color: yellow;
	}

	.purple {
		background-color: purple;
	}

	.black {
		background-color: black;
	}

	h2, h6 {
		display: inline;
	}



</style>

</head>
<body>
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-6 content-container red">
				<div class="card">
					<div class="card-header">
						<h2>Table 1</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;

							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>

			<div class="col-md-6 content-container blue">
				<div class="card">
					<div class="card-header">
						<h2>Table 2</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;
							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 content-container orange">
				<div class="card">
					<div class="card-header">
						<h2>Table 3</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;
							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>

			<div class="col-md-6 content-container green">
				<div class="card">
					<div class="card-header">
						<h2>Table 4</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;
							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 content-container yellow">
				<div class="card">
					<div class="card-header">
						<h2>Table 5</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;
							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>

			<div class="col-md-6 content-container purple">
				<div class="card">
					<div class="card-header">
						<h2>Table 6</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;
							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 content-container black">
				<div class="card">
					<div class="card-header">
						<h2>Table 7</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;
							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>
			
			<div class="col-md-6 content-container">
				<div class="card">
					<div class="card-header">
						<h2>Table 8</h2>
						<h6>
							<?php
								$query = "SELECT Status FROM tables WHERE TableID ='".$ctr."'";

								$result = mysqli_query($conn, $query);

								if($result){
									$row = mysqli_fetch_assoc($result);

									echo ucfirst($row['Status']);
								}
							?>
						</h6>
					</div>
					<ul class="list-group list-group-flush orderList">
						<?php
							$query = "SELECT tables_menu.TableID, tables_menu.OrderID, menu.Name FROM tables_menu INNER JOIN menu ON tables_menu.MenuID = menu.MenuID WHERE Status = 'pending'
							AND TableID =".$ctr++."";
							$result = mysqli_query($conn, $query);
							$btn = "btn btn-success";
							$tableNum = $ctr - 1;
							if($result){
								while ($row = mysqli_fetch_assoc($result)){
									echo "<li class ="."list-group-item"." ><h4>{$row['Name']}</h4><h5 hidden>{$row['OrderID']}</h5><p hidden>".$tableNum."</p><button type="."button"." class=".$btn.">Ok</button></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
    	$(document).on("click", ".btn", function(){
    		//alert("p is: "+$(this).parent().children("p").text()+" and h5 is "+$(this).parent().children("h5").text());
    		$.ajax({
    			url: "crud_update.php",
    			method: "POST",
    			data: {TableID: $(this).parent().children("p").text(),
    				  OrderID: $(this).parent().children("h5").text(),
    				  operation: "setOrderStatus"},
    			datatype: "text",
    			success: function(data){
					if(data) {
						//alert(data);
					} 
				}, error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert(XMLHttpRequest.responseText);
	        		alert("Status: " + textStatus);
	        		alert("Error: " + errorThrown);
	    		}
    		});
		});
    });
</script>
