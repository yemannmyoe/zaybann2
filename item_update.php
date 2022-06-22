<?php 


require 'db_connect.php';

$id=$_POST['id'];
$codeno=$_POST['codeno'];
 $name=$_POST['name'];
 $photo=$_FILES['photo'];
 $price=$_POST['price'];
 $discount=$_POST['discount'];
 $description=$_POST['description'];

$oldphoto = $_POST['oldphoto'];
$file_path = $oldphoto;

if ($photo['size']>0)
{
	unlink($file_path);

	$source_dir="image/category/";
	$file_path=$source_dir.$photo['name'];
	move_uploaded_file($photo['tmp_name'],$file_path);
}

   $sql="UPDATE items SET codeno=:codeno,name=:name, photo=:photo, price=:price, discount=:discount, description=:description, brand_id=:brand_id, subcategories_id=:subcategories_id WHERE id=:id";

    $stmt= $pdo->prepare($sql);
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':codeno',$codeno);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':photo',$file_path);
  $stmt->bindParam(':price',$price);
  $stmt->bindParam(':discount',$discount);
  $stmt->bindParam(':description',$description);
  $stmt->bindParam(':brand_id',$_POST['brand_id']);
  $stmt->bindParam(':subcategories_id',$_POST['subcategories_id']);
  $stmt->execute();

   if($stmt->rowCount())
   {
   	header("location:item");
   }
   else
   	{
   		echo "ERROR!";
   	}
 ?>
