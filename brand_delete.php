<?php 
 
 require 'db_connect.php';

 $id=$_GET['id'];
 $sql ="DELETE from brands where id=:id";

 $stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();



if($stmt->rowCount()){
  	header("location:brand");
  }
  else{
  	echo "ERROR !";
  }

 ?>