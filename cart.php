<?php 
 include 'frontend_header.php';
 ?>

 <div class="container">
 	<h1 class="mt-4 mb-3">Your Shopping Cart</h1>
      <div class="row mt-5 shoppingcart_div">
      	<div class ="col-12">
      		<a href="categories" class="btn btn-secondary float-right px-5" style="background-color:#020800;border-color:#020800"><i class="fas fa-shopping-cart"></i>Cotinue Shopping</a>
      	</div>
      	
      </div>

      <div class="row mt-5 shoppingcart_div">
      	<div class="table-responsive">
      		<table class="table">
      			<thead>
      				<tr>
      					<th colspan="3">Product</th>
      					<th colspan="3">Qty</th>
      					<th>Price</th>
      					<th>Total</th>

      				</tr>

      			</thead>
      			<tbody id="shoppingcart_table"></tbody>
                 <tfoot id="shoppingcart_tfoot"></tfoot>
      		</table>
      		

      	</div>
      	


      </div>
      <div class="row mt-5 noneshoppingcart_div text-center">
            <div class="text-center"><h4 style="align:center">There is No Items In Your Cart</h4>
                  
            </div>
            <div class="col-12 mt-5">
                  <a href="categories" class="btn btn-secondary px-3"
                  style="background-color: #020800; border-color: #020800">
                  <i class="fas fa-shopping-cart">Continue Shopping</i></a>
            </div>
      
      </div>
 </div>
 <?php 

include 'frontend_footer.php'
  ?>