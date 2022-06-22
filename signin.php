<?php 

 include'db_connect.php';

 $email = $_POST['email'];
 $password = $_POST['password'];

 $sql = "SELECT * FROM users WHERE email=:email AND password=:password";

 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':email', $email);
 $stmt->bindParam(':password',$password);
 $stmt->execute();

 session_start();

 if ($stmt->rowCount()<=0)

 {
 	if (!isset($_COOKIE['logInCount'])) 
 	{
 		$logInCount = 1;
 	}
 	else
 	{
 		$logInCount = $_COOKIE['logInCount'];
 		$logInCount++;
 	}
 	setcookie('logInCount',$logInCount, time()+30);
 	if ($logInCount >3) 
 	{
 		//time out design
 		include('frontend_header.php');
 		echo "<div align='center'><div class='spinner-grow text-primary ' role='status'>
  <span class='sr-only'>Loading...</span>
</div>
<div class='spinner-grow text-secondary' role='status'>
  <span class='sr-only'>Loading...</span>
</div>
<div class='spinner-grow text-success' role='status'>
  <span class='sr-only'>Loading...</span>
</div>

<div class='spinner-grow text-warning' role='status'>
  <span class='sr-only'>Loading...</span>
</div>

<div class='spinner-grow text-danger' role='status'>
  <span class='sr-only'>Loading...</span>
</div>

<div class='spinner-grow text-dark' role='status'>
  <span class='sr-only'>Loading...</span>
</div>

</div>
<div align='center'>
<h1>Try Again In 1 minute</h1>
<i class='far fa-clock fa-5x fa-spin'style='color:pink'></i>
<i class='far fa-clock fa-5x fa-spin'style='color:blue'></i>
<i class='far fa-clock fa-5x fa-spin'style='color:green'></i>
<i class='far fa-clock fa-5x fa-spin'style='color:red'></i>
<i class='far fa-clock fa-5x fa-spin'style='color:yellow'></i>
<i class='far fa-clock fa-5x fa-spin'style='color:black'></i>
</div>
</div>"
;
 		include('frontend_footer.php');

 		echo "<script type=\"text/javascript\">

 		   (function(){
               setTimeout(function(){
           
                    location.href='login.php';
               	},10000000);

 		   	})();

 		</script>";

 		unset($_COOKIE['logInCount']);
 		setcookie('logInCount', '', time()-10);
 	}
 	else
 	{
  
    $_SESSION['login_reject']= "Email and Password is not invalid";
 		header("location:login");
 	}
 }
 else{
 	$user = $stmt->fetch(PDO::FETCH_ASSOC);
 $_SESSION['loginuser'] = $user;
 if($user['role_id']==1)
 {
 	header("location:dashboard");
 }
else{
	header("location:index");
}
 }

 


 ?>