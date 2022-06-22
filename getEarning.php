<?php 

include 'db_connect.php';


   $Jan_first = strtotime('first day of January');
   $Jan_last = strtotime('last day of January');
   $Jan_start = date("Y-m-d", $Jan_first);
   $Jan_end = date("Y-m-d" , $Jan_last);

   $Jan_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Jan_start' AND '$Jan_end'";
   $Jan_stmt = $pdo->prepare($Jan_sql);
   $Jan_stmt->execute();
   $Jan_resaultdata = $Jan_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Jan_resaultdata)
    {
    	$Jan_resault = $Jan_resaultdata['total'];
    }
    else
    {
    	$Jan_resault = 0;
    }

    $Feb_first = strtotime('first day of February');
   $Feb_last = strtotime('last day of February');
   $Feb_start = date("Y-m-d", $Feb_first);
   $Feb_end = date("Y-m-d" , $Feb_last);

   $Feb_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Feb_start' AND '$Feb_end'";
   $Feb_stmt = $pdo->prepare($Feb_sql);
   $Feb_stmt->execute();
   $Feb_resaultdata = $Feb_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Feb_resaultdata)
    {
    	$Feb_resault = $Jan_resaultdata['total'];
    }
    else
    {
    	$Feb_resault = 0;
    }




    $Mar_first = strtotime('first day of March');
   $Mar_last = strtotime('last day of March');
   $Mar_start = date("Y-m-d", $Mar_first);
   $Mar_end = date("Y-m-d" , $Mar_last);

   $Mar_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Mar_start' AND '$Mar_end'";
   $Mar_stmt = $pdo->prepare($Mar_sql);
   $Mar_stmt->execute();
   $Mar_resaultdata = $Mar_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Mar_resaultdata)
    {
    	$Mar_resault = $Mar_resaultdata['total'];
    }
    else
    {
    	$Mar_resault = 0;
    }

     $Apr_first = strtotime('first day of April');
   $Apr_last = strtotime('last day of April');
   $Apr_start = date("Y-m-d", $Apr_first);
   $Apr_end = date("Y-m-d" , $Apr_last);

   $Apr_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Apr_start' AND '$Apr_end'";
   $Apr_stmt = $pdo->prepare($Apr_sql);
   $Apr_stmt->execute();
   $Apr_resaultdata = $Apr_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Apr_resaultdata)
    {
    	$Apr_resault = $Apr_resaultdata['total'];
    }
    else
    {
    	$Apr_resault = 0;
    }
 $May_first = strtotime('first day of May');
   $May_last = strtotime('last day of May');
   $May_start = date("Y-m-d", $May_first);
   $May_end = date("Y-m-d" , $May_last);

   $May_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$May_start' AND '$May_end'";
   $May_stmt = $pdo->prepare($May_sql);
   $May_stmt->execute();
   $May_resaultdata = $May_stmt->fetch(PDO::FETCH_ASSOC);

    if ($May_resaultdata)
    {
    	$May_resault = $May_resaultdata['total'];
    }
    else
    {
    	$May_resault = 0;
    }



 $Jun_first = strtotime('first day of June');
   $Jun_last = strtotime('last day of June');
   $Jun_start = date("Y-m-d", $Jun_first);
   $Jun_end = date("Y-m-d" , $Jun_last);

   $Jun_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Jun_start' AND '$Jun_end'";
   $Jun_stmt = $pdo->prepare($Jun_sql);
   $Jun_stmt->execute();
   $Jun_resaultdata = $Jun_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Jun_resaultdata)
    {
    	$Jun_resault = $Jun_resaultdata['total'];
    }
    else
    {
    	$Jun_resault = 0;
    }

 $Jul_first = strtotime('first day of July');
   $Jul_last = strtotime('last day of July');
   $Jul_start = date("Y-m-d", $Jul_first);
   $Jul_end = date("Y-m-d" , $Jul_last);

   $Jul_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Jul_start' AND '$Jul_end'";
   $Jul_stmt = $pdo->prepare($Jul_sql);
   $Jul_stmt->execute();
   $Jul_resaultdata = $Jul_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Jul_resaultdata)
    {
    	$Jul_resault = $Jul_resaultdata['total'];
    }
    else
    {
    	$Jul_resault = 0;
    }




     $Aug_first = strtotime('first day of August');
   $Aug_last = strtotime('last day of August');
   $Aug_start = date("Y-m-d", $Aug_first);
   $Aug_end = date("Y-m-d" , $Aug_last);

   $Aug_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Aug_start' AND '$Aug_end'";
   $Aug_stmt = $pdo->prepare($Aug_sql);
   $Aug_stmt->execute();
   $Aug_resaultdata = $Aug_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Aug_resaultdata)
    {
    	$Aug_resault = $Aug_resaultdata['total'];
    }
    else
    {
    	$Aug_resault = 0;
    }



     $Sep_first = strtotime('first day of September');
   $Sep_last = strtotime('last day of September');
   $Sep_start = date("Y-m-d", $Sep_first);
   $Sep_end = date("Y-m-d" , $Sep_last);

   $Sep_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Sep_start' AND '$Sep_end'";
   $Sep_stmt = $pdo->prepare($Sep_sql);
   $Sep_stmt->execute();
   $Sep_resaultdata = $Sep_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Sep_resaultdata)
    {
    	$Sep_resault = $Sep_resaultdata['total'];
    }
    else
    {
    	$Sep_resault = 0;
    }


     $Oct_first = strtotime('first day of October');
   $Oct_last = strtotime('last day of October');
   $Oct_start = date("Y-m-d", $Oct_first);
   $Oct_end = date("Y-m-d" , $Oct_last);

   $Oct_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Oct_start' AND '$Oct_end'";
   $Oct_stmt = $pdo->prepare($Oct_sql);
   $Oct_stmt->execute();
   $Oct_resaultdata = $Oct_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Oct_resaultdata)
    {
    	$Oct_resault = $Oct_resaultdata['total'];
    }
    else
    {
    	$Oct_resault = 0;
    }



     $Nov_first = strtotime('first day of November');
   $Nov_last = strtotime('last day of November');
   $Nov_start = date("Y-m-d", $Nov_first);
   $Nov_end = date("Y-m-d" , $Nov_last);

   $Nov_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Nov_start' AND '$Nov_end'";
   $Nov_stmt = $pdo->prepare($Nov_sql);
   $Nov_stmt->execute();
   $Nov_resaultdata = $Nov_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Nov_resaultdata)
    {
    	$Nov_resault = $Nov_resaultdata['total'];
    }
    else
    {
    	$Nov_resault = 0;
    }

     $Dec_first = strtotime('first day of December');
   $Dec_last = strtotime('last day of December');
   $Dec_start = date("Y-m-d", $Dec_first);
   $Dec_end = date("Y-m-d" , $Dec_last);

   $Dec_sql = "SELECT COALESCE(SUM(total),0) as total FROM orders WHERE orderdate between '$Dec_start' AND '$Dec_end'";
   $Dec_stmt = $pdo->prepare($Dec_sql);
   $Dec_stmt->execute();
   $Dec_resaultdata = $Dec_stmt->fetch(PDO::FETCH_ASSOC);

    if ($Dec_resaultdata)
    {
    	$Dec_resault = $Dec_resaultdata['total'];
    }
    else
    {
    	$Dec_resault = 0;
    }


   $total = array(

$Jan_resault,$Feb_resault,$Mar_resault,$Apr_resault,$May_resault,$Jun_resault,$Jul_resault,$Aug_resault,$Sep_resault,$Oct_resault,$Nov_resault,$Dec_resault
   );

   echo json_encode($total);

      ?>