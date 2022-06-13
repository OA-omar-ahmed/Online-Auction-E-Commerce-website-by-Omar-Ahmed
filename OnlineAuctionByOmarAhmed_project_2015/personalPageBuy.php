

<?php
if (!isset($_SESSION)) {
@  session_start();
}
$user_id = $_SESSION['SESSION_Username'];

$user_NameSession = $_SESSION['SESSION_Username'];

$_SESSION['SESSION_USER_id'] ;
	  $_SESSION['SESSION_Username'] ;
	  $_SESSION['SESSION_user_email'] ;
?>


<?php include 'header.php';?>
       <?php include 'menu.php';?>
    
    
    
   <?php // include 'o_auction_header.php';?>
  
     
<?php  
$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


?>







<br/>

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


$colname_info = $_SESSION['SESSION_Username'];
if (isset($_GET['username'])) {
  $colname_info = $_GET['username'];
}


mysql_select_db($database_connection, $connection);
$query_info = sprintf("SELECT * FROM user_information_table WHERE username = %s", GetSQLValueString($colname_info, "text"));
$info = mysql_query($query_info, $connection) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);
$totalRows_info = mysql_num_rows($info);



$p=$row_info['user_id'];
$maxRows_sellauc = 10;
$pageNum_sellauc = 0;
if (isset($_GET['pageNum_sellauc'])) {
  $pageNum_sellauc = $_GET['pageNum_sellauc'];
}
$startRow_sellauc = $pageNum_sellauc * $maxRows_sellauc;

$colname_sellauc = "-1";
if (isset($_GET['user_id'])) {
  $colname_sellauc = $_GET['user_id'];
}
mysql_select_db($database_connection, $connection);
$query_sellauc = "SELECT * FROM items_table WHERE user_id = '$p'";
$query_limit_sellauc = sprintf("%s LIMIT %d, %d", $query_sellauc, $startRow_sellauc, $maxRows_sellauc);
$sellauc = mysql_query($query_limit_sellauc, $connection) or die(mysql_error());
$row_sellauc = mysql_fetch_assoc($sellauc);

if (isset($_GET['totalRows_sellauc'])) {
  $totalRows_sellauc = $_GET['totalRows_sellauc'];
} else {
  $all_sellauc = mysql_query($query_sellauc);
  $totalRows_sellauc = mysql_num_rows($all_sellauc);
}
$totalPages_sellauc = ceil($totalRows_sellauc/$maxRows_sellauc)-1;




$bid=$row_info['user_id'];


mysql_select_db($database_connection, $connection);
$query_bidbuy = sprintf("SELECT * FROM bids_table WHERE bids_user_id = '$bid' ORDER BY bids_id DESC", GetSQLValueString($colname_bidbuy, "int"));
$bidbuy = mysql_query($query_bidbuy, $connection) or die(mysql_error());
$row_bidbuy = mysql_fetch_assoc($bidbuy);
$totalRows_bidbuy = mysql_num_rows($bidbuy);



?>


  <?php 

