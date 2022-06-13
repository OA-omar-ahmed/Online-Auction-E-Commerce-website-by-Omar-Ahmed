<?php   include("admin_session.php");  


?>



                   
      <?php
	  
	  @ session_start();
	  
     $_SESSION['SESSION_admin_id'] ;
			 		   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];


	 // echo"(ID: <h6> $sessionIdAuth </h6> ) ";
    // include("../admin/include/config.php");
 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordAcc = 'AdminEditAdvertisement';
    $seAuthQueAcc = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWordAcc ."%' "); 
    $nAuthSelQuerAcc = mysql_num_rows($seAuthQueAcc);
    $rowAuthSAcc = mysql_fetch_assoc($seAuthQueAcc);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerAcc != 1 ) {
				  echo"<div class='no_o'> <h1>You are not authorized .</h1> </div>";

	echo'<meta http-equiv="Refresh" content="5;url=http://localhost/onlineauctionweb/admin/adv.php">';
	exit;}
		?>
        
  
<p>&nbsp;</p>

<?php // require_once('../Connections/connection.php'); 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE fee_adv_table SET web_loc=%s,  adv_pic=%s, adv_name=%s, adv_detail=%s, adv_owner=%s, admin_notes=%s WHERE adv_id=%s",
                       GetSQLValueString($_POST['webLocation'], "int"),
					 
					   GetSQLValueString($_POST['adv_pic'], "text"),
					   GetSQLValueString($_POST['adv_name'], "text"),
                       GetSQLValueString($_POST['adv_detail'], "text"),
                       GetSQLValueString($_POST['adv_owner'], "text"),
                       GetSQLValueString($_POST['admin_notes'], "text"),
                       GetSQLValueString($_POST['hd_adv_id_edit'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
if($updateSQL){
echo "<h1>Alhamdolelah ADVERTISEMENT Updated successfully </h1>";
	echo'<meta http-equiv="Refresh" content="5;url=http://localhost/onlineauctionweb/admin/adv.php">';
	
}
}

$colname_adv_edit = "-1";
if (isset($_POST['hd_edit'])) {
  $colname_adv_edit = $_POST['hd_edit'];
}
mysql_select_db($database_connection, $connection);
$query_adv_edit = sprintf("SELECT * FROM fee_adv_table WHERE adv_id = %s", GetSQLValueString($colname_adv_edit, "int"));
$adv_edit = mysql_query($query_adv_edit, $connection) or die(mysql_error());
$row_adv_edit = mysql_fetch_assoc($adv_edit);
$totalRows_adv_edit = mysql_num_rows($adv_edit);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p><hr /></p>
<?php  include 'head_admin.php';?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr />
<strong>Information</strong>
		  
<p>As One (Stoped == 0)</p>
	   
<p>As two (Right (Home page only)== 2)</p>
<p>As two (Left (Most pages)== 1)</p>

<p>As three (left== 31)</p>      
<p>As three (Middle== 32)</p>
<p>As three (Right== 33)
		
	  
	  
	  
<hr>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Upate page</p>
<p>Adv_ID:<?php echo $row_adv_edit['adv_id']; ?></p>
<p>Adv_Date:<?php echo $row_adv_edit['adv_date']; ?></p>
<form id="form2" name="form2" method="POST" action="<?php echo $editFormAction; ?>">
  <p>
    <input name="hd_adv_id_edit" type="hidden" id="hd_adv_id_edit" value="<?php echo $row_adv_edit['adv_id']; ?>" />
  </p>
  <p>&nbsp;</p>
  <table width="100" border="1" cellspacing="0" cellpadding="0">
  
  
     <tr>
      <td>Web Location</td>
      <td><label for="webLocation"></label>
        <input name="webLocation" type="text" id="web_loc" value="<?php echo $row_adv_edit['web_loc']; ?>" /></td>
    </tr>
    
     <tr>
      <td>Adv status:
       <?php 
		echo "(";
		
		echo $row_adv_edit['adv_status'];
		echo ")";
	  if($row_adv_edit['adv_status']== 0){

	  echo "<h4>OFF</h4>"; 
	  }else{
		 echo "<h4>ON</h4>";   
		  
	  }
	  
	  
	  ?>
      
      </td>
     
       
    </tr>
    
  <tr>
      <td>Adv Photo</td>
      <td><label for="adv_name3"></label>
        <input name="adv_pic" type="text" id="adv_pic" value="<?php echo $row_adv_edit['adv_pic']; ?>" /></td>
    </tr>
    <tr>
      <td>adv_name</td>
      <td><label for="adv_name3"></label>
        <input name="adv_name" type="text" id="adv_name3" value="<?php echo $row_adv_edit['adv_name']; ?>" /></td>
    </tr>
    <tr>
      <td>adv_detail</td>
      <td><label for="adv_detail"></label>
        <textarea name="adv_detail" rows="7" id="adv_detail"><?php echo $row_adv_edit['adv_detail']; ?></textarea></td>
    </tr>
    <tr>
      <td>adv_owner</td>
      <td><label for="adv_owner"></label>
        <input name="adv_owner" type="text" id="adv_owner" value="<?php echo $row_adv_edit['adv_owner']; ?>" /></td>
    </tr>
    
    <tr>
      <td>admin_notes</td>
      <td><label for="admin_notes"></label>
        <input name="admin_notes" type="text" id="admin_notes" value="<?php echo $row_adv_edit['admin_notes']; ?>" /></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_edit" id="btn_edit" value="UPDATE" /></td>
    </tr>
  </table>
  <p></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <input type="hidden" name="MM_update" value="form2" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($adv_edit);
?>
