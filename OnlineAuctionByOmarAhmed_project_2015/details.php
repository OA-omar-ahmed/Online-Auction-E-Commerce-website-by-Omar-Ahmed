<?php

@ session_start();



?>

<?php include 'header.php';?>
<?php include 'menu.php';?>



<style type="text/css">
 
.StyleAuCPAgeO_A{ border: 2px solid #0CF; border-radius: 12px; color: #333; background: #FFF; display: font-size: 55px;  padding: 6px; margin:2px 4px 4px 6px; }
</style>
 



<?php 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR);



?>
<?php
//initialize the session
if (!isset($_SESSION)) {
 @ session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles

  $_SESSION['SESSION_Username'] = NULL;
  $_SESSION['SESSION_USER_id'] = NULL;
  $_SESSION['SESSION_user_password'] = NULL;
  unset($_SESSION['SESSION_Username']);
  unset($_SESSION['SESSION_USER_id']);
  unset($_SESSION['SESSION_user_password']);

  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
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




$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}




$colname_info = $_SESSION['SESSION_USER_id'];
if (isset($_GET['user_id'])) {
  $colname_info = $_GET['user_id'];
}


mysql_select_db($database_connection, $connection);
$query_info = sprintf("SELECT * FROM user_information_table WHERE user_id= %s", GetSQLValueString($colname_info, "text"));
$info = mysql_query($query_info, $connection) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);
$totalRows_info = mysql_num_rows($info);



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
 
 // dddddddd
 $pbids_amountbid = $_POST['bids_amount'];
 $bidamountbefore = $row_biddetail['bids_amount'];
// $pcommentbid = $_POST['Comment'];

