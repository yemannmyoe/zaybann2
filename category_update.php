<?php 


require 'db_connect.php';

$id=$_POST['id'];
$name=$_POST['uname'];
$image=$_FILES['image'];

$oldphoto = $_POST['oldphoto'];
$file_path = $oldphoto;

if ($image['size']>0)
{
	unlink($file_path);

	$source_dir="image/category/";
	$file_path=$source_dir.$image['name'];
	move_uploaded_file($image['tmp_name'],$file_path);
}

   $sql="UPDATE categories SET photo=:photo,name=:name WHERE id=:id";

   $stmt=$pdo->prepare($sql);
   $stmt->bindParam(':id',$id);
   $stmt->bindParam(':photo',$file_path);
   $stmt->bindParam(':name',$name);
   $stmt->execute();

   if($stmt->rowCount())
   {
   	header("location:categorylist");
   }
   else
   	{
   		echo "ERROR!";
   	}
 ?>
