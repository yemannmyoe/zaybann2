<?php 
include 'backend_header.php';

include 'db_connect.php';

$id=$_GET['id'];

$sql ="SELECT * from items where id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
	<div class="card-body">
		<form action="item_update" method="POST"  enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?= $row['id']?>">
			<input type="hidden" name="oldphoto" value="<?= $row['photo']?>">

			<div class="form-group row mx-2">
				<label for="inputPassword" class="col-sm-2 col-form-label">CodeNumber</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="codeno" value="<?= $row['codeno'] ?>" name="codeno" placeholder="Code Number">
				</div>
			</div>

			<div class="form-group row mx-2">
				<label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" value="<?= $row['name'] ?>" name="name" placeholder="Name">
				</div>
			</div>

			<div class="form-group row mx-2 ">
				<label for="inputPassword" class="col-sm-2 col-form-label" id="photo">Photo</label>
				<div class="col-sm-10">
					<ul class="nav nav-tabs" id="mytab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="oldprofile-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-selected="true">Old Photo</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-selected="false">New Photo</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="ta-pane fade" id="oldprofile" role="tabpanel" aria-labelledby="oldprofile-tab">
							<img src="<?= $row['photo'];?>" class="img-fluid" style="width:120px; height:120px;">

						</div>

						<div class="ta-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<div class="col-sm-10">
								<input type="file" name="photo" id="photo" class="formm-control-file">
							</div>

						</div>


					</div>



				</div>
			</div>

			<div class="form-group row mx-2">
				<label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="price" value="<?= $row['price'] ?>" name="price" placeholder="Price">
				</div>
			</div>

			<div class="form-group row mx-2">
				<label for="inputPassword" class="col-sm-2 col-form-label">Discount</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="discount" value="<?= $row['discount'] ?>" name="discount" placeholder="Discount">
				</div>
			</div>

			<div class="form-group row mx-2">
				<label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="description" value="<?= $row['description'] ?>" name="description" placeholder="Description">
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


			<button type="submit" class="btn btn-primary mx-5"><i class="fas fa-save"></i>Update</button>
		</form>
		<?php 
		include'backend_footer.php';

		?>
