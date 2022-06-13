
<?php // require_once('../Connections/connection.php'); ?>





<html>
<head> </head>

<!-- <body> <body bgcolor=silver>  -->


<body bgcolor=white> 
 <meta http-equiv="refresh" content="1" >





<?php

// include("../admin/include/config.php");

$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);



$getId = intval($_GET['Id']);  /* get id from the items_table */


$query_biddetail = mysql_query("SELECT * FROM bids_table WHERE bids_auction_id ='$getId' ORDER BY bids_amount DESC");
   
    $rowbid = mysql_fetch_assoc($query_biddetail);
	 $numbid = mysql_num_rows($query_biddetail);
	 
	     $bidAmount = $rowbid['bids_amount'];

 echo 'Number of bids:<h3>'.$numbid.'</h3><hr>Auction Amount Now:<h3>'.  $bidAmount .'</h3><hr>';

// echo  $bidAmount ;



?>


</body>
<html>

