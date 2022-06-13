
<?php // include 'admin_session.php';?>

<html>
<head>


	<link href="o_ad_style.css" rel="stylesheet" type="text/css">
   
   
   
</head>

<body>

<p>&nbsp;</p>
<p>&nbsp;</p>
<hr/>



<div id="navbarad">



                <ul>

                  <li><a href="setting.php">Setting</a></li>
<li><a href="../index.php">O_Auction(Home)</a></li>

<li><a href="reported_items.php">Reports items</a></li>

<li><a href="adv.php">Control fee ADVERTISEMENTS</a></li>

<li><a href="list.php">Control free ADVERTISEMENTS / Auctions </a></li>  

<li><a href="contact_us_admin_recived_page.php">Contact us Messages


<?php


// include("./include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


$unredMessages = 0 ;


    $selectUnreadHeadr = mysql_query("SELECT * FROM  contact_us_table WHERE ch='0'"); 
    $numselectUnreadHeadr = mysql_num_rows($selectUnreadHeadr);



echo '<strong> (' . $numselectUnreadHeadr . ') </strong>';
 
	
?>



</a></li>



<li><a href="admin_logout.php">Log out</a></li>
                </ul>
                  </div>


<hr/>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>






 <form action="list.php" method="post">
 
 Search in auctions 
  <input type="text" name="txt_search" id="txt_search" />
  <input type="submit" name="btn_search" id="btn_search" value="Search in items" >
 
<hr><hr><hr>
</form>




<p>&nbsp;</p>
<p>&nbsp;</p>
