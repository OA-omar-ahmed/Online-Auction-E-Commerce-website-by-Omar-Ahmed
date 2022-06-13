<?php  include("admin_session.php");  ?>

<?php // include 'admin_session.php';?>

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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE items_table SET Accept_Refuse=%s, Name=%s, `Currency`=%s, StartPrice=%s, BuyNowPrice=%s, Status=%s, Country=%s, City=%s WHERE Id=%s",
                       GetSQLValueString($_POST['auc_acc'], "int"),
                       GetSQLValueString($_POST['txt_name'], "text"),
                       GetSQLValueString($_POST['txt_Currency'], "text"),
                       GetSQLValueString($_POST['txt_StartPrice'], "int"),
                       GetSQLValueString($_POST['txt_BuyNowPrice'], "int"),
                       GetSQLValueString($_POST['txt_Status'], "text"),
                       GetSQLValueString($_POST['txt_Country'], "text"),
                       GetSQLValueString($_POST['txt_City'], "text"),
                       GetSQLValueString($_POST['txt_AuctionID'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

	echo'<h2>Item Updated Successfully</h2><meta http-equiv="Refresh" content="3;url=http://localhost/onlineauctionweb/admin/list.php">';}

$colname_edit = "-1";
if (isset($_POST['hd_edit'])) {
  $colname_edit = $_POST['hd_edit'];
}
mysql_select_db($database_connection, $connection);
$query_edit = sprintf("SELECT * FROM items_table WHERE Id = %s", GetSQLValueString($colname_edit, "int"));
$edit = mysql_query($query_edit, $connection) or die(mysql_error());
$row_edit = mysql_fetch_assoc($edit);
$totalRows_edit = mysql_num_rows($edit);
?>



<?php  include("head_admin.php"); ?>


  <h1>Welcome :<?php echo $adminname; ?></h1>

  <p>&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p>
    <label for="txt_AuctionID">AuctionID</label>
    <input name="txt_AuctionID" type="text" id="txt_AuctionID" value="<?php echo $row_edit['Id']; ?>" />
  </p>
  <p>
    <label for="txt_name">Name</label>
    <input name="txt_name" type="text" id="txt_name" value="<?php echo $row_edit['Name']; ?>" />
  </p>
  <p>
    <label for="txt_Currency">Currency</label>
    <input name="txt_Currency" type="text" id="txt_Currency" value="<?php echo $row_edit['Currency']; ?>" />
  </p>
  <p>
    <label for="txt_StartPrice">StartPrice</label>
    <input name="txt_StartPrice" type="text" id="txt_StartPrice" value="<?php echo $row_edit['StartPrice']; ?>" />
  </p>
  <p>
    <label for="txt_BuyNowPrice">BuyNowPrice</label>
    <input name="txt_BuyNowPrice" type="text" id="txt_BuyNowPrice" value="<?php echo $row_edit['BuyNowPrice']; ?>" />
  </p>
  <p>
    <label for="txt_Status">Status</label>
    <input name="txt_Status" type="text" id="txt_Status" value="<?php echo $row_edit['Status']; ?>" />
  </p>
  <p>
    <label for="txt_Country">Country</label>
    <input name="txt_Country" type="text" id="txt_Country" value="<?php echo $row_edit['Country']; ?>" />
  </p>
  <p>
    <label for="txt_City">City</label>
    <input name="txt_City" type="text" id="txt_City" value="<?php echo $row_edit['City']; ?>" />
  </p>
  <p>&nbsp;</p>
  <table width="200">
    <tr>
      <td><label>
        <input type="radio" name="auc_acc" value="1" id="auc_acc_0" />
        Accept</label></td>
    </tr>
    <tr>
      <td><label>
        <input type="radio" name="auc_acc" value="2" id="auc_acc_1" />
        Refuse</label></td>
    </tr>
  </table>
  <p>&nbsp;</p>

  <p>&nbsp;</p>
  <p>
    <input type="submit" name="btn_edit" id="btn_edit" value="Update" />
  </p>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($edit);
?>
