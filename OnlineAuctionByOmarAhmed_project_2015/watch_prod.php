<?php 



@ session_start();


?>





<?php include 'header.php';?>

       <?php // include 'menu.php';?>
                    <?php   include 'watch_prodList.php';?>

                  <?php // include 'watch_prodListMenu.php';?>

  

<style type="text/css">
 
.StyleADVPAgeWatcHO_A{ border: 2px solid #0CF; border-radius: 12px; color: #999; background: #FFF; display: font-size: 55px;  padding: 6px; margin:2px 4px 4px 6px; }

</style>


     

                 
                 	

    <div class="StyleADVPAgeWatcHO_A">



<?php // require_once('../Connections/connection.php');

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR);
?>



<?php // include 'header.php';?>

<?php // include 'menu.php';?>

 

<?php // include 'o_auction_header.php';?>

<br>
 <?php 

if($_SESSION['SESSION_Username']==''){
	
	echo "<h1>You should login please</h1>";
	
	
	 echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/login_page.php">';
	
exit;}
	
			$_SESSION['SESSION_USER_id'];

?>



      
  <?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_POST['hd_del'])) && ($_POST['hd_del'] != "")) {
  $deleteSQL = sprintf("DELETE FROM watch_table WHERE watch_id=%s",
                       GetSQLValueString($_POST['hd_del'], "int"));

  mysql_select_db($database_connection, $connection);
  $ResultDelete = mysql_query($deleteSQL, $connection) or die(mysql_error());
if($ResultDelete){
			  echo"<div class='ok_o'> <h2>Watching stopped</h2> </div>";

echo ' <meta http-equiv="refresh" content="1" >';	

}



}

$colname_info = $_SESSION['SESSION_Username'];
if (isset($_GET['username'])) {
  $colname_info = $_GET['username'];
}

mysql_select_db($database_connection, $connection);
$query_info = sprintf("SELECT * FROM  user_information_table WHERE username = %s", GetSQLValueString($colname_info, "text"));
$info = mysql_query($query_info, $connection) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);
$totalRows_info = mysql_num_rows($info);


$p=$row_info['user_id'];
$maxRows_watch = 1;
$pageNum_watch = 0;
if (isset($_GET['pageNum_watch'])) {
  $pageNum_watch = $_GET['pageNum_watch'];
}
$startRow_watch = $pageNum_watch * $maxRows_watch;

$colname_watch = "-1";
/*if (isset($_GET['$p'])) {
  $colname_watch = $_GET['$p'];
}*/

mysql_select_db($database_connection, $connection);

$pUSERSEess=$_SESSION['SESSION_USER_id'];
/////////////s post
/*if ($_POST['po_watchinuserpage']){

$po_watchinuserpagepo= $_POST['po_watchinuserpage'] 

$query_watch ="SELECT * FROM watch_table WHERE watch_id='$po_watchinuserpagepo' AND watch_user_id='$pUSERSEess'";

}*/
// else{
	
$query_watch ="SELECT * FROM watch_table WHERE watch_user_id= '$pUSERSEess' ORDER BY watch_id DESC";
//}
/////////////e post
$query_limit_watch = sprintf("%s LIMIT %d, %d", $query_watch, $startRow_watch, $maxRows_watch);


$watch = mysql_query($query_limit_watch, $connection) or die(mysql_error());


$row_watch = mysql_fetch_assoc($watch);

/*

$p=$row_info['user_id'];
$maxRows_watch = 1;
$pageNum_watch = 0;
if (isset($_GET['pageNum_watch'])) {
  $pageNum_watch = $_GET['pageNum_watch'];
}
$startRow_watch = $pageNum_watch * $maxRows_watch;

$colname_watch = "-1";
if (isset($_GET['$p'])) {
  $colname_watch = $_GET['$p'];
}
mysql_select_db($database_connection, $connection);
$query_watch = "SELECT * FROM watch_table WHERE watch_user_id = '$p' ORDER BY watch_id DESC";
$query_limit_watch = sprintf("%s LIMIT %d, %d", $query_watch, $startRow_watch, $maxRows_watch);


$watch = mysql_query($query_limit_watch, $connection) or die(mysql_error());


$row_watch = mysql_fetch_assoc($watch);

*/
if (isset($_GET['totalRows_watch'])) {
  $totalRows_watch = $_GET['totalRows_watch'];
} else {
  $all_watch = mysql_query($query_watch);
  $totalRows_watch = mysql_num_rows($all_watch);
}
$totalPages_watch = ceil($totalRows_watch/$maxRows_watch)-1;




$auc = $row_watch['watch_auction_id'];

