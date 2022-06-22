<?php 
 require 'db_connect.php';
  
 $codeno=$_POST['codeno'];
 $name=$_POST['name'];
 $photo=$_FILES['photo'];
 $price=$_POST['price'];
 $discount=$_POST['discount'];
 $description=$_POST['description'];

 $source_dir="image/item/";
 $file_path=$source_dir.$photo['name'];
 move_uploaded_file($photo['tmp_name'],$file_path);

// INSERT INTO `items`(`id`, `codeno`, `name`, `photo`, `price`, `discount`, `description`, `brand_id`, `subcategories_id`, `created_at`, `updated_at`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])





  $sql="INSERT into items(codeno, name, photo, price, discount, description,brand_id,subcategories_id)VALUES(:codeno,:name,:photo,:price,:discount,:description,:brand_id,:subcategories_id)";
  $stmt= $pdo->prepare($sql);
  $stmt->bindParam(':codeno',$codeno);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':photo',$file_path);
  $stmt->bindParam(':price',$price);
  $stmt->bindParam(':discount',$discount);
  $stmt->bindParam(':description',$description);
  $stmt->bindParam(':brand_id',$_POST['brand_id']);
  $stmt->bindParam(':subcategories_id',$_POST['subcategories_id']);
  $stmt->execute();

  if($stmt->rowCount()){
  	header("location:item");
  }
  else{
  	echo "ERROR !";
  }

 ?>