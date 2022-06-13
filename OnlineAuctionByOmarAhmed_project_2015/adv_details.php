<?php include 'header.php';?>



<style type="text/css">
 
.StyleADVPAgeO_A{ border: 2px solid #CCC; border-radius: 12px; color: #666; background: #FFF; display: font-size: 55px;  padding: 6px; margin:2px 4px 4px 6px; }
</style>
       <?php // include 'menu.php';?>
  
   <?php // include 'o_auction_header.php';?>
  

<?php // require_once('../Connections/connection.php'); 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 



?>


<?php  include 'header.php';?>
	
<?php include 'menu.php';?>

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


$colname_adv = "Adv";
if (isset($_GET['Adv'])) {
  $colname_adv = $_GET['Adv'];
}
mysql_select_db($database_connection, $connection);
$query_adv =  sprintf("SELECT * FROM fee_adv_table WHERE adv_id = %s", GetSQLValueString($colname_adv, "int"));


$adv = mysql_query($query_adv, $connection) or die(mysql_error());
$row_adv = mysql_fetch_assoc($adv);
$totalRows_adv = mysql_num_rows($adv);
?>


  <article class="row">
    <div class="col col-md-12">
        <div class="StyleADVPAgeO_A">
         <h1><strong><?php echo $row_adv['adv_name']; ?></strong></h1>
           <p> <a href="adv_pic/<?php echo $row_adv['adv_pic']; ?>">
      <img src="adv_pic/<?php echo $row_adv['adv_pic']; ?>" width="1000" height="700"  class="img-thumbnail img-responsive img_left" /><br>Show Image</a>  </p>
      
     
       
          
         
          <h4><?php echo $row_adv['adv_short_detail']; ?></h4>
         
    
   
    <p><em>Details:</em> <?php echo $row_adv['adv_detail']; ?></p>
      <p>&nbsp;</p>
           <h3><em>Owner:</em> <?php echo $row_adv['adv_owner']; ?></h3> 
         <h7><em>Date posted:</em> <?php echo $row_adv['adv_date']; ?></h7>
            <p>&nbsp;</p>
                  <p>&nbsp;</p>

    </div>
     </article>
    </div>
     
    
 <p>&nbsp;</p>
                  <p>&nbsp;</p>



<?php
mysql_free_result($adv);
?>




<?php
////////////  advertisement seen

$con=mysqli_connect("localhost", "omar", "12345",bauctionndba);
if(mysqli_connect_errno())
    echo "Failed ot connect to MySQL:". mysqli_connect_error();
	
if(  $row_adv['adv_id'] !=''){


	  	$AdvIDSeen =  $row_adv['adv_id']; 

	$UseSeenAdv = $row_adv['adv_n_seen'];
		$UseSeenAdvResul = $UseSeenAdv + 1 ;
		
		 $UpdateBrowsM_n_seen = mysqli_query($con,"UPDATE    fee_adv_table SET adv_n_seen='$UseSeenAdvResul' WHERE adv_id='$AdvIDSeen'");
  
	  


}

  ?>
  
  

	
<?php include 'footer.php';?>


		   
           