$maxRows_sellauc = 10;
$pageNum_sellauc = 0;
if (isset($_GET['pageNum_sellauc'])) {
  $pageNum_sellauc = $_GET['pageNum_sellauc'];
}
$startRow_sellauc = $pageNum_sellauc * $maxRows_sellauc;

$colname_sellauc = "-1";
if (isset($_GET['Id'])) {
  $colname_sellauc = $_GET['Id'];
}
mysql_select_db($database_connection, $connection);
$query_sellauc = "SELECT * FROM items_table WHERE Id = '$auc'";
$query_limit_sellauc = sprintf("%s LIMIT %d, %d", $query_sellauc, $startRow_sellauc, $maxRows_sellauc);
$sellauc = mysql_query($query_limit_sellauc, $connection) or die(mysql_error());
$row_sellauc = mysql_fetch_assoc($sellauc);






$colname_biddetail = "-1";
if (isset($_GET['bids_auction_id'])) {
  $colname_biddetail = $_GET['bids_auction_id'];
}
mysql_select_db($database_connection, $connection);
$query_biddetail = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = '$auc' ORDER BY bids_amount DESC", GetSQLValueString($colname_biddetail, "int"));
$biddetail = mysql_query($query_biddetail, $connection) or die(mysql_error());
$row_biddetail = mysql_fetch_assoc($biddetail);
$totalRows_biddetail = mysql_num_rows($biddetail);







if (isset($_GET['totalRows_sellauc'])) {
  $totalRows_sellauc = $_GET['totalRows_sellauc'];
} else {
  $all_sellauc = mysql_query($query_sellauc);
  $totalRows_sellauc = mysql_num_rows($all_sellauc);
}
$totalPages_sellauc = ceil($totalRows_sellauc/$maxRows_sellauc)-1;

$queryString_watch = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_watch") == false && 
        stristr($param, "totalRows_watch") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_watch = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_watch = sprintf("&totalRows_watch=%d%s", $totalRows_watch, $queryString_watch);


$connectdb = mysql_connect('localhost','omar','12345') or die ("not connect");
$selectdb=mysql_select_db('bauctionndba',$connectdb)or die("not selected database");

//include("checkstatus.php");



//include("connection.php");
//include("header.php");
echo"<h2> The items you are Watching </h2>";

?>
       

  <a href="index.php">Home</a> >>   <a href="personal_page.php"> Personal page </a> >>  <a href="watch_prod.php"> Watching page.</a> 
                 
Welcome <?php echo $row_info['user_f_name']; ?> (<?php echo $_SESSION['SESSION_Username']; ?>) to your Watching Page.
<a href="watch_prod.php?I= <?php echo $row_sellauc['Id']; ?>  "  class="btn btn-primary" > <img src="images/refreshIcon.png" alt="Follow us on Twitter"  width="25" height="25" > Refresh </a> or 
                 
                    <a href="logout_page.php" class="btn btn-primary" >Logout</a>            
