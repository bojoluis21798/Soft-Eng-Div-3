			
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