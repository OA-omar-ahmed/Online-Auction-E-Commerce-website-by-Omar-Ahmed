
<?php 



@ session_start();


?>




  
   <?php include 'o_auction_header.php';?>
  
     
<?php 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


 ?>

<?php include 'header.php';?>
<?php // include 'menu.php';?>

             
<?php // include 'o_auction_header.php';?>


<br/>
<br/>
<br/>
       


<?php

if($_SESSION['SESSION_USER_id']==''){

echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/logout_page.php">';

exit;}


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


//	   if (isset($_POST['btn_update']) && ($_POST["txt_pass1"] AND $_POST["txt_pass2"] =="") ) {
//		   echo"<h1>Password should not be empty.</h1>";
//addslashes(strip_tags($_POST['name']));

if(isset($_POST['btn_update'])){
	
	if ($_POST["txt_pass1"] =="" or $_POST["txt_pass2"]=="")  {
		echo "The password text box should not be empty";

}elseif ( ($_POST["txt_pass1"] != $_POST["txt_pass2"]) ) {
echo "Please enter the password confirm correctly.";


//if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  
  
}else{
	 $md5userpassEdit = md5($_POST["txt_pass1"]);
	 $UserIdSession = $_SESSION['SESSION_USER_id'];
  $updateSQL = "UPDATE user_information_table SET user_password='$md5userpassEdit' WHERE user_id='$UserIdSession'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

if($updateSQL){
echo "<h1><p>Your password changed successfully.</h1>";
echo "<p>Alhamdolellah</p>";
// echo "<p>Your account Will logout  Logout af</p>";

echo '<h3>Do you want to Logout Now: <a href="logout_page.php"> Yes Logout Now </a>
 or  <a href="personal_page.php"> Not now </a></h3>';
echo "<h3><a href='personal_page.php'> (&lt;&lt;) Go back to my page </a></h3>";
exit;}// close if($updateSQL)

 echo'<meta http-equiv="Refresh" content="20;url=http://localhost/onlineauctionweb/personal_page.php">';
 
}
}

$colname_Recordset1 = "-1";
if (isset($_POST['hd_edit2'])) {
  $colname_Recordset1 = $_POST['hd_edit2'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM user_information_table WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>


<h4><strong> Change your password form</strong></h4>
<p>&nbsp;</p>



  <?php
  
  
 ?>
 
      <?php
  

//if (isset($_POST['btn_update']) && ($_POST["txt_pass1"] != $_POST["txt_pass2"]) ) {
  //echo "<p><em>Please enter them correctly one of the textbox is not match the other. </em></p> ";
// }

 
  
  ?>

<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p>user_id: <?php echo $row_Recordset1['user_id']; ?></p> 
  
<p>
  <input type="hidden" name="txt_username" value="<?php echo $row_Recordset1['username']; ?>" />
    
   </p>

  <p>
    <label for="txt_pass1">Enter new password: </label>
    <input type="password" name="txt_pass1" id="txt_pass1" placeholder="Enter new password" />
  </p>

  
  
   <p>
    <label for="txt_pass2">Confirm new password: </label>
    <input type="password" name="txt_pass2" id="txt_pass2" placeholder="Confirm new password"  />
  </p>

 
  
  <p>
  
       <input type="submit" name="btn_update" id="btn_update" value="UPDATE" />
  </p>
  <p>&nbsp;</p>
<p>&nbsp;</p>
  <input type="hidden" name="MM_update" value="form1" />
</form>
<p>&nbsp;</p>

<?php
mysql_free_result($Recordset1);
?>


<?php include 'footer.php';?>

