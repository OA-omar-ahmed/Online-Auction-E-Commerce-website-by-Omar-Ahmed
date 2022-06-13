<?php  include 'admin_session.php';?>
<?php // require_once('../Connections/connection.php'); 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 






$_SESSION['SESSION_admin_id'] ;
$_SESSION['SESSION_admin_email'];
$_SESSION['SESSION_admin_pass'] ;	

// echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/admin/admin_login.php">';

?>

<?php 
/*
if (!isset($_SESSION)) {
  session_start();
}


$adminname =  $_SESSION['SESSION_Username'];
*/


 ?>


                       <?php
				/*	   
					   
$sessionIdAuth = $_SESSION['adminEmailSession'];


//	  echo"<div class='ok_o'>(ID: <h6> $sessionIdAuth </h6> ) </div>";
                     include("../admin/include/config.php");

    $seaAdminAuthSettingPaGeAucth = 'AuthSettingPaGeAucth';
    $seAuthQuePGA = mysql_query("select * from admin WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthSettingPaGeAucth."%' "); 
    $nAuthSelQuerPGA = mysql_num_rows($seAuthQuePGA);
    $rowAuthSPGA = mysql_fetch_assoc($seAuthQuePGA);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerPGA == 1 ) {
	echo "AUTHORIZED ";	
	
	}else{
	echo "UNAUTHORIZED ";	
	}
	*/
	
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO setting (admin_id, site_name, site_url, site_email, site_keyword, site_dies, site_statu, site_closed_msg, site_pic) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['admin_id'], "int"),
                       GetSQLValueString($_POST['site_name'], "text"),
                       GetSQLValueString($_POST['site_url'], "text"),
                       GetSQLValueString($_POST['site_email'], "text"),
                       GetSQLValueString($_POST['site_keyword'], "text"),
                       GetSQLValueString($_POST['site_dies'], "text"),
                       GetSQLValueString($_POST['site_statu'], "text"),
                       GetSQLValueString($_POST['site_closed_msg'], "text"),

                       GetSQLValueString($_POST['site_pic'], "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE setting SET admin_id=%s, site_name=%s, site_url=%s, site_email=%s, site_keyword=%s, site_dies=%s, site_statu=%s, site_closed_msg=%s, site_pic=%s WHERE id_site=%s",
                       GetSQLValueString($_POST['admin_id'], "int"),
                       GetSQLValueString($_POST['site_name'], "text"),
                       GetSQLValueString($_POST['site_url'], "text"),
                       GetSQLValueString($_POST['site_email'], "text"),
                       GetSQLValueString($_POST['site_keyword'], "text"),
                       GetSQLValueString($_POST['site_dies'], "text"),
                       GetSQLValueString($_POST['site_statu'], "text"),
                       GetSQLValueString($_POST['site_closed_msg'], "text"),

                       GetSQLValueString($_POST['site_pic'], "text"),
                       GetSQLValueString($_POST['id_site'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
}

mysql_select_db($database_connection, $connection);
$query_setting = "SELECT * FROM setting ORDER BY id_site desc";
$setting = mysql_query($query_setting, $connection) or die(mysql_error());
$row_setting = mysql_fetch_assoc($setting);
$totalRows_setting = mysql_num_rows($setting);
?>



<?php  include("head_admin.php"); ?>


                       <?php
					   
					   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];


//	  echo"<div class='ok_o'>(ID: <h6> $sessionIdAuth </h6> ) </div>";

//                     include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);






    $seaAdminAuthSettingPaGeAucth = 'AuthSettingPaGeAucth';
    $seAuthQuePGA = mysql_query("select * from  admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthSettingPaGeAucth."%' "); 
    $nAuthSelQuerPGA = mysql_num_rows($seAuthQuePGA);
    $rowAuthSPGA = mysql_fetch_assoc($seAuthQuePGA);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerPGA == 1 ) {
	echo "AUTHORIZED to insert ";	
?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_name:</td>
      <td><input type="text" name="site_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Site_url:</td>
      <td><textarea name="site_url" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_email:</td>
      <td><input type="text" name="site_email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Site_keyword:</td>
      <td><textarea name="site_keyword" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Site_dies:</td>
      <td><textarea name="site_dies" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_statu:</td>
      <td><select name="site_statu">
        <option value="opend" <?php if (!(strcmp("opend", ""))) {echo "SELECTED";} ?>>open</option>
        <option value="closed" <?php if (!(strcmp("closed", ""))) {echo "SELECTED";} ?>>close</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Site_closed_msg:</td>
      <td><textarea name="site_closed_msg" cols="50" rows="5"></textarea></td>
    </tr>


    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_pic:</td>
      <td><input type="text" name="site_pic" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="admin_id" value="<?php echo $_SESSION['SESSION_admin_id']; ?>" />
  
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<hr>



<p>&nbsp;</p>



<p>&nbsp;</p>



<?php
	
	}else{
// 	echo "UNAUTHORIZED to insert information ";	
echo " ";
	}
?>





<p>&nbsp;</p>
<p>&nbsp;</p>


<p>&nbsp;</p>


<table align="center"  bordercolor="#00CCFF" border="8">

<tr>
  <td>
  
  
  
  
  
<p>&nbsp;</p>


<div id="navbarad">



                <ul>


<li><a href="addAdmin.php">Add Admin</a></li>



<li><a href="control_admin.php">Control Admin</a></li>

</ul>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>


<p>&nbsp;</p>

<div id="navbarad">



                <ul>


<li><a href="addcat.php">Add Category</a></li>
<li><a href="editcat.php">Edit and Delete catagory</a></li>


<li>


</li>

                </ul>
                  </div>




  
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>&nbsp;</p>


  
  
  
  </td>
     <td>
     
     
      <form name="form33" method="post" action="">
    <h4>Change my password</h4>
     <label for="txt_pass"></label>
     <input type="password" name="txt_pass" id="txt_pass">
  <input type="submit" name="ok_pass_btn" id="ok_pass_btn" value="Enter current password" />

       </form>
	 <?php
	$ok_pass_btn=$_POST['ok_pass_btn'];

	$password=$_POST["txt_pass"];
//	 $md5userpassEdit = md5($_POST["txt_pass1"]);
	 $md5userpass = md5($password);
	//  if ($_POST['txt_pass']== "") {
	 
	 	// if ($ok_pass_btn) {
			 
		 if ($md5userpass== "") {
		
echo "Please enter the password";
			 
	 }else{
	 
// 	 $row_info['admin_pass'];
	/* if ((isset($md5userpass) && ($md5userpass!= $row_info['admin_pass']))) {
		 
		 echo"<p>The password is not correct</p>";
		  		 
	 }else if ((isset($md5userpass) && ($md5userpass == $row_info['admin_pass']))){
     */
 if($md5userpass == $_SESSION['SESSION_admin_pass']){
		
     ?>
     <form name="form22" method="post" action="admin_edit_pass.php">
      


 <input type="submit" name="btn_edit2" id="btn_edit2" value="  Change my password  " />



         <input name="hd_edit22" type="hidden" id="hd_edit22" value="<?php echo $row_info['admin_id']; ?>">
     
     
     
   </form>
     <?php
	 
	 } // md5userpass ==''
	 }// if($row_info['admin_pass'] == $_POST['txt_pass'])
	// }
	// }
	  ?>
     
        
     
     </td>
     
     
   </tr>
</table>




<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>













<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<hr/>
<?php echo $_SESSION['SESSION_admin_id']; ?>

  <?php
    if($nAuthSelQuerPGA == 1 ) {
	echo "AUTHORIZED to edit Online Auction website ";	
?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  

  
  <table align="center">
    <tr valign="baseline">
      
      <td nowrap="nowrap" align="center">   <h3>Edit:</h3></td>

    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_site:</td>

      <td><?php echo $row_setting['id_site']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_name:</td>
      <td><input type="text" name="site_name" value="<?php echo htmlentities($row_setting['site_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_url:</td>
      <td><input type="text" name="site_url" value="<?php echo htmlentities($row_setting['site_url'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_email:</td>
      <td><input type="text" name="site_email" value="<?php echo htmlentities($row_setting['site_email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_keyword:</td>
      <td><textarea name="site_keyword" cols="32"><?php echo htmlentities($row_setting['site_keyword'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_dies:</td>
      <td><textarea name="site_dies" cols="32"><?php echo htmlentities($row_setting['site_dies'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_statu:</td>
      <td><select name="site_statu">
        <option value="open" <?php if (!(strcmp("open", htmlentities($row_setting['site_statu'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>opening</option>
        <option value="closed" <?php if (!(strcmp("closed", htmlentities($row_setting['site_statu'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>closing</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_closed_msg:</td>
      <td><input type="text" name="site_closed_msg" value="<?php echo htmlentities($row_setting['site_closed_msg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
  
  <input type="hidden" name="admin_id" value="<?php echo $_SESSION['SESSION_admin_id']; ?>" />
  

    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site_pic:</td>
      <td><input type="text" name="site_pic" value="<?php echo htmlentities($row_setting['site_pic'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form2" />
  <input type="hidden" name="id_site" value="<?php echo $row_setting['id_site']; ?>" />
</form>

<?php
	
	}else{
// 	echo "UNAUTHORIZED to ";	
echo " ";
	}
?>

<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($setting);
?>
