 <?php 
include 'backend_header.php';
include 'db_connect.php'


  ?>
           <h1 class="h3 mb-2 text-gray-800"> Sub-Catagory</h1>

  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-10">
               <h6 class="m-0 font-weight-bold text-primary">List</h6>
                
                </div>
                  <div class="col-2">
                    <a href="subcategory1" class="btn btn-outline-primary btn-block"><i class="fas fa-plus"></i>Add New</a>
                  </div>

              </div>
            </div>
            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  </thead>
  <tbody>
    <?php 
      $sql="SELECT * from subcategories ORDER BY name ASC";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $rows= $stmt->fetchAll();

      $i=1;
      foreach ($rows as  $item):

        $id =$item['id'];
        $name = $item['name'];
        
    ?>

    <tr>

      <td><?= $i;?></td>
      <td><?= $name ?></td>
      


      <td>
                      
                    

                     <a href="subcategories_edit?id=<?= $id?>" class="btn btn-outline-warning btnedit"><i class="fas fa-edit"></i></a>
                      
                    <a href="subcategories_delete?id=<?= $id?>" class="btn btn-outline-danger"onclick="return confirm('Are You Sure To Delete?')"><i class="fas fa-trash-alt"></i></a>
                     
                      
                    </td>

     </tr>

<?php 
  $i++;
endforeach;
?>

  </tbody>
</table>

<?php 
include'backend_footer.php';

  ?>
 