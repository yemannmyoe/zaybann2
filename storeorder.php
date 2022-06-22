<?php 

require"db_connect.php";

$cart = $_POST['cart'];
$note = $_POST['note'];
$total = $_POST['total']; 
// echo $total;die();

date_default_timezone_set("Asia/Yangon");

$voucher = strtotime(date("h:i:s"));

$orderdate = date('Y-m-d');

session_start();
$userid = $_SESSION['loginuser']['id'];

$status = "Order";


foreach($cart as $key =>$value)
{
	$id = $value['id'];
	$qty = $value['qty'];

	$orderdetail_sql = "INSERT INTO orderdetails(voucherno, qty, item_id) VALUES (:voucherno,:qty,:item_id)";
	$orderdetail_stmt = $pdo->prepare($orderdetail_sql);
	$orderdetail_stmt->bindParam(':voucherno', $voucher);
	$orderdetail_stmt->bindParam(':item_id', $id);
	$orderdetail_stmt->bindParam(':qty', $qty);
    $orderdetail_stmt->execute();


}
   $order_sql = "INSERT INTO orders(orderdate, voucherno, total, note, status, user_id) VALUES(:orderdate, :voucherno, :total, :note, :status, :user_id)";
   	$order_stmt = $pdo->prepare($order_sql);
	$order_stmt->bindParam(':orderdate', $orderdate);
	$order_stmt->bindParam(':voucherno', $voucher);
	$order_stmt->bindParam(':total', $total);
	$order_stmt->bindParam(':note', $note);
	$order_stmt->bindParam(':status', $status);
	$order_stmt->bindParam(':user_id', $userid);
	$order_stmt->execute();




 ?>