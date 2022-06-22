<?php 
include 'backend_header.php';
include 'db_connect.php';

  ?>

   <?php 
      $sql="SELECT * from categories ORDER BY name ASC";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $rows= $stmt->fetchAll();
    ?>

           <h1 class="h3 mb-2 text-gray-800">Subcatagory</h1>

  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-10">
               <h6 class="m-0 font-weight-bold text-primary">List</h6>
                
                </div>
                  <div class="col-2">
                    <a href="subcategorylist" class="btn btn-outline-primary btn-block"><i class="fas fa-backward"></i>Go Back</a>
                  </div>

              </div>
            </div>

                        <form action="subcategories_add" method="POST"  enctype="multipart/form-data">

  <div class="form-group row mx-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name"placeholder="Enter Sub-Category Name">
    </div>
  </div>
 <div class="form-group col-lg-12">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
      <?php foreach ($rows as $row) {?>
      <option value="<?= $row['id']?>"><?=$row['name']?></option>
    <?php }?>
    </select>
  </div>
 

  <button type="submit" class="btn btn-primary mx-5"><i class="fas fa-save"></i>Submit</button>
</form>
 <?php 
include'backend_footer.php';

  ?>
