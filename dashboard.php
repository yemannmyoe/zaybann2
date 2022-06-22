<?php 
   include 'backend_header.php';
   include "db_connect.php";

   $date = new Datetime();
   $today = $date->format('Y-m-d');

   $order_sql = "SELECT COUNT(id) as order_total FROM orders WHERE orderdate = '$today'";
   $order_stmt = $pdo->prepare($order_sql);
   $order_stmt->execute();
   $order = $order_stmt->fetch(PDO::FETCH_ASSOC);


 $customer_sql = "SELECT COUNT(id) as customer_total FROM users WHERE role_id=2";
   $customer_stmt = $pdo->prepare($customer_sql);
   $customer_stmt->execute();
   $customer = $customer_stmt->fetch(PDO::FETCH_ASSOC);

   $brand_sql = "SELECT COUNT(id) as brand_total FROM brands";
   $brand_stmt = $pdo->prepare($brand_sql);
   $brand_stmt->execute();
   $brand = $brand_stmt->fetch(PDO::FETCH_ASSOC);

$item_sql = "SELECT COUNT(id) as item_total FROM items";
   $item_stmt = $pdo->prepare($item_sql);
   $item_stmt->execute();
   $item = $item_stmt->fetch(PDO::FETCH_ASSOC);


    ?>
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order['order_total'] ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Our Customer</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $customer['customer_total'] ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-smile fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Brands Total</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $brand['brand_total'] ?></div>
                        </div>
                        <div class="col">
                          </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Item List</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $item['item_total'] ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i>
                      <span class="labelOne_data"></span>
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> 
                      <span class="labelTwo_data"></span>
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> 
                      <span class="labelThree_data"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          

        <div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-12">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Today Order
			            </h4>
					</div>

				</div>
	            

	            
	        </div>
	        <div class="card-body">
				
				

	            <div class="table-responsive">
	            	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th> No </th>
								<th> Voucher NO </th>
								<th> Total </th>
								<th> Status </th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>

							
						</tbody>

						

	            	</table>
	            </div>
	        </div>
		</div>







        </div>
       
 <?php 

 include 'backend_footer.php';

  ?>