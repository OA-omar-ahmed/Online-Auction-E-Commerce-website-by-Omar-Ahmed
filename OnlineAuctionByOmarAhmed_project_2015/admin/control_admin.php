<?php  include 'admin_session.php';?>
<?php

@ session_start();




$_SESSION['SESSION_admin_id'] ;
$_SESSION['SESSION_admin_email'];
$_SESSION['SESSION_admin_pass'] ;	

?>



                   
      <?php
	  
	  @ session_start();
	  
     $_SESSION['SESSION_admin_id'] ;
			 		   
$sessionIdAuthControlPa = $_SESSION['SESSION_admin_id'];



 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordAccControlPa = 'AdminstrationControlPage';
    $seAuthQueAccControlPa = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuthControlPa' and adminAuth LIKE'%".$seaAdminAuthWordAccControlPa ."%' "); 
    $nAuthSelQuerAccControlPa = mysql_num_rows($seAuthQueAccControlPa);
    $rowAuthSAccControlPa = mysql_fetch_assoc($seAuthQueAccControlPa);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerAccControlPa != 1 ) {
				  echo"<div class='no_o'> <h2>You are not authorized to enter this page.</h2> </div>";

	echo'<meta http-equiv="Refresh" content="5;url=http://localhost/onlineauctionweb/admin/setting.php">';
	exit;}
		?>
        
  
<p>&nbsp;</p>

<?php 
//  require_once('../Connections/connection.php');

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
$post_del_admin_id = $_POST['hd_del'];
  $deleteSQL =  "DELETE FROM admin_table WHERE admin_id='$post_del_admin_id'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

if($deleteSQL){	
echo "<div class='ok_o' >Admin Deleted successfully </div>";
echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/control_admin.php">';
}

		
}





 if ((isset($_POST['btn_del_user_information'])) && ($_POST['txt_del_user_information'] != "")) {

	
	// btn_del_user_information
	$post_user_information_table= $_POST['txt_del_user_information'];
  $deleteSQL_usr_table = "DELETE FROM user_information_table WHERE user_id='$post_user_information_table'";

  mysql_select_db($database_connection, $connection);
  $Resultall = mysql_query($deleteSQL_usr_table, $connection) or die(mysql_error());
  if($deleteSQL_usr_table){	
  echo "<div class='ok_o' ><h1>User/clint Deleted successfully </h1></div>";
echo'<meta http-equiv="Refresh" content="3;url=http://localhost/onlineauctionweb/admin/control_admin.php">';
  }
  
}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form5")) {
$acc=$_POST['auc_acc'];
$addminstration_id_status=$_SESSION['SESSION_admin_id'] ;
$hd_adminStatus_date=date("Y-m-d H:i:s");
$get_status_info= "(By admin ID:".$addminstration_id_status ." at:  ".$hd_adminStatus_date ." )";
$hd_edit=$_POST['hd_edit5'];

  $updateSQL = "UPDATE admin_table SET adminStatusHistory='$acc', adminStatusHistory='$get_status_info' WHERE admin_id='$hd_edit'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

 
}




$maxRows_admin_control = 10;
$pageNum_admin_control = 0;
if (isset($_GET['pageNum_admin_control'])) {
  $pageNum_admin_control = $_GET['pageNum_admin_control'];
}
$startRow_admin_control = $pageNum_admin_control * $maxRows_admin_control;

$colname_admin_control = "-1";

mysql_select_db($database_connection, $connection);

if (isset($_POST['auc_admin_st'])) 
{
  	$word = $_POST['auc_admin_st'];
	$query_admin_control = "SELECT * FROM admin_table WHERE adminStatus LIKE'%".$word."%' ORDER BY admin_id DESC ";
}

else

{
  	$searchword = $_POST['txt_search'];
		$word = $_POST['auc_admin_st'];
	$query_admin_control = "SELECT * FROM admin_table WHERE admin_name LIKE'%".$searchword."%' OR admin_id LIKE'%".$searchword."%' OR admin_email LIKE'%".$searchword."%'";
}

$query_limit_admin_control = sprintf("%s LIMIT %d, %d", $query_admin_control, $startRow_admin_control, $maxRows_admin_control);
$admin_control = mysql_query($query_limit_admin_control, $connection) or die(mysql_error());
$row_admin_control = mysql_fetch_assoc($admin_control);



if (isset($_GET['totalRows_admin_control'])) {
  $totalRows_admin_control = $_GET['totalRows_admin_control'];
} else {
  $all_admin_control = mysql_query($query_admin_control);
  $totalRows_admin_control = mysql_num_rows($all_admin_control);
}
$totalPages_admin_control = ceil($totalRows_admin_control/$maxRows_admin_control)-1;

$queryString_admin_control = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_admin_control") == false && 
        stristr($param, "totalRows_admin_control") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_admin_control = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_admin_control = sprintf("&totalRows_admin_control=%d%s", $totalRows_admin_control, $queryString_admin_control);
?>
























<p>list page for admin to controll all auctions.</p>
<p><a href="setting.php">Setting page</a></p>

