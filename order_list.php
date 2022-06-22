 <?php 
include 'backend_header.php';
include 'db_connect.php'


  ?>
           <h1 class="h3 mb-2 text-gray-800"> Items</h1>

  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-10">
               <h6 class="m-0 font-weight-bold text-primary">List</h6>
                
                </div>
                  
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Voucher Number</th>
                      <th>Order Date</th>
                      <th>Total</th>
                      <th>Note</th>
                      <th>User</th>
                      <th>Action</th>
                    </tr>
                  </thead>
  <tbody>

   <?php 
      $sql="SELECT * from orders ORDER BY voucherno ASC";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $rows= $stmt->fetchAll();

      $i=1;
      foreach ($rows as  $item):

        $id =$item['id'];
        $voucherno = $item['voucherno'];
        $orderdate = $item['orderdate'];
        $total = $item['total'];
        $note =$item['note'];
        $user_id =$item['user_id'];

    ?>

    <tr>

      <td><?= $i;?></td>
      <td><?= $voucherno?></td>
      <td><?= $orderdate ?></td>
      <td><?= $total ?></td>
      <td><?= $note ?></td>
      <td><?= $user_id ?></td>



      <td>
                      <button class="btn btn-outline-info detail" data-stid="${i}"><i class="fas fa-info-circle"></i>
                      </button> 
                    <a href="orderdelete?id=<?= $id?>" class="btn btn-outline-danger"onclick="return confirm('Are You Sure To Delete?')"><i class="fas fa-trash-alt"></i></a>
                     
                      
                    </td>

     </tr>

<?php 
  $i++;
endforeach;

 ?>
</tbody>
</table>
                  <tbody>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php 
include'backend_footer.php';

  ?>
 