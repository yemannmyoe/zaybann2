<?php 
 require 'db_connect.php';

 $name=$_POST['name'];
 $logo=$_FILES['logo'];

 $source_dir="image/category/";
 $file_path=$source_dir.$logo['name'];
 move_uploaded_file($logo['tmp_name'],$file_path);

  $sql="INSERT into brands(logo, name)VALUES(:logo,:name)";
  $stmt= $pdo->prepare($sql);
  $stmt->bindParam(':logo',$file_path);
  $stmt->bindParam(':name',$name);
  $stmt->execute();

  if($stmt->rowCount()){
  	header("location:brand");
  }
  else{
  	echo "ERROR !";
  }

 ?>