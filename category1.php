<?php 
include 'backend_header.php';

  ?>
           <h1 class="h3 mb-2 text-gray-800">Catagory</h1>

  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-10">
               <h6 class="m-0 font-weight-bold text-primary">List</h6>
                
                </div>
                  <div class="col-2">
                    <a href="categorylist" class="btn btn-outline-primary btn-block"><i class="fas fa-backward"></i>Go Back</a>
                  </div>

              </div>
            </div>

            <form action="category_add" method="POST"  enctype="multipart/form-data">
  <div class="form-group row mx-2 my-5">
    <label for="inputPassword" class="col-sm-2 col-form-label" id="image">Photo</label>
    <div class="col-sm-10">
      <input type="file" id="inputPassword" name="image">
    </div>
  </div>
  <div class="form-group row mx-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
  </div><button type="submit" class="btn btn-primary mx-5"><i class="fas fa-save"></i>Save</button>

</form>
 <?php 
include'backend_footer.php';

  ?>
