<?php 
include 'backend_header.php';
include 'db_connect.php';


  ?>

  <?php 
      $sql="SELECT * from brands ORDER BY name ASC";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $rows= $stmt->fetchAll();
      


    ?>
                

     <?php 
      $sql="SELECT * from subcategories ORDER BY name ASC";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $rows= $stmt->fetchAll();
    ?>


           <h1 class="h3 mb-2 text-gray-800">Item</h1>

  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-10">
               <h6 class="m-0 font-weight-bold text-primary">List</h6>
                
                </div>
                  <div class="col-2">
                    <a href="item" class="btn btn-outline-primary btn-block"><i class="fas fa-backward"></i>Go Back</a>
                  </div>

              </div>
            </div>

            <form action="item_add" method="POST"  enctype="multipart/form-data">

              <div class="form-group row mx-2 my-5">
    <label for="inputPassword" class="col-sm-2 col-form-label" >CodeNumber</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword" id="codeno"name="codeno" placeholder="CodeNumber">
    </div>
  </div>

  <div class="form-group row mx-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
  </div>


  <div class="form-group row mx-2 my-5">
    <label for="inputPassword" class="col-sm-2 col-form-label" >photo</label>
    <div class="col-sm-10">
      <input type="file" id="inputPassword" id="photo"name="photo">
    </div>
  </div>

  <div class="form-group row mx-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" placeholder="Price">
    </div>
  </div>

  <div class="form-group row mx-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Discount</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount">
    </div>
  </div>

  <div class="form-group row mx-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Discription</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description" name="description" placeholder="Discription">
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Brand</label>
    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
      <?php foreach ($rows as $row) {?>
        
      <option value="<?= $row['id']?>"><?=$row['name']?></option>
    <?php }?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Sub Categories</label>
    <select class="form-control" id="exampleFormControlSelect1" name="subcategories_id">
      <?php foreach ($rows as $row) {?>
        
      <option value="<?= $row['id']?>"><?=$row['name']?></option>
    <?php }?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary mx-5"><i class="fas fa-save"></i>Save</button>

</form>
 <?php 
include'backend_footer.php';

  ?>