<form id="formall" name="formall" method="post" action="">

Delete all Refuseed: 

  <input type="submit" name="btn_hd_del_all" id="btn_hd_del_all" value="Clear all refused records " />
    <input type="hidden" name="hd_del_all" id="hd_del_all" value="<?php echo $row_admin_control['adminStatus']; ?>"/>
</form>
<hr>
<p>&nbsp;</p>



<?php  include 'head_admin.php';?>
<form id="form3" name="form3" method="post" action="">
 <hr> <hr>
  <label for="txt_search">Search by Admin Id, email, or admin name</label>

    
            

  <input type="text" name="txt_search" id="txt_search" />
  <input type="submit" name="btn_search" id="btn_search" value="Submit" />
  <hr>
<p>Advanced search:</p>
<table width="200">
 
  <tr>
    <td><label>
      <input type="radio" name="auc_admin_st" value="0" id="auc_admin_st4" />
      View Waiting admin</label></td>
  </tr>
  
    <tr>
            <td><label>
<input type="radio" name="auc_admin_st" value="5" id="auc_admin_st5" /> 

              <!-- <input type="radio" name="auc_acc" value="0" id="auc_acc_0" />  -->
              ! View Stoped  admin!</label></td>
          </tr>

  
   <tr>
    <td><label>
      <input type="radio" name="auc_admin_st" value="1" id="auc_admin_st3" />
      View Accepted admin</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="auc_admin_st" value="2" id="auc_admin_st5" />
      View Refuseed admin</label></td>
  </tr>
</table>



<p><a href="control_admin.php"> Show All</a></p>
<p>
  <?php


 if($totalRows_admin_control =="0"){
	 echo "<h3>No such Result is found </h3>";
 }
	 else{

 echo "<h6>Result found: (" . $totalRows_admin_control  . ") </h6>";


?>
</p>
</form>
<hr>
<p>&nbsp;</p>
<table width="100" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>Admin ID</td>
    <td>admin Status</td>
   
    <td>Admin name</td>
    <td>Admin email</td>
    <td>Admin phone</td>
    <td>admin Authentication</td>
    <td>admin  History Status</td>
   
   
  
  
    <td>
    
Status
 (Accepted == 1) (Stopadmin == 3) (Refused == 2) (Wait == 0) 
 (Page closed by user == 7 )

    </td>
     <td>Change authentication</td>
  
    <td>Delete</td>
  </tr>
  <?php do { ?>
  <tr>
    <td>&nbsp;</td>
    <td><p><?php echo $row_admin_control['admin_id']; ?></p>
      <p>&nbsp;</p>
      <p>#Status: (
        <?php
	   echo $row_admin_control['adminStatus'];
	   ?>
)</p>      <?php if ($row_admin_control['adminStatus']=='1'){
		echo "<strong>Admin Accepted</strong>";  
		  
	  }
	  if ($row_admin_control['adminStatus']=='2'){
		echo "<strong>Admin Refused</strong>";  
		  
	  }
	  if ($row_admin_control['adminStatus']=='3'){
		echo "<strong>admin Stoped</strong>";  
		  
	  }
	  

	  
	  
	   ?></td>
    <td><?php echo $row_admin_control['adminStatus']; ?></td>


    <td><?php echo $row_admin_control['admin_name']; ?></td>
    <td><?php echo $row_admin_control['admin_email']; ?></td>
    <td><?php echo $row_admin_control['admin_phone']; ?></td>
    <td><?php echo $row_admin_control['adminAuth']; ?></td>
    <td><?php echo $row_admin_control['adminStatusHistory']; ?></td>


    <td><form id="form5" name="form5" method="post" action="<?php echo $editFormAction; ?>">
      <p>&nbsp;</p>
      <table width="200">
        <tr>
          <td><label>

           
     
     
            
            
                        <?php       if($row_admin_control['adminStatus']=='1'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
		               <input type="radio" name="auc_acc" value="1" id="auc_acc_1" />
		   
		   ';}  ?>
              
                         
            
            
            
            
            
            Accept</label></td>
        </tr>
        
        
        <tr>
          <td><label>
          
    
    
     
                        <?php     if($row_admin_control['adminStatus']=='0'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
		          <input type="radio" name="auc_acc" value="0" id="auc_acc_0" />
		   
		   ';}  ?>
           
            
   ###Wait###</label></td>
        </tr>
        
         <tr>
            <td><label>

<!-- 
<input type="radio" name="auc_acc" value="5" id="auc_acc_0" /> 
-->


      
          
          
        
     <?php       if($row_admin_control['adminStatus']=='3'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
<input type="radio" name="auc_acc" value="3" id="auc_acc_5" /> 
		   
		   ';} 
		   
		  
		   
		    ?>
           
        
        
   
   
   
            ###Stop this admin###</label></td>
          </tr>

        
        <tr>
          <td><label>


        
     <?php       if($row_admin_control['adminStatus']=='2'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
            <input type="radio" name="auc_acc" value="2" id="auc_acc_2" />
		   
		   ';}  ?>
      
     
                      
                   
                   
            
            Refuse</label></td>
        </tr>
      </table>
      <p>
        <input type="hidden" name="MM_update" value="form5" />
        <input name="hd_edit5" type="hidden" id="hd_edit5" value="<?php echo $row_admin_control['admin_id']; ?>" />
        <input type="hidden" name="hd_adminStatus_date" id="hd_adminStatus_date" />
      </p>
      <p>
       
      <?php if ($row_admin_control['adminStatus']=='5'){
		  
		  echo "This the owner";
		  
		  
	  }else{
	  
	  
	  ?>
      
        <input type="submit" name="btn_edit" id="btn_edit" value="OK" />
        
        <?php
		
	  }
		?>


      </p>
   
    </form>
   <p><?php echo $row_admin_control['adminStatus']; ?></p>
   <p>#Status:
     <?php if ($row_admin_control['adminStatus']=='1'){
		echo "<strong>Accepted</strong>";  
		  
	  }
	  if ($row_admin_control['adminStatus']=='2'){
		echo "<strong>Refused</strong>";  
		  
	  }
	  if ($row_admin_control['adminStatus']=='0'){
		echo "<strong>#####Admin is Waiting #####</strong>";  
		  
	  }
	  	  if ($row_admin_control['adminStatus']=='3'){
		echo "<strong>Stoped</strong>";  
		  
	  }
	  
	  	  	  if ($row_admin_control['adminStatus']=='5'){
		echo "<strong>The Owner</strong>";  
		  
	  }
	  
	   ?>
   </p></td>

     <td>

    <?php

$AdminPostAuthId = $row_admin_control['admin_id'];
		echo "    <a href='adminAuth.php?do=update&admin_id=$AdminPostAuthId'>specify the authority for (". $row_admin_control['admin_name'] .") </a>";




	   ?>



    </td>


    <td>
    
            
   
               
                   
      <?php
     
			 		   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];


	 // echo"(ID: <h6> $sessionIdAuth </h6> ) ";
    // include("../admin/include/config.php");
 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordAcc = 'AdminstrationDeleteAdmin';
    $seAuthQueAcc = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWordAcc ."%' "); 
    $nAuthSelQuerAcc = mysql_num_rows($seAuthQueAcc);
    $rowAuthSAcc = mysql_fetch_assoc($seAuthQueAcc);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerAcc == 1 ) {
		
		
		?>
        
    <?php
          	  	  	  if ($row_admin_control['adminStatus']=='5'){
		echo "<strong>The Owner</strong>";  

					  }else{
		 ?>

              
    <form id="form1" name="form1" method="post" action="">
      <p>
        <input type="submit" name="btn_del" id="btn_del" value="DELETE" />
      </p>
      <p>
      
        <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_admin_control['admin_id']; ?>" />
      </p>
    </form>
    
           
         <?php
		  
	  } //close the owner
	  
	   ?>  
            
                  
           
    <?php
	   
	  
	}else{
	echo "<hr> No Authorization to delete <hr>";	


		
	}




?>
            
            
   
    
    
    
    </td>
  </tr>
  <?php  } while ($row_admin_control = mysql_fetch_assoc($admin_control)); } ?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>



