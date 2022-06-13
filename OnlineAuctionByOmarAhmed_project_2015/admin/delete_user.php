
<?php  include 'admin_session.php';?>
<?php  // include("head_admin.php"); ?>


<?php //require_once('../Connections/connection.php'); 


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

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_POST['hd_del'])) && ($_POST['hd_del'] != "")) {
  $deleteSQL = sprintf("DELETE FROM users WHERE user_id=%s",
                       GetSQLValueString($_POST['hd_del'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

  $deleteGoTo = "delete_user.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}



if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form5")) {
$acc=$_POST['user_acc'];
//$hd_Accept_Refuse_date =date("Y-m-d H:i:s");
$hd_edit=$_POST['hd_edit5'];

  $updateSQL = "UPDATE users SET user_stat='$acc' WHERE user_id='$hd_edit'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

 
}



$maxRows_users = 10;
$pageNum_users = 0;
if (isset($_GET['pageNum_users'])) {
  $pageNum_users = $_GET['pageNum_users'];
}
$startRow_users = $pageNum_users * $maxRows_users;



$colname_users = "-1";
mysql_select_db($database_connection, $connection);
if (isset($_POST['txt_search'])) 
{
  	$searchword = $_POST['txt_search'];
	$query_users = "SELECT * FROM users WHERE user_id LIKE'".$searchword."%' OR username LIKE'%".$searchword."%'";
}
else
{

$query_users = "SELECT * FROM users";

}
$users = mysql_query($query_users, $connection) or die(mysql_error());
$row_users = mysql_fetch_assoc($users);


$totalRows_users = mysql_num_rows($users);










if (isset($_GET['totalRows_users'])) {
  $totalRows_users = $_GET['totalRows_users'];
} else {
  $all_users = mysql_query($query_users);
  $totalRows_users = mysql_num_rows($all_users);
}
$totalPages_users = ceil($totalRows_users/$maxRows_users)-1;

$queryString_users = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_users") == false && 
        stristr($param, "totalRows_users") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_users = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_users = sprintf("&totalRows_users=%d%s", $totalRows_users, $queryString_users);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>No Need for this page inshallah</h1>
  <h1>Welcome to delete user page<?php echo $adminname; ?></h1>
  
  <?php  include 'head_admin.php';?>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>Delete user</p>



<form id="form1" name="form1" method="post" action="">
  <h5>
    <label for="txt_search">Search</label>
    <input type="text" name="txt_search" id="txt_search" />
    <input type="submit" name="btn_search" id="btn_search" value="Search" />
  <em>Search by username or id number of the user.</em></h5>
  <p>
  <?php


 if($totalRows_users =="0"){
	 echo "<h3>No such Result is found </h3>";
 }
	 else{

 echo "Result found : ";
 echo $totalRows_users ;

?>
  </p>
</form>




<table width="100" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>More details </td>
  
    <td>user_id</td>
    <td>user_f_name</td>
    <td>user_l_name</td>
    <td>username</td>
    <td>user_password</td>
    <td>user_phone</td>
    <td>user_email</td>
    <td>country</td>
    <td>reg_date</td>
    <td>&nbsp;</td>
    <td>BL</td>
    <td>Block/unblock</td>
    <td>Delete User</td>
  </tr>
  <?php do { ?>
    <tr>
      <td>
<a href='../clints/personalPage_info.php?user_id=$re_re_re_auc_user_id'> See more information </a></td>
      <td><?php echo $row_users['user_id']; ?></td>
      <td><?php echo $row_users['user_f_name']; ?></td>
      <td><?php echo $row_users['user_l_name']; ?></td>
      <td><?php echo $row_users['username']; ?></td>
      <td><?php echo $row_users['user_password']; ?></td>
      <td><?php echo $row_users['user_phone']; ?></td>
      <td><?php echo $row_users['user_email']; ?></td>
      <td><?php echo $row_users['country']; ?></td>
      <td><?php echo $row_users['reg_date']; ?></td>
      <td>
      
      
      
       
      
<input type='checkbox' name='interest[dog]'
value='<?php echo $row_users['user_id']; ?>' />dog <?php echo $row_users['user_id']; ?>
      
      
      
      
      
      
      
      
      </td>
      <td><form id="form2" name="form2" method="post" action="">
        <p>
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0" />
            Checkbox</label>
          <br />
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_1" />
            Checkbox</label>
          <br />
        </p>
      </form></td>

      
      <td>
     <form name="form4" method="post" action="">
      
      <?php
	  // include("./include/config.php");
	  
	  
      if( $row_users['user_stat'] == "0"){
?>

<div class='no_o' > <input name='edit_Block' value='Block' type='submit'/> </div>

<?php


 if(isset($_POST['edit_Block'])){	
      
	  
		$useri_blo = $row_users['user_id'];
	$time_blo = time() ;
	$updatenum_seen_total = "UPDATE users SET user_stat='$time_blo' WHERE user_id='$useri_blo'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updatenum_seen_total, $connection) or die(mysql_error());
			
 }

      }
	  
	  
	    else{
		  
		  
?>


<div class='head_o' > <input name='edit_unBlock' value='Un Block' type='submit'/> </div>
<?php

//if ((isset($_POST["MM_insert2"])) && ($_POST["MM_insert2"] == "form2")) {

      if(isset($_POST['edit_unBlock'])){	
$useri_blo3 = $row_users['user_id'];      
	  
		$ublock_blo = 0 ;
	
	$updatenum_seen_total = "UPDATE users SET user_stat='$ublock_blo' WHERE user_id='$useri_blo3'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updatenum_seen_total, $connection) or die(mysql_error());
			
 }
      
      }
      
	  ?>
	  <?php echo $row_users['user_stat']; ?>
   
      <input type="hidden" name="MM_upda" value="form23" />
     </form>
      </td>
   
      
      
	   
	  
      
      

      <td><form id="form1" name="form1" method="post" action="">
        <p>
          <input type="submit" name="btn_del" id="btn_del" value="DELETE" />
        </p>
        <p>
          <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_users['user_id']; ?>" />
        </p>
      </form></td>
   
   
   
   
   
  
  
    
    
   
   
      
<td>   


 <form id="form5" name="form5" method="post" action="#">

  <table width="200">
        
          <tr>
          <td><label>
            <input type="checkbox" name="user_acc" value="
<?php
$Timeuser_refused = date("Y-m-d H:i:s");
            echo  $Timeuser_refused ;
			
			//echo $row_users['user_id'];
			
            ?>
            " id="user_acc_1" />
           block</label></td>
        </tr>
        
        
        <tr>
          <td><label>
         
            <input type="checkbox" name="user_acc" value="
            <?php
$accuser_acc = 0 ;
            echo  $accuser_acc ;
			
			//echo $row_users['user_id'];
			
            ?>
            " id="user_acc_0" />
            Un Block</label></td>
        </tr>
      
        
      </table>


<p>
      
        <input name="hd_edit5" type="hidden" id="hd_edit5" value="<?php echo $row_users['user_id']; ?>" />
<!--        <input type="hidden" name="hd_Accept_Refuse_date" id="hd_Accept_Refuse_date" /> -->
      </p>
     <input type='submit' name='MM_update' value='Do (BLOCK/UNBLOCK)' />  <input type='hidden' name='MM_update' value='form5' />
      </form>

</td>
   
   
   
   
   





      <?php
// require_once('../Connections/connection.php');
include("./include/config.php");


/*echo "<html>
<head><title>Checkboxes</title></head>
<body style='margin: .5in'>";
// include("dbstuff.inc");*/




//$cxn = mysqli_connect($host,$user,$pass,$db) or die ("couldn't connect to server");

//$query = "SELECT DISTINCT user_id FROM users ";
//$result = mysqli_query($cxn,$query) or die ("Couldn't execute query.");

/* create form containing checkboxes */
/*
echo "<h3>Which products are you interested in?
<span style='font-size: 80%; font-weight: normal'>
(Check as many as you want)</span></h3>\n";*/
echo "<fieldset>

<form action='process_upd_form.php' method='POST'>
<ul style='list-style: none'>\n";
// $row222 = mysqli_fetch_assoc($result);


$row222_users = $row_users['user_id'];
$hd_Refuse_usar=date("Y-m-d H:i:s");

echo "<td>ID: ".$row222_users."</td>" ;
echo "

<td>   <p>
<input type='checkbox' name='blo_cc'
id='blo_cc' value='$hd_Refuse_usar' /> <label for='$row222_users' style='font-weight: bold'> Block </label>
</p></br>
</td>

";


echo "

<td>   <p>
<input type='checkbox' name='unblo_cc' id='unblo_cc' value='0' /> <label for='$row222_users' style='font-weight: bold'>Un block</label>
</p></br>
</td>

";


//echo "</ul></fieldset>";

/*echo "<p><input type='submit'
value='Select Categories' /></p>
</form></body></html>\n";
*/

?>
      
     
    
   
   
   
   
    <?php } while ($row_users = mysql_fetch_assoc($users)); 
	
	





echo "<p><input type='submit'
value='Sssssssssssselect Categories' /></p>
</form>\n";










?>































<?php










	
	} ?>
    
    
  
  
    </tr>
    
</table>

























<!--

<html>
    
    <body>
        
    <div style="text-align: center;">
	<div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 700px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
	<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Tracking Students' Attendance</span></div>
	<div style="background:white ;padding: 15px">
	<style type="text/css" scoped>
	td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
	input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
	input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #0361A8; float: right; margin-top: 10px; }
	table.center { margin-left:auto; margin-right:auto; }
	.error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
	</style>

-->


<?php


?>
<!-- <input type="submit" action="controlluser.php" value="submit">
            </form> -->
<?php
// mysqli_close($con);
?>
        </body>   
        </html>

























<p><a href="delete_user.php">show all </a></p>
<p><?php echo $totalRows_users ?></p>
<table border="0">
  <tr>
    <td><?php if ($pageNum_users > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_users=%d%s", $currentPage, 0, $queryString_users); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_users > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_users=%d%s", $currentPage, max(0, $pageNum_users - 1), $queryString_users); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_users < $totalPages_users) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_users=%d%s", $currentPage, min($totalPages_users, $pageNum_users + 1), $queryString_users); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_users < $totalPages_users) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_users=%d%s", $currentPage, $totalPages_users, $queryString_users); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($users);
?>
