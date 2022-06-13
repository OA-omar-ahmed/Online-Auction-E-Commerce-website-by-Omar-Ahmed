<?php

@ session_start();



?>
<?php include 'header.php';?>
       <?php include 'menu.php';?>
  
  <a href="index.php">Home</a> >>   <a href="personal_page.php"> Personal page. </a>
             
            <h2> Welcome to your own Personal Page </h2>



<hr>
       <p>&nbsp;</p>
   <?php // include 'o_auction_header.php';?>
  


 
 
         
 
 
  
<?php 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR);
?>

                  
                  
  <?php


if($_SESSION['SESSION_Username']==''){

	echo "<h1>You should login please</h1>";


	 echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/login_page.php">'; 	  

exit;}else{

	
	
	


 $_SESSION['SESSION_USER_id'] ;
	  $_SESSION['SESSION_Username'] ;
	  $_SESSION['SESSION_user_email'] ;


// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['SESSION_USER_id'] = NULL;
  $_SESSION['SESSION_user_password'] = NULL;
  $_SESSION['SESSION_Username'] = NULL;
  unset($_SESSION['SESSION_USER_id']);
  unset($_SESSION['SESSION_user_password']);
  unset($_SESSION['SESSION_Username']);
	
  $logoutGoTo = "logout_page.php";
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

$colname_info = $_SESSION['SESSION_Username'];
if (isset($_GET['username'])) {
  $colname_info = $_GET['username'];
}


mysql_select_db($database_connection, $connection);
$query_info = sprintf("SELECT * FROM user_information_table WHERE username = %s", GetSQLValueString($colname_info, "text"));
$info = mysql_query($query_info, $connection) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);
$totalRows_info = mysql_num_rows($info);


$getUser_id =$row_info['user_id'];
$maxRows_sellauc = 10;
$pageNum_sellauc = 0;
if (isset($_GET['pageNum_sellauc'])) {
  $pageNum_sellauc = $_GET['pageNum_sellauc'];
}
$startRow_sellauc = $pageNum_sellauc * $maxRows_sellauc;

$colname_sellauc = "-1";
if (isset($_GET['user_id'])) {
  $colname_sellauc = $_GET['user_id'];
}
mysql_select_db($database_connection, $connection);
$query_sellauc = "SELECT * FROM  items_table WHERE user_id = '$getUser_id' ";
$query_limit_sellauc = sprintf("%s LIMIT %d, %d", $query_sellauc, $startRow_sellauc, $maxRows_sellauc);
$sellauc = mysql_query($query_limit_sellauc, $connection) or die(mysql_error());
$row_sellauc = mysql_fetch_assoc($sellauc);

if (isset($_GET['totalRows_sellauc'])) {
  $totalRows_sellauc = $_GET['totalRows_sellauc'];
} else {
  $all_sellauc = mysql_query($query_sellauc);
  $totalRows_sellauc = mysql_num_rows($all_sellauc);
}
$totalPages_sellauc = ceil($totalRows_sellauc/$maxRows_sellauc)-1;



$colname_Recordset1 = "Id";
if (isset($_GET['Id'])) {
  $colname_Recordset1 = $_GET['Id'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = %s ORDER BY bids_id DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


$connectdb = mysql_connect('localhost','omar','12345') or die ("not connect");
$selectdb=mysql_select_db('bauctionndba',$connectdb)or die("not selected database");





?>





                








 
 
 
                  <?php
				  
 if ($row_info['user_stat'] == '2'){
  echo "<h1><p>Your Account Closed from the O_Auction Adminstration</p></h1>";
exit;  }?>
      


 
 
 
 
  <?php
  
 
  
if (isset($_POST["btnACTIVE"])){
// btnCloseP
$btn_user_statA = 0 ;
$hdAct_user_idActi = $_POST['hdAct_user_id'];

  $updateSQLAct = "UPDATE user_information_table SET user_stat='$btn_user_statA' WHERE user_id='$hdAct_user_idActi'";

 mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQLAct, $connection) or die(mysql_error());
  
if($updateSQLAct){
$btn_user_statOpen = 1 ;

$btn_user_statOpenWas = 7 ;
  $updateSQLActOPEnTwo = "UPDATE  items_table SET Accept_Refuse='$btn_user_statOpen' WHERE user_id='$hdAct_user_idActi' AND Accept_Refuse='$btn_user_statOpenWas' ";
	 mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQLActOPEnTwo, $connection) or die(mysql_error());
	
  
	echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/personal_page.php">';
 
	
}

 
  

 
 }

 