<div class="ok_o">
<h6>Results found: (<?php echo $totalRows_admin_control ?>)</h6>
<a class="AdmnBut_O_A" href="list.php"> Show All</a> <a class="AdmnBut_O_A" href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, 0, $queryString_admin_control); ?>">First</a> 
<a class="AdmnBut_O_A" href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, max(0, $pageNum_admin_control - 1), $queryString_admin_control); ?>">&lt;&lt; Previous</a> 
<a class="AdmnBut_O_A" href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, min($totalPages_admin_control, $pageNum_admin_control + 1), $queryString_admin_control); ?>">Next &gt;&gt;</a> 
<a class="AdmnBut_O_A"  href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, $totalPages_admin_control, $queryString_admin_control); ?>">Last</a> </div>


 <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
      
                   
      <?php
     
			 		   
$sessionIdAuthUser = $_SESSION['SESSION_admin_id'];


	 // echo"(ID: <h6> $sessionIdAuth </h6> ) ";
    // include("../admin/include/config.php");
 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordAccUser = 'AdminstrationDeleteUser';
    $seAuthQueAccUser = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuthUser' and adminAuth LIKE'%".$seaAdminAuthWordAccUser ."%' "); 
    $nAuthSelQuerAccUser = mysql_num_rows($seAuthQueAccUser);
    $rowAuthSAccUser = mysql_fetch_assoc($seAuthQueAccUser);

    if($nAuthSelQuerAccUser == 1 ) {
		
		
		?>
              
    <form id="form_del_user_information" name="form_del_user_information" method="post" action="">
      <p>
        <input type="submit" name="btn_del_user_information" id="btn_del" value="DELETE User/Clint" />
      </p>
      <p>
        <input type="text" name="txt_del_user_information" id="txt_del_user_information" />


      </p>
    </form>
    <?php
}    else{
echo " ";
}
         ?>
         
           
 <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($admin_control);
//mysql_free_result($edit);
?>
