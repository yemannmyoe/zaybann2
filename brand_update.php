<?php 


require 'db_connect.php';

$id=$_POST['id'];
$name=$_POST['uname'];
$logo=$_FILES['logo'];

$oldlogo = $_POST['oldlogo'];
$file_path = $oldlogo;

if ($logo['size']>0)
{
	unlink($file_path);

	$source_dir="image/category/";
	$file_path=$source_dir.$image['name'];
	move_uploaded_file($image['tmp_name'],$file_path);
}

   $sql="UPDATE brands SET logo=:logo,name=:name WHERE id=:id";

   $stmt=$pdo->prepare($sql);
   $stmt->bindParam(':id',$id);
   $stmt->bindParam(':logo',$file_path);
   $stmt->bindParam(':name',$name);
   $stmt->execute();

   if($stmt->rowCount())
   {
   	header("location:brand");
   }
   else
   	{
   		echo "ERROR!";
   	}
 ?>