if ($row_info['user_stat'] == '1'){
	
	
	
 ?>
  <form name="formCloseP" method="post" action="">
       <h1><p> Your page is INACTIVE </p></h1>
       
       <h4>
         <input type="submit" name="btnACTIVE" id="btnbACTIVE" value="  Active My Account Now " />
         <input name="hdAct_user_id" type="hidden" id="hd_editAct" value="<?php echo $row_info['user_id']; ?>">
       </h4>
     </form>
     
     
     
 <?php
exit;}
   ?>
 
 
 
 
 
 
 <table bordercolor="#0bd6f7" width="100" border="7" cellspacing="0" cellpadding="0" align="center">
    <tr>
     <td colspan="2" align="center">
     <form name="form1" method="post" action="personalPage_edit.php">

         <input type="submit" name="btn_edit" id="btn_edit" value="  Edit my information  " /><input name="hd_edit" type="hidden" id="hd_edit" value="<?php echo $row_info['username']; ?>"></h4></pre>
     </form></td>
   </tr>
  
  
   <tr>
     <td><p>User id</p></td>
     <td><h4><?php echo $row_info['user_id']; ?></h4></td>
   </tr>
  
   <tr>
     <td><p>Username</p></td>
     <td><h4><?php echo $_SESSION['SESSION_Username']; ?></h4></td>
   </tr>
   <tr>
     <td><p>User first name</p></td>
     <td><h4><?php echo $row_info['user_f_name']; ?></h4></td>
   </tr>
   <tr>
     <td><p>User last name</p></td>
     <td><h4><?php echo $row_info['user_l_name']; ?></h4></td>
   </tr>
  
   <tr>
     <td><p>User phone</p></td>
     <td><h4><?php echo $row_info['user_phone']; ?></h4></td>
   </tr>
    <tr>
     <td><p>User E-mail</p></td>
     <td><h4><?php echo $row_info['user_email']; ?></h4></td>
   </tr>
    <tr>
     <td><p>Country</p></td>
  <td><h4><?php 
	 echo $row_info['country']; ?></h4></td>
   </tr>
    <tr>
     <td><p>Registered date</p></td>
     <td><h4><?php echo $row_info['reg_date']; ?></h4></td>
   </tr>
  
    <tr>
     <td colspan="2" align="center">
     
     
      <form name="form3" method="post" action="">
    <p>Change my password: </p>
     <label for="txt_pass"></label>
     <input type="password" name="txt_pass" id="txt_pass" placeholder="Enter current password" >
     <input type="submit" name="ok" id="ok" value="Ok" />

       </form>
	 <?php
	$ok=$_POST['txt_pass'];
	$password=$_POST['txt_pass'];
	 $md5userpass = md5($password);
	 if ($_POST['txt_pass']== "") {
	 
	 }else{
	 
	 if ((isset($md5userpass) && ($md5userpass!= $row_info['user_password']))) {
		 
		 echo"<p>The password is not correct</p>";
		  		 
	 }else if ((isset($md5userpass) && ($md5userpass == $row_info['user_password']))){
     
	 	
		
     ?>
     <form name="form2" method="post" action="personalPage_edit_pass.php">
       <h4>


 <input type="submit" name="btn_edit2" id="btn_edit2" value="  Change my password  " />



         <input name="hd_edit2" type="hidden" id="hd_edit2" value="<?php echo $row_info['username']; ?>">
     
     
         </h4>
   </form>
     <?php
	 }
	 }
	  ?>
     
        
     
     </td>
     </tr>
 
 

   
   
   <tr>
   <?php
   
if (isset($_POST["btnCloseP"])){
// btnCloseP
$btn_user_stat = 1 ;
$hd_editus = $_POST['hd_edit_user_id'];

  $updateSQLClos = "UPDATE  user_information_table SET user_stat='$btn_user_stat' WHERE user_id='$hd_editus'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQLClos, $connection) or die(mysql_error());
  
  if($updateSQLClos){
$btn_PageClosed_stat = 7 ;
$btn_PageStatusWas = 1 ;
$hd_editusIduser = $_POST['hd_edit_user_id'];
// if ($row_auction['Accept_Refuse']=='4')
  $updateSQLPageCloseAuc = "UPDATE  items_table SET Accept_Refuse='$btn_PageClosed_stat' WHERE user_id='$hd_editusIduser' AND  Accept_Refuse='$btn_PageStatusWas' ";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQLPageCloseAuc, $connection) or die(mysql_error());
	 echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/personal_page.php">'; 
	  
  }
  


 
}
   ?>
     <td colspan="2" align="center">
     <form name="formCloseP" method="post" action="">
       <h4>
         <input type="submit" name="btnCloseP" id="btnClosP" value="  Inactive My Account  " />
         <input name="hd_edit_user_id" type="hidden" id="hd_edit" value="<?php echo $row_info['user_id']; ?>">
       </h4>
     </form></td>
   </tr>
    
   <tr>
     <td colspan="2" align="center">
     
      <pre><h9><em>Last Update:<?php echo $row_info['date_last_edit_info']; ?></em></h9><h4>

  </td>
   </tr>
  
  
 </table>


 <p>&nbsp;</p>
 <tr>
 
 <h3><a href="personalPageSell.php"   class="ui-button ui-button-big js-submit"   > My Items willing to Sell</a></h3>
 </tr>
 
 <article class="row">
    <div class="border">
 
 
<p><a href="personalPageSell.php">View full screen:</a></p>
<iframe class="result_output" width="100%" height="900px" frameborder="0" name="view" src="personalPageSell.php"></iframe>

 



      </div>								            
    </article>



 <p>&nbsp;</p>

<?php


mysql_free_result($info);

mysql_free_result($sellauc);


?>


<hr>
<hr>
<br/>
<?php        
	
 }  // close  SESSION_Username if($_SESSION['SESSION_Username']=='')


?>

           
                
                

<?php include 'footer.php';?>
