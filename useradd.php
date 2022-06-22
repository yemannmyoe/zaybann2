<?php 
 require 'db_connect.php';
  
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $phone=$_POST['phone'];
 $address=$_POST['address'];

  $sql="INSERT into users(name,profile,email,password,address,phone,role_id)VALUES(:name,:profile,:email,:password,:address,:phone,:role_id)";
  $stmt= $pdo->prepare($sql);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':profile',$profile);
  $stmt->bindParam(':email',$email);
  $stmt->bindParam(':password',$password);
  $stmt->bindParam(':address',$address);
  $stmt->bindParam(':phone',$phone);
  $stmt->bindParam(':role_id',$_POST['role_id']);
  $stmt->execute();

  if($stmt->rowCount()){
  	header("location:user");
  }
  else{
  	echo "ERROR !";
  }

 ?>