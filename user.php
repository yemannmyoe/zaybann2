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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Phone Nubmer</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
  <tbody>

   <?php 
      $sql="SELECT * from users ORDER BY name ASC";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $rows= $stmt->fetchAll();

      $i=1;
      foreach ($rows as  $item):

        $id =$item['id'];
        $name = $item['name'];
        $email = $item['email'];
        $password = $item['password'];
        $phone =$item['phone'];
        $address =$item['address'];

    ?>

    <tr>

      <td><?= $i;?></td>
      <td><?= $name?></td>
      <td><?= $email ?></td>
      <td><?= $password ?></td>
      <td><?= $phone ?></td>
      <td><?= $address ?></td>



      <td>
                      <button class="btn btn-outline-info detail" data-stid="${i}"><i class="fas fa-info-circle"></i>
                      </button> 
                    <a href="userdelete?id=<?= $id?>" class="btn btn-outline-danger"onclick="return confirm('Are You Sure To Delete?')"><i class="fas fa-trash-alt"></i></a>
                     
                      
                    </td>

     </tr>

<?php 
  $i++;
endforeach;

 ?>
</tbody>
</table>
                  <tfoot>
                     <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Phone Nubmer</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                 
                  </tfoot>
                  <tbody>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php 
include'backend_footer.php';

  ?>
 