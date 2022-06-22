<?php 
 require 'db_connect.php';

 $name=$_POST['name'];
 $image=$_FILES['image'];

 $source_dir="image/category/";
 $file_path=$source_dir.$image['name'];
 move_uploaded_file($image['tmp_name'],$file_path);

  $sql="INSERT into categories(photo, name)VALUES(:photo,:name)";
  $stmt= $pdo->prepare($sql);
  $stmt->bindParam(':photo',$file_path);
  $stmt->bindParam(':name',$name);
  $stmt->execute();

  if($stmt->rowCount()){
  	header("location:categorylist");
  }
  else{
  	echo "ERROR !";
  }

 ?>