if($_SESSION['SESSION_Username']==''){
	
	echo "<h1>You should login please</h1>";
	
	
echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/login_page.php">';
	
}else{
	


?>



<style type="text/css">
body table {
	text-align: center;
}
</style>




<a href="index.php">Home</a> >>   <a href="personal_page.php"> Personal page </a> >>  <a href="personalPageBuy.php"> My bidding page.</a> 

<pre>Wellcome {<?php echo $row_info['user_f_name']; ?>  <?php echo $row_info['user_l_name']; ?>} (<?php echo $user_id; ?>) to Personal Page willing to Buy</pre>

<hr>
<?php 
if ($row_bidbuy['bids_user_id']==""){
	
	echo "<h2>You are not buying any items</h2>";
	
}
else{

?>

<h6>Your last bid (only last bid will be shown.)</h6>
<table width="100" border="10"  align="center" bordercolor=" rgba(70, 100, 200, 0.3)" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><h3><em>(<?php echo $row_info['user_id']; ?>){<?php echo $row_info['user_f_name']; ?>, <?php echo $row_info['user_l_name']; ?>} as buyer.</em></h3></td>
  </tr>
  <tr>
    <td><h4>My ID .no</h4></td>
    <td><p><?php echo $row_bidbuy['bids_user_id']; ?></p></td>
  </tr>
  <tr>
    <td><h4>Bids_Id</h4></td>
    <td><p><?php echo $row_bidbuy['bids_id']; ?></p></td>
  </tr>
  <tr>
    <td><h4>Bids Auction Id</h4><p><?php echo $row_bidbuy['bids_auction_id']; ?></p></td>
    <td>
    <p>
    <?php 
	
	
// include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);



    $giddbuy = $row_bidbuy['bids_auction_id'];
    $sedbuy = mysql_query("select * from items_table where Id='$giddbuy'");
    $rowdbuy = mysql_fetch_assoc($sedbuy);
	$numsedbuy = mysql_num_rows($sedbuy);
	
	 $namedpic = $rowdbuy['pic'];
	$id_dbuy = $rowdbuy['Id'];
	 $namedbuy = $rowdbuy['Name'];
	
	
//    echo $namedbuy ;
  
  
    
    
    if($numsedbuy == 0 or $numsedbuy <0) {	

echo "<div class='bodypanel_o'><h4>This item deleted or sold</h4>";	

    }else{
  
  echo"
	<div class='bodypanel_o'>
	<a href='details.php?I=$id_dbuy'> <img src='upload/$namedpic'  width='200' height='200' >  Name: <strong> $namedbuy </strong>  <p> </div  ";

?>

 </p>
    <p><a href="details.php?I=<?php echo $row_bidbuy['bids_auction_id']; ?>" class="btn btn-primary ">More Details</a> </p>
   


<?php



}
    
    
	?>
    
    
    
    </td>
  </tr>
  <tr>
    <td><h4>Bids_Amount</h4></td>
    <td><p><?php echo $row_bidbuy['bids_amount']; ?></p></td>
  </tr>
  <tr>
    <td><h4>Comment</h4></td>
    <td><p><?php echo $row_bidbuy['Comment']; ?></p></td>
  </tr>
 
</table>
<p>&nbsp;</p>
<hr>
<p>Post Bid for this Auction: </p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
 <td nowrap="nowrap" align="right"> 
 
 
 
 <h2><strong> <?php
if ($row_info['user_id']==$row_Recordset1['user_id']){echo "You are not Allow to post bid, because this is your Item";
die();} else if ($row['user_id']!=$row_info['user_id']){echo 'Add your own price:';} 
echo  $row['user_id'];?></strong></h2>
 
 
 
 
 </td>
</tr>
<tr valign="baseline">
     <td nowrap="nowrap" align="right"><h4>Bids_amount: </h4></td>
      <td><input type="text" name="bids_amount" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><h4>Comment: </h4></td>
      <td><textarea name="Comment" cols="32" rows="5">Phone: <?php echo $row_info['user_phone']; ?> 
      
      ###
      
E-mail: <?php echo $row_info['user_email']; ?> </textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Post Bid" /class="btn btn-primary" ></td>
    </tr>
  </table>
  <input type="hidden" name="bids_auction_id" value="<?php echo $row_Recordset1['Id']; ?>" />
  <input type="hidden" name="bids_user_id" value="<?php echo $row_info['user_id']; ?>" />
  <input type="hidden" name="MM_insert" value="form1" />
  <hr>
</form>

<p>&nbsp;</p>
<?php
}
?>
<p>&nbsp;</p>







<?php
mysql_free_result($bidbuy);
?>



<?php
mysql_free_result($sellauc);
?>


<?php
}

?>



<?php include 'footer.php';?>