// $pbids_amountbid= addslashes(strip_tags($_POST['bids_amount']));
$pcommentbid= addslashes(strip_tags($_POST['Comment']));
// is_numeric 
if(!is_numeric($pbids_amountbid)){
	echo"<script>alert(\"Price should be number \");</script>";
	
	/*
	}elseif(strlen($pbids_amountbid) > $bidamountbefore){
echo"<script>alert(\"Price should be the greatest  \");</script>";		
*/
	
}else{
  $insertSQL = sprintf("INSERT INTO bids_table (bids_auction_id, bids_amount, `Comment`, bids_user_id) VALUES (%s, '$pbids_amountbid', '$pcommentbid', %s)",
                       GetSQLValueString($_POST['bids_auction_id'], "int"),


                       GetSQLValueString($_POST['bids_user_id'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
echo '

<div class="head_o"> <h3><strong>Added your own price successfully  </strong></h3> </div>
';
/////// if numaric colse
}
/////// if numaric colse

}



if ((isset($_POST["MM_insert2"])) && ($_POST["MM_insert2"] == "form2")) {
  $insertSQL2 = sprintf("INSERT INTO watch_table (watch_auction_id, watch_user_id, auc_name, auc_pic) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['watch_auction_id'], "int"),
					   GetSQLValueString($_POST['watch_user_id'], "int"),
					   GetSQLValueString($_POST['auc_name'], "text"),
					   GetSQLValueString($_POST['auc_pic'], "text"));

  mysql_select_db($database_connection, $connection);
  $Result2 = mysql_query($insertSQL2, $connection) or die(mysql_error());


}
	















$colname_Recordset1 = "I";
if (isset($_GET['I'])) {
  $colname_Recordset1 = $_GET['I'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM items_table WHERE Id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);



$colname_biddetail = "";
if (isset($_GET['I'])) {
  $colname_biddetail = $_GET['I'];
}
mysql_select_db($database_connection, $connection);
$query_biddetail = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = %s ORDER BY bids_amount DESC", GetSQLValueString($colname_biddetail, "int"));
$biddetail = mysql_query($query_biddetail, $connection) or die(mysql_error());
$row_biddetail = mysql_fetch_assoc($biddetail);
$totalRows_biddetail = mysql_num_rows($biddetail);

//$wat=$row_info['user_id'];
$colname_watch = "-1";
if (isset($_GET['I'])) {
  $colname_watch = $_GET['I'];
}
mysql_select_db($database_connection, $connection);
$query_watch =sprintf( "SELECT * FROM watch_table WHERE watch_auction_id =%s ", GetSQLValueString($colname_watch, "int"));
$watch = mysql_query($query_watch, $connection) or die(mysql_error());
$row_watch = mysql_fetch_assoc($watch);
$totalRows_watch = mysql_num_rows($watch);



/////////////del watch



if ((isset($_POST['MM_del'])) && ($_POST['MM_del'] == "form3")) {
  $deleteSQL = sprintf("DELETE FROM watch_table WHERE watch_id=%s",
                       GetSQLValueString($_POST['hd_del'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());



}




////////////////////////del watch











//////////////////////// report


$colname_eported = "-1";
if (isset($_GET['I'])) {
  $colname_eported = $_GET['I'];
}
mysql_select_db($database_connection, $connection);
$query_eported_item = sprintf("SELECT * FROM reported_item WHERE re_auc_id = %s ", GetSQLValueString($colname_eported, "int"));
$sreported_item = mysql_query($query_eported_item, $connection) or die(mysql_error());
$row_reported_item = mysql_fetch_assoc($sreported_item);
$totalRows_reported_item = mysql_num_rows($sreported_item);



if ((isset($_POST["MM_insert_rep"])) && ($_POST["MM_insert_rep"] == "form4")) {


  $insert_repSQL = sprintf("INSERT INTO reported_item ( re_auc_id, re_auc_user_id, re_stat, re_user_id, re_text, re_date) VALUES (%s, %s, %s, %s, %s, now())",
                       GetSQLValueString($_POST['re_auc_id'], "int"),
					   GetSQLValueString($_POST['re_auc_user_id'], "int"),
					    GetSQLValueString($_POST['re_stat'], "int"),
					   GetSQLValueString($_POST['re_user_id'], "text"),
					 
					   GetSQLValueString($_POST['txt_repo'], "text"),
                       GetSQLValueString($_POST['re_date'], "date"));

  mysql_select_db($database_connection, $connection);
  $Result_rep = mysql_query($insert_repSQL, $connection) or die(mysql_error());
  
  
	
echo "<h1>Report send successfully</h1><h3>Thank you</h3>";

?>
<meta http-equiv="Refresh" content="4;url=http://localhost/onlineauctionweb/details.php?I=<?php echo $row_Recordset1['Id']; ?>">
<?php
  
}



?>

<?php include 'header.php';?>


<div>

  

  
     
     


<table width="100" bordercolor="#CCCCCC" border="1"  cellspacing="0" cellpadding="1" >
 <tr>

 <td colspan="5" align="center">

      
      
      
      
      
      
   
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

      
      
      
      
     <!-- start watch code --> 
     
     
           <?php
		            if(  $_SESSION['SESSION_USER_id'] == '')	  {  
					echo "<a href='login_page.php'> Login to watch this item. </a> ";
					}
		   
         if(  $_SESSION['SESSION_USER_id'] != '')	  {  ?>

    
    
    
    

<!-- watch start -->

<?php


	$id_watch_itemss =$row_Recordset1['Id'];
	$user_id_watch_itemss =  $_SESSION['SESSION_USER_id'] ;
	
	  $sel_watch_item = mysql_query("select * from watch_table where watch_auction_id='$id_watch_itemss' and watch_user_id='$user_id_watch_itemss'");
	

    $numsel_watch_item = mysql_num_rows($sel_watch_item);
      if($numsel_watch_item != 0){

		  ?>
		    <form name="form3" method="post" action="">
     
          <input type="submit" name="btn_del" id="btn_del" value="Un Watch an Auction ">
     
     
          <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_watch['watch_id']; ?>">
     

       
               <input type="hidden" name="watch_auction_id" value="<?php echo $row_Recordset1['Id']; ?>" />
        <input type="hidden" name="watch_user_id" value="<?php echo $row_info['user_id']; ?>" />
        <input type="hidden" name="MM_del" value="form3" />
       
        <td>
      </form>
  

		  <?php
		  
		  
      }else{
		  ?>
		  
             <form name="form2" method="post" action="">

        <input type="submit" value=" Watch an Auction " /class="btn btn-primary" >
        
                     <input type="hidden" name="auc_pic" value="<?php echo $row_Recordset1['pic']; ?>" />
        
             <input type="hidden" name="auc_name" value="<?php echo $row_Recordset1['Name']; ?>" />
        
        <input type="hidden" name="watch_auction_id" value="<?php echo $row_Recordset1['Id']; ?>" />
        <input type="hidden" name="watch_user_id" value="<?php echo $row_info['user_id']; ?>" />
        <input type="hidden" name="MM_insert2" value="form2" />
     
     
   </form>
  
	  
          
          
		  <?php
	  } ///close end
	 
?>

<!-- watch end -->


<hr>

        
    <hr>
      

      
      
      
      
    
      <?php } // close if SESSION_USER_id != ?>
      
      
 
      
      <!-- end watch code  -->
      
     
 </td>
  
 
  <td colspan="6" align="center" >
 
 
  
   <form name="form_Denouncement" method="post" action="">

  		
    
     
  <input class='no_o' type="submit" name="Denouncement_btn_item_detail_page" value="Denouncement" />

<?php


if ($_POST["Denouncement_btn_item_detail_page"]){
	
?>
<?php


	$id_reported_itemss =$row_Recordset1['Id'];
	$user_id_reported_itemss = $row_info['user_id'];
	
  $sel_reported_item = mysql_query("select * from reported_item where re_auc_id='$id_reported_itemss' and re_user_id='$user_id_reported_itemss'");
    $numsel_reported_item = mysql_num_rows($sel_reported_item);
      if($numsel_reported_item != 0){
		  echo "<div class='no_o'><h2>You reported this item before </h2><h3>Thank you</h3></div>";
      }else{
	 
?>
<form name="form4" method="post" action="">

  		
     <div class='no_o'> 
     
  <input type="hidden" name="re_auc_id" value="<?php echo $row_Recordset1['Id']; ?>" />
    <input type="hidden" name="re_auc_user_id" value="<?php echo $row_Recordset1['user_id']; ?>" />
      <input type="hidden" name="re_user_id" value="<?php if ($row_info['user_id'] == "")
	  {
		   echo "User not login"; 
	
	
	
	  }else{
	   
	   
	   
	   echo $row_info['user_id']; 
	  }
	   ?>" />
       
       
          <input type="hidden" name="re_stat" value="<?php if($row_reported_item['re_auc_id'] != $row_Recordset1['Id'])
	  {
		   echo "1"; 
	
	
	
	  }else{
	   
	   
	   
	   echo "2"; 
	  }
	   ?>" />
     
       
  <label for="txt_repo">Denouncement</label>
  <textarea name="txt_repo" id="txt_repo" cols="45" rows="5">Denouncement </textarea>
   <input type="submit" name="btn_repo_ok" id="btn_repo_ok" value="Submit">
   <input type="hidden" name="re_date" value="re_date" />
  
  
        <input type="hidden" name="MM_insert_rep" value="form4" />
   
      
</div>            


</form>
   	<?php
}
?>
	
    
    <?php
} // close if Denouncement_btn_item_detail_page

    
    ?>
   </form>


 </td>
 
 </tr>

  <tr>
    <td align="center"><h4>#Auction Owner ID</h4></td>
    <td align="center"><h4>image</h4></td>
    <td align="center"><h4>#Auction ID</h4></td>
    <td align="center"><h4>Name</h4></td>
    <td align="center"><h4>Currency</h4></td>
    <td align="center"><h4>Start Price</h4></td>
    <td align="center"><h4>Buy now Price</h4></td>
    <td align="center"><h4>The Price now is </h4></td>
    <td align="center"><h4>Status</h4></td>
    <td align="center"><h4>Country</h4></td>
    <td align="center"><h4>City</h4></td>

    
   
    <td align="center"><h4>Date</h4></td>
  
  </tr>
  <tr>
    <td align="center"><p><?php echo $row_Recordset1['user_id']; ?><a href='personalPage_info.php?user_id=<?php echo $row_Recordset1['user_id']; ?>'> See Owner information </a></p></td>
    <td><a href="upload/<?php echo $row_Recordset1['pic']; ?>"><img src="upload/<?php echo $row_Recordset1['pic']; ?>" width="100" height="100" /><br>Show</a></td>
    <td align="center"><p><?php echo $row_Recordset1['Id']; ?></p></td>
    <td align="center"><p><?php echo $row_Recordset1['Name']; ?></p></td>
    <td align="center"><p><?php echo $row_Recordset1['Currency']; ?></p></td>
    <td align="center"><p><?php echo $row_Recordset1['StartPrice']; ?></p></td>
    <td align="center"><p><?php echo $row_Recordset1['BuyNowPrice']; ?></p></td>
    <td align="center"><p><?php if($row_Recordset1['bids_amount']==""){echo "Ther is no bidding yet";}else {echo $row_biddetail['bids_amount'];} ?>
	</p></td>
    <td align="center"><p><?php echo $row_Recordset1['Status']; ?></p></td>
    <td align="center"><p><?php 
	
	 // echo $row_Recordset1['Country'];
	 
	 //////////////////////// no need//////////////////////
	echo "<h4>". $row_Recordset1['Country'] ."</h4>";
	//////////////////////// no need//////////////////////
	
$countryloc = $row_Recordset1['loc_id'];
/*
		$sCountryLoc =mysql_query("select * from location where lid='$countryloc' ");
	
	$rCountryLoc = mysql_fetch_assoc($sCountryLoc);

    $nameCountryLoc = $rCountryLoc['name_loc'];
	echo "<h4>$nameCountryLoc</h4>";
	
	*/
	
	 ?></p></td>
    <td align="center"><p><?php 
	if($row_Recordset1['loc_detail']!=""){
		echo "<p>" . $row_Recordset1['loc_detail'] ; 
	}elseif($row_Recordset1['City'] !=""){
		
		echo  "<p>". $row_Recordset1['City'];
	}else{
		echo "<p>Address not Specified</p>";
	}
	
	
	
	 ?></p></td>

    

    <td align="center"><p><em>Started date:</em></p><p><?php echo $row_Recordset1['posted_date']; ?></p>
   
      
      <p><strong> <?php // echo $row_Recordset1['expired_date']; ?></strong></p></td>
  
  </tr>
 
  <tr>
<td colspan="13" >

<?php
$Aiction_or_item_id =  $row_Recordset1['Id'];
$au_expired_date = $row_Recordset1['expired_date'];
 $future =  strtotime( $au_expired_date );
if($future <= time() ){
	echo "As an advertisement";
}else{
echo "Auction closed at: ";

echo "<iframe src='time_re.php?Id=$Aiction_or_item_id' width=20 height=80 frameborder=0 scrolling=no>
</iframe>

 ";
}
 
?>
       
</td>

 </tr>      
      
      
      
      
<hr>

  <tr>

<td colspan="13" class="bodypanel_o StyleAuCPAgeO_A"><h4>Description: <hr><br></h4>
<?php echo $row_Recordset1['Description']; ?><br><br><hr></td>
  
  </tr>

</table>


<hr>

        
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      


   


 
<p>&nbsp;</p>




















 

<table width="100" border="1" cellspacing="0" cellpadding="0">
 <tr class="btn btn-primary">
 

 <td colspan="3" align="center">


<p><a href="details.php?I= <?php echo $row_Recordset1['Id']; ?>  "  class="btn btn-primary" > <img src="images/refreshIcon.png" alt="Follow us on Twitter"  width="25" height="25" > Refresh to see last bids</a>
          </p>
</td>

</tr>

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





  <?php
		 
if ($row_info['user_id'] != $row_Recordset1['user_id']){
	
		 
	
			 $id_seen = $row_Recordset1['Id'];
			 $num_seen = $row_Recordset1['n_seen'];
			 $num_seen_total = $num_seen + 1 ;
			$updatenum_seen_total = "UPDATE  items_table SET n_seen='$num_seen_total' WHERE Id='$id_seen'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updatenum_seen_total, $connection) or die(mysql_error());
			
			
			  
		  }
		  
		  ?>

<hr>
<p>&nbsp;</p>



<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">



  <table align="center">
    <tr valign="baseline">
 <td nowrap="nowrap" align="right"> 
 
 
 
 <h2><strong> 
 
 
 
 <?php


if ($row_info['user_id']==""){echo "<a href='login_page.php' >Login </a><p>if you want to post bid</p>";
die();} 




if ($row_info['user_id']== $row_Recordset1['user_id']){echo "You are not Allow to post bid, because this is your Item";
die();} 

else if ($row['user_id']!=$row_info['user_id']){echo 'Status of the Auction now';} 
echo  $row['user_id'];?></strong></h2>
 

 <p>Currency: <?php echo $row_Recordset1['Currency']; ?></p>
 
 </td>
</tr>
<tr valign="baseline">
 <td nowrap="nowrap" align="right">
<?php


$bidShowAutoRefreshInshallah =  $row_Recordset1['Id'];



echo "<iframe src='ShowBidAutoRefresh.php?Id=$bidShowAutoRefreshInshallah' width=80 height=200 frameborder=0 scrolling=no>
</iframe>";

?>

  

</td>
</tr>
<tr valign="baseline">

     <td nowrap="nowrap" align="right"> <p>&nbsp;</p><h4>Bids_amount: </h4>
     <p>Currency: <?php echo $row_Recordset1['Currency']; ?></p>
     
     </td>
      <td>
      <h2>Add your own price: </h2>
      <input type="text" name="bids_amount" value=""  placeholder="Your own price"   size="32" /></td>
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
<p>&nbsp;</p></div>

 		
   
   

<?php

mysql_free_result($info);

mysql_free_result($Recordset1);


mysql_free_result($biddetail);

mysql_free_result($watch);

mysql_free_result($sreported_item);
?>






<?php include 'footer.php';?>


