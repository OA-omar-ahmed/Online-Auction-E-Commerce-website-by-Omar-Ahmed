<?php 



session_start();


?>


<?php include 'header.php';?>
       <?php // include 'menu.php';?>
  
   <?php include 'o_auction_header.php';?>
  
     
<?php 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


?>





<br/>
<br/>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}




/*
<input name="hd_level" type="hidden" id="txt_country" value="<?php echo $row_Recordset1['level']; ?>" />
       <input name="hd_reg_date" type="hidden" id="txt_country" value="<?php echo $row_Recordset1['reg_date']; ?>" />
       <input name="hd_date_last_edit_info" type="hidden" id="txt_country" value="<?php echo $row_Recordset1['date_last_edit_info']; ?>" />
  */     
       
$postname= addslashes(strip_tags($_POST['name']));
$postTitle= addslashes(strip_tags($_POST['Title']));
$postemail= addslashes(strip_tags($_POST['email']));
$postmsg= addslashes(strip_tags($_POST['msg']));



$colname_Recordset1 = "-1";
if (isset($_POST['hd_edit'])) {
  $colname_Recordset1 = $_POST['hd_edit'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM user_information_table WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
//	$hd_date_last_edit_info = now() ;
// $USER_username = $row_Recordset1['username'];


// $USER_user_id = $row_Recordset1['user_id'];
// $USER_idSESSION = $_SESSION['USER_id'];  username='$upd_txt_username ',
$usernamePost =  trim(addslashes(strip_tags(nl2br($_POST['txt_username']))));
$USERPoUsername = trim(addslashes(strip_tags(nl2br($_POST['hd_edittow']))));
$upd_txt_user_f_name = trim(addslashes(strip_tags(nl2br($_POST['txt_user_f_name']))));
$upd_txt_user_l_name = trim(addslashes(strip_tags(nl2br($_POST['txt_user_l_name']))));
$upd_txt_username = trim(addslashes(strip_tags(nl2br($_POST['txt_user_l_name']))));
$upd_txt_user_phone = trim(addslashes(strip_tags(nl2br($_POST['txt_user_phone']))));
$upd_txt_user_email = trim(addslashes(strip_tags(nl2br($_POST['txt_user_email']))));
$upd_txt_country  = trim(addslashes(strip_tags(nl2br($_POST['txt_country']))));
//	$trytimeinsh = time() ;
$hd_changeInfo_date=date("Y-m-d H:i:s");
$updateSQL = "UPDATE user_information_table SET user_f_name='$upd_txt_user_f_name' , user_l_name='$upd_txt_user_l_name' , username='$usernamePost' , user_phone='$upd_txt_user_phone' ,  user_email='$upd_txt_user_email' ,  country='$upd_txt_country',  date_last_edit_info='$hd_changeInfo_date' WHERE username='$USERPoUsername'";

mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

echo " <p>&nbsp;</p>  <p>&nbsp;</p>   <p>&nbsp;</p><h1><p>Updated your information successfully.</h1>";
echo "<p>Alhamdolellah</p>";



 echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/personal_page.php">';
exit;}


?>

<!-- <p>personalPage_edit.php</p> -->
  <pre><h9><em>Last Update:<?php echo  $row_Recordset1['date_last_edit_info']; ?></em></h9></pre>
<h3><a href='personalPage.php'> (&lt;&lt;) Go back to my page </a></h3>

<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
   <p>&nbsp;</p>
  <p>
    <label for="txt_user_f_name">User first name</label>
     <input name="txt_user_f_name" type="text" id="txt_user_f_name" value="<?php echo $row_Recordset1['user_f_name']; ?>" />
</p>
   <p>
     <label for="txt_user_l_name">User Last Name</label>
     <input name="txt_user_l_name" type="text" id="txt_user_l_name" value="<?php echo $row_Recordset1['user_l_name']; ?>" />
</p>
   <p>
     <label for="txt_username">Username</label>
     <input name="txt_username" type="text" id="txt_username" value="<?php echo $row_Recordset1['username']; ?>" />
   </p>
   
   <p>
     <label for="txt_user_phone">User Phone </label>
     <input name="txt_user_phone" type="text" id="txt_user_phone" value="<?php echo $row_Recordset1['user_phone']; ?>" />
   </p>
   <p>
     <label for="txt_user_email">User E-mail</label>
     <input name="txt_user_email" type="text" id="txt_user_email" value="<?php echo $row_Recordset1['user_email']; ?>" />
</p>
  <p>
     <label for="txt_country">Country</label>
     <input name="txt_country" type="text" id="txt_country" value="<?php echo $row_Recordset1['country']; ?>" />
</p>
 <h2> 
   <input type="submit" name="btn_update" id="btn_update" value="UPDATE" />
  </h2>
  <p>&nbsp;</p>
   <p>&nbsp;</p>

  
<!--       <input name="hd_level" type="hidden" id="txt_country" value="<?php // echo $row_Recordset1['level']; ?>" />

       <input name="hd_reg_date" type="hidden" id="txt_country" value="<?php // echo $row_Recordset1['reg_date']; ?>" />
       
              <input name="hd_date_last_edit_info" type="hidden" id="date_last_edit_info" value="<?php echo time(); ?>" />
-->

          <input name="hd_edittow" type="hidden" id="hd_edit" value="<?php echo  trim(addslashes(strip_tags(nl2br($row_Recordset1['username'])))); ?>" />
       
       
  
<p>&nbsp;</p>
  <input type="hidden" name="MM_update" value="form1" />
</form>
<p>&nbsp;</p>

<?php
mysql_free_result($Recordset1);
?>


<?php include 'footer.php';?>
