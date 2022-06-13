<div id="left_container" class="col col-md-2 col-sm-12">


<style type="text/css">
 
  .Style_O_A_InDex_PAgeO_A{ border: 1px solid #00F; border-radius: 100px; color: #00F; background: #FFF; display: font-size: 55px;  padding: 6px; margin:2px 12px 4px 12px; }
</style>

<?php 

$hostname_connection = "localhost";
$database_connection = "auction_db";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


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

$colname_show = "-1";
mysql_select_db($database_connection, $connection);

if (isset($_POST['btn_search_allTwo'])) {
	
  	$searchword = $_POST['txt_search_all'];
    $query_show = "SELECT * FROM items_table WHERE Name LIKE'%".$searchword."%' OR Id LIKE'%".$searchword."%'";

}elseif (isset($_POST['btn_search_ViewllT'])) {
	

    $query_show = "SELECT * FROM items_table WHERE Accept_Refuse='1'";


}elseif (isset($_POST['btn_search_ExpireSoon'])) {
	
//  $query_show = "SELECT * FROM items_table WHERE Accept_Refuse='1'  AND expired_date > now() ORDER BY expired_date ASC LIMIT 7 ";

  $query_show = "SELECT * FROM items_table WHERE Accept_Refuse='1'  AND expired_date > now() ORDER BY expired_date ASC";
  
//  $totalRows_show = mysql_num_rows($show);
  
}else{
	
//$nm_page =  5 ;
//    $query_show = "SELECT * FROM items_table WHERE Accept_Refuse='1' ORDER BY Id desc LIMIT 7 ";
//    $query_show = "SELECT * FROM items_table WHERE expired_date > now() ORDER BY expired_date ASC LIMIT 7 ";

 $query_show = "SELECT * FROM items_table WHERE Accept_Refuse='1' ORDER BY Id desc LIMIT 7 ";
 
}
$show = mysql_query($query_show, $connection) or die(mysql_error());
$row_show = mysql_fetch_assoc($show);






$totalRows_show = mysql_num_rows($show);
?>

  
   <?php


 if($totalRows_users =="0"){
	 echo "<h3>No such Result is found </h3>";
 }
	 else{

//  echo "Result found : ";
 echo $totalRows_users ;

?>
 
  
  




<p><a href="index.php">Latest items  </a></p>
<h6><em>Results found</em>: <?php echo $totalRows_show ?></h6>


<?php
///////s num date expire soon
if (isset($_POST['btn_search_ExpireSoon'])){
echo "<p><em>(". $totalRows_show .") auctions are going to be expired soon </p></em>";
///////s num date expire soon
}
?>

<table width="100" border="0" bordercolor="#33CCFF" cellspacing="1" cellpadding="4">
  <tr>

 <td>&nbsp;</td>

   <td><h6><em>Image</em></h6></td>
   <td><h6><em>Name</em></h6></td>
    <td><h6><em>Currancy</em></h6><h6><em>Price</em></h6></td>
    <td><h6><em>Price now</em></h6></td>
    <td><h6><em>Number of bids</em></h6></td>
     <td><h6><em>Date to expiered</em></h6></td>
     <td><h6>&nbsp;
      <p>&nbsp;</p></h6></td>



  </tr>
  <?php 
  

	  
	  
  
  
  
  do {
	  
	  
	    if ( $row_show['Accept_Refuse']=='1'){
	   ?>
   <tr>
     <td>&nbsp;</td>

      <td><h4><?php echo $row_show['Title']; ?></h4>
        <img src="upload/<?php echo $row_show['pic']; ?>" width="184" height="168" class="Style_O_A_InDex_PAgeO_A"/>
        
      </td>
      <td><h4><?php echo $row_show['Name']; ?></h4></td>
      <td><?php echo $row_show['Currency']; ?><h4><?php echo $row_show['BuyNowPrice']; ?></h4></td>
      <td>
      <p> 
        <?php

             $bid1 =$row_show['Id'];

  
mysql_select_db($database_connection, $connection);
$query_showbid = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = '$bid1' ORDER BY bids_id DESC", GetSQLValueString($colname_showbid, "int"));
$showbid = mysql_query($query_showbid, $connection) or die(mysql_error());
$row_showbid = mysql_fetch_assoc($showbid);
$totalRows_showbid = mysql_num_rows($showbid);

$queryString_show = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_show") == false && 
        stristr($param, "totalRows_show") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_show = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_show = sprintf("&totalRows_show=%d%s", $totalRows_show, $queryString_show);

        
     ?><?php if($row_showbid['bids_amount']==""){echo "Ther is no bidding yet";}else {echo $row_showbid['bids_amount'];} ?></p>
      
      </td>
      <td>
      
      
      <p>
      <?php  
$colname_Recordset1 =$row_show['Id'] ;
if (isset($_GET['Id'])) {
  $colname_Recordset1 = $_GET['Id'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = %s ORDER BY bids_id DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1); 
echo $totalRows_Recordset1." <em> Bids</em>";
 ?>
      
      </p>
      
      

      </td>
      <td><hr /><p></p><h6><em>Started date:</em></h6><?php echo $row_show['posted_date']; ?><p></p><hr />
        <p></p><h6><em>Last chance at:</em></h6><strong><?php if($row_show['expired_date']=="0"){echo "Not Specified";}else {echo $row_show['expired_date'];} ?></strong><p></p><hr /></td>
      <td>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </td>

      
    </tr>
    <tr>
   <td colspan="4"  align="right">
            <p><a href="details.php?I= <?php echo $row_show['Id']; ?>  "  class="btn btn-primary Style_O_A_InDex_PAgeO_A" >Post bid </a>
          </p>
          
     
      </td>
<td colspan="4"  align="center">

        <p><a href="details.php?I= <?php echo $row_show['Id']; ?>  "  class="btn btn-primary Style_O_A_InDex_PAgeO_A" >More details</a>
          </p>
          
     
      </td>
         
    </tr>
     <tr>
   <td colspan="8"  align="center">

        <hr />
        </td>
         
    </tr>

    <?php  } } while ($row_show = mysql_fetch_assoc($show)); } ?>
         

</table>
<p>&nbsp;</p>
<?php
mysql_free_result($show);
?>


<table width="100" border="0" bordercolor="#33CCFF" cellspacing="1" cellpadding="4" align="center">
    
                  <tr>
                        <td colspan="5" >

        <hr />
<h4> <label for="txt_search">What are you looking for ..!</label></h4></td>

                  </tr>
<tr>
<td>

       <form id="form1" name="form1" method="post" action="index.php">

</form></td><td>  <input type="text" name="txt_search_all" id="txt_search_id" /></td>
<td>  <input type="submit" name="btn_search_allTwo" id="btn_search_allT" value="Search" /></td>

                  
                  
                  
              
                  </tr>
                  
                  
                  <tr>
<td>

       <form id="form1" name="form1" method="post" action="index.php"><hr />
<h6>
عرض الكل

  <input type="submit" name="btn_search_ViewllT" id="btn_search_ViewllT" value="View All" /></h6></form></td>

                  
                  
                  
                  <td>
          
               <form id="form2" name="form1" method="post" action="index.php"> <hr />
    <h6>
               مزادات اقتربت من موعد الانتهاء
               

         <input type="submit" name="btn_search_ExpireSoon" id="btn_search_ExpireSoon" value="Auctions will Expire soon" /></h6></form></td>
 
                  
                  <hr />  
                  
       <td>
          
               <form id="form3" name="form1" method="post" action="index.php"> <hr />
    <h6>
               المزادات والاعلانات الجديدة
               

         <input type="submit" name="NonameBecauseElseCondation" id="btn_seach_Ex" value="Latest posted" /></h6></form></td>
 
                  
                  <hr />  
                  
                  </tr>
                  
                  
                  <tr>
                        <td colspan="8"  align="center">

        <hr />
        </td>
                  </tr>
                  
</table>
					<div>
			

			
            
  </div>
</div>





                   



