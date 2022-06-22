<?php 
include 'backend_header.php';

include 'db_connect.php';

$id=$_GET['id'];

$sql ="SELECT * from brands where id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);


// if($stmt->rowCount()){
//   	header("location:categorylist");
//   }
//   else{
//   	echo "ERROR !";
//   }

?>

<h1 class="h3 mb-2 text-gray-800">Brand</h1>


<div class="card shadow mb-4">
	<div class="card-header py-3">
		<div class="row">
			<div class="col-10">
				<h6 class="m-0 font-weight-bold text-primary">List</h6>

			</div>
			<div class="col-2">
				<a href="brand" class="btn btn-outline-primary btn-block"><i class="fas fa-backward"></i>Go Back</a>
			</div>

		</div>
	</div>
	<div class="card-body">
		<form action="brand_update" method="POST"  enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?= $row['id']?>">
			<input type="hidden" name="oldlogo" value="<?= $row['logo']?>">

			<div class="form-group row mx-2 ">
				<label for="inputPassword" class="col-sm-2 col-form-label" id="logo">Logo</label>
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
							<img src="<?= $row['logo'];?>" class="img-fluid" style="width:120px; height:120px;">

						</div>

						<div class="ta-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<div class="col-sm-10">
								<input type="file" name="logo" id="logo" class="formm-control-file">
							</div>

						</div>


					</div>



				</div>
			</div>

			<div class="form-group row mx-2">
				<label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="uname" value="<?= $row['name'] ?>" name="uname" placeholder="Name">
				</div>
			</div><button type="submit" class="btn btn-primary mx-5"><i class="fas fa-save"></i>Update</button>
		</form>
		<?php 
		include'backend_footer.php';

		?>