<hr>
<?php
	if ($row_watch['watch_id']==""){
		echo "<h2>You are not watching any items</h2>";
	}else{
?>





<table width="392" height="175" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CCFF">
  <tr class="head_o">
 

 <td colspan="14" align="center">
  Records <?php echo ($startRow_watch + 1) ?> to <?php echo min($startRow_watch + $maxRows_watch, $totalRows_watch) ?> of <?php echo $totalRows_watch ?></p>
 
    <h4>
<a href="<?php printf("%s?pageNum_watch=%d%s", $currentPage, max(0, $pageNum_watch - 1), $queryString_watch); ?>"class="btn btn-primary"> &lt;&lt;  Back</a> <a href="<?php printf("%s?pageNum_watch=%d%s", $currentPage, min($totalPages_watch, $pageNum_watch + 1), $queryString_watch); ?>" class="btn btn-primary">Next &gt;&gt;</a></div></h4>
  </td>
  </tr>
    <tr>

    <td><p><em><strong>Auction ID<?php echo $row_watch['watch_auction_id']; ?> </strong></em></p></td>
    <td><p><em><strong>Pic</strong></em></p></td>
    <td><p><em><strong>Name</strong></em></p></td>
    <td><p><em><strong>Start Price</strong></em></p></td>
    <td><p><em><strong>Currency</strong></em></p></td>
    <td><p><em><strong>Buy the item now Price</strong></em></p></td>
    <td><p><em><strong>Bidder information</strong></em></p></td>
 
    <td><p><em><strong>Started Date</strong></em></p></td>
    <td><p><em><strong>Expired date</strong></em></p></td>

    <td><p><em><strong>Number of bids</strong></em></p></td>
    <td><p><em><strong>Maximum bidding Price</strong></em></p></td>
    <td><p><em><strong>Last bidder</strong></em></p></td>
    <td><p><em><strong>Bidder Comment</strong></em></p></td>
  
  </tr>
  <?php do { ?>
    <tr>
      <td><p><?php echo $row_sellauc['user_id']; ?></p></td>
      <td><p><?php echo $row_sellauc['Id']; ?></p></td>
     <?php 
	  if( $row_sellauc['pic'] !=""){
			
	

	  
	  ?>
      <td><img src="upload/<?php echo $row_sellauc['pic']; ?>" width="100" height="100" alt="omar" /></td>
     
     <?php
	  }else{
	 ?>
      <td><img src="upload/<?php echo $row_watch['auc_pic']; ?>" width="100" height="100" alt="omar" /></td>
      <?php
	  }
	 ?>
     
      <td><p><?php 
	  if( $row_sellauc['Name'] !=""){
			 echo $row_sellauc['Name'];
	

	  
	  ?></p></td>
      <td><p><?php echo $row_sellauc['StartPrice']; ?></p></td>
      <td><p><?php echo $row_sellauc['Currency']; ?></p></td>
      <td><p><?php echo $row_sellauc['BuyNowPrice']; ?></p></td>
    
    
      <td><p><?php echo $row_sellauc['posted_date']; ?></p></td>
      <td><p><?php echo $row_sellauc['expired_date']; ?> Day after <?php echo $row_sellauc['posted_date']; ?></p></td>
      <td><p><em><a href="details.php?I=<?php echo $row_sellauc['Id']; ?>">More Details</a></em></p></td>
      <td><p>
      <?php  
$colname_Recordset1 =$row_sellauc['Id'] ;
if (isset($_GET['Id'])) {
  $colname_Recordset1 = $_GET['Id'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = %s ORDER BY bids_id DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1); 
echo $totalRows_Recordset1;
if ($totalRows_Recordset1 != 0)
{
echo " </p></td>";

 ?>
    
      <td><p><?php echo $row_Recordset1['bids_amount']; ?></p></td>
      
      <td><p><?php echo $row_Recordset1['Comment']; ?></p></td>
     <?php
	 		
			
		
}
	 
	 ?>
	 <?php
		  
	  }else{
		  echo "<h3>".$row_watch['auc_name']."</h3>";
		  echo "<td colspan='9' class='no_o'><p>This item <strong>deleted</strong> or <strong>sold</strong></p></td>";
		  
		  
		   		
			
		
}
	 
	 ?>
	 
     
	  <td><form name="form1" method="post" action="">
        <p>
          <input type="submit" name="btn_del" id="btn_del" value="Un Watch">
        </p>
		
        <p>
          <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_watch['watch_id']; ?>">
        </p>
      </form></td>
    </tr>
   <p> <?php } while ($row_watch = mysql_fetch_assoc($watch)); ?>

</table>



<p>Records <?php echo ($startRow_watch + 1) ?>  of <?php echo $totalRows_watch ?></p>
<p><a href="watch_prod.php">Go to the first Auction</a>

<a href="<?php printf("%s?pageNum_watch=%d%s", $currentPage, max(0, $pageNum_watch - 1), $queryString_watch); ?>"class="btn btn-primary"> < Previous</a> <a href="<?php printf("%s?pageNum_watch=%d%s", $currentPage, min($totalPages_watch, $pageNum_watch + 1), $queryString_watch); ?>" class="btn btn-primary">Next > </a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>






<table width="100" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><h4> Bidder ID </h4></td>
    <td><h4> Amount </h4></td>
    <td align="center"><h4> Comment </h4></td>
  </tr>
  <?php 
 if($row_biddetail['bids_amount']==""){echo "<p>Ther is no bidding yet</p>";

  
  }
else 
{

  
  do { ?>
    <tr>
      <td><p><?php echo $row_biddetail['bids_user_id']; ?></p></td>
      <td><p><?php echo $row_biddetail['bids_amount']; ?></p></td>
      <td><p><?php echo $row_biddetail['Comment']; ?></p></td>
     
    </tr>
    <?php }  while ($row_biddetail = mysql_fetch_assoc($biddetail)); }?>
</table>








<p>&nbsp;</p>
<p>&nbsp;</p>
<p>

<?php
	}

?>

</p>
<p>&nbsp;</p>
<p>&nbsp;</p>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <p>&nbsp;</p>
                  <p>
                    <?php

mysql_free_result($info);

mysql_free_result($biddetail);

mysql_free_result($watch);

mysql_free_result($sellauc);




?>
                    
                  </p>
                  </div>
                      
                  
                  <?php   include 'footer.php';?>
