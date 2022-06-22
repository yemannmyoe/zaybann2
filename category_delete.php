<?php 
 
 require 'db_connect.php';

 $id=$_GET['id'];
 $sql ="DELETE from categories where id=:id";

 $stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();



if($stmt->rowCount()){
  	header("location:categorylist");
  }
  else{
  	echo "ERROR !";
  }

 ?>