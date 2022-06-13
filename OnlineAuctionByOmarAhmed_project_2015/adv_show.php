<?php // include 'header.php';?>
       <?php // include 'menu.php';?>
  
<style type="text/css">
 
  .StyleADV_Right_PAgeO_A{ border: 2px solid #6CF; border-radius: 12px; color: #666; background: #FFF; display: font-size: 55px;  padding: 6px; margin:2px 12px 4px 12px; }
</style>

  

<?php // require_once('../Connections/connection.php'); 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 




?>
<?php //require_once('Connections/connection.php'); ?>

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


mysql_select_db($database_connection, $connection);
$query_adv = "SELECT * FROM fee_adv_table WHERE web_loc='1' ORDER BY adv_id DESC";
$adv = mysql_query($query_adv, $connection) or die(mysql_error());
$row_adv = mysql_fetch_assoc($adv);
$totalRows_adv = mysql_num_rows($adv);
?>

  <?php do { ?>
  <article class="row">
    <div class="col col-md-12 ">
    <div class="StyleADV_Right_PAgeO_A">
    <h4><?php echo $row_adv['adv_name']; ?></h4>
      <hr>
      <p><a href="adv_details.php?Adv= <?php echo $row_adv['adv_id']; ?>  "  class="btn btn-primary" >
      <img src="adv_pic/<?php echo $row_adv['adv_pic']; ?>" width="300" height="300"  class="img-thumbnail img-responsive img_left" /><br></a>  </p>
      
      
   
   
      <h3><?php echo $row_adv['adv_name']; ?></h3>
      <p><?php echo $row_adv['adv_short_detail']; ?></p>
      <p>Date:<?php echo $row_adv['adv_date']; ?></p>
      
      </div>   
      
  <h4><a href="adv_details.php?Adv= <?php echo $row_adv['adv_id']; ?>  "  class="btn btn-primary StyleADV_Right_PAgeO_A" > &gt;&gt; View an Advertisement</a>
      </h4> </div>   
    <hr>
    </article>

    <?php } while ($row_adv = mysql_fetch_assoc($adv)); ?>

<?php
mysql_free_result($adv);
?>
