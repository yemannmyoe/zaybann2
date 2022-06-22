<?php 
 require 'db_connect.php';

 $name=$_POST['name'];

 
  $sql="INSERT into subcategories(name,category_id)VALUES(:name,:category_id)";
  $stmt= $pdo->prepare($sql);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':category_id',$_POST['category_id']);

  $stmt->execute();

  if($stmt->rowCount()){
  	header("location:subcategorylist");
  }
  else{
  	echo "ERROR !";
  }

 ?>