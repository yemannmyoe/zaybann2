 <?php 
include 'backend_header.php';
include 'db_connect.php'


  ?>
           <h1 class="h3 mb-2 text-gray-800"> Brand</h1>

  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-10">
               <h6 class="m-0 font-weight-bold text-primary">List</h6>
                
                </div>
                  <div class="col-2">
                    <a href="brand1" class="btn btn-outline-primary btn-block"><i class="fas fa-plus"></i>Add New</a>
                  </div>

                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   <?php 
      $sql="SELECT * from brands ORDER BY name ASC";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $rows= $stmt->fetchAll();

      $i=1;
      foreach ($rows as  $brand):

        $id =$brand['id'];
        $name = $brand['name'];
       

    ?>
    <tr>

      <td><?= $i;?></td>
      <td><?= $name ?></td>
      
      <td>
                      <button class="btn btn-outline-info detail" data-stid="${i}"><i class="fas fa-info-circle"></i>
                      </button>
                    
                    

                     <a href="brand_edit?id=<?= $id?>" class="btn btn-outline-warning btnedit"><i class="fas fa-edit"></i></a>
                      
                    <a href="brand_delete?id=<?= $id?>" class="btn btn-outline-danger"onclick="return confirm('Are You Sure To Delete?')"><i class="fas fa-trash-alt"></i></a>
                     
                      
                    </td>

     </tr>

<?php 
  $i++;
endforeach;

 ?>
</tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
              </div>
            </div>
          </div>

<?php 
include'backend_footer.php';

  ?>
 