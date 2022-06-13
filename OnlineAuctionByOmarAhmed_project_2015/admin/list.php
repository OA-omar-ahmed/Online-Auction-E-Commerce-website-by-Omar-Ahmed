<?php  include 'admin_session.php';?>


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

$post_id_auction=$_POST['hd_del'];

  $deleteSQL_auction = "DELETE FROM items_table WHERE Id='$post_id_auction'";

  mysql_select_db($database_connection, $connection);
  $Result_auction = mysql_query($deleteSQL_auction, $connection) or die(mysql_error());

	echo'<h2>Item Deleted Successfully</h2><meta http-equiv="Refresh" content="3;url=http://localhost/onlineauctionweb/admin/list.php">';
	
}




if ((isset($_POST['hd_del_all'])) && ($_POST['hd_del_all'] != "")) {
  $deleteSQLall = "DELETE FROM items_table WHERE Accept_Refuse='2'";

  mysql_select_db($database_connection, $connection);
  $Resultall = mysql_query($deleteSQLall, $connection) or die(mysql_error());
}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form5")) {
$acc=$_POST['auc_acc'];
$hd_Accept_Refuse_date=date("Y-m-d H:i:s");
$hd_edit=$_POST['hd_edit5'];

  $updateSQL = "UPDATE items_table SET Accept_Refuse='$acc', Accept_Refuse_date='$hd_Accept_Refuse_date' WHERE Id='$hd_edit'";

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
	$query_admin_control = "SELECT * FROM items_table WHERE Accept_Refuse LIKE'%".$word."%' ORDER BY Id DESC ";
}

else

{
  	$searchword = $_POST['txt_search'];
		$word = $_POST['auc_admin_st'];
	$query_admin_control = "SELECT * FROM items_table WHERE Name LIKE'%".$searchword."%' OR Id LIKE'%".$searchword."%' OR user_id LIKE'%".$searchword."%'";
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
    <input type="hidden" name="hd_del_all" id="hd_del_all" value="<?php echo $row_admin_control['Accept_Refuse']; ?>"/>
</form>
<hr>
<p>&nbsp;</p>



<?php  include 'head_admin.php';?>
<form id="form3" name="form3" method="post" action="">
 <hr> <hr>
  <label for="txt_search">Search by Auction Id, User Id, or Auction Name</label>
  <input type="text" name="txt_search" id="txt_search" />
  <input type="submit" name="btn_search" id="btn_search" value="Submit" />
  <hr>
<p>Advanced search:</p>
<table width="200">
 
  <tr>
    <td><label>
      <input type="radio" name="auc_admin_st" value="0" id="auc_admin_st4" />
      ###View Wait###</label></td>
  </tr>
  
    <tr>
            <td><label>
<input type="radio" name="auc_admin_st" value="5" id="auc_admin_st5" /> 

              <!-- <input type="radio" name="auc_acc" value="0" id="auc_acc_0" />  -->
              !#!I don't know!#!</label></td>
          </tr>

  
   <tr>
    <td><label>
      <input type="radio" name="auc_admin_st" value="1" id="auc_admin_st3" />
      View Accepted</label></td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="auc_admin_st" value="2" id="auc_admin_st5" />
      View Refuseed</label></td>
  </tr>
</table>



<p><a href="list.php"> Show All</a></p>
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
    <td>Id</td>
    <td>User_id</td>
    <td>Image</td>
    <td>Model</td>
    <td>Name</td>
    <td>Currency</td>
    <td>StartPrice</td>
    <td>BuyNowPrice</td>
    <td>Status</td>
    <td>Country</td>
    <td>City</td>
    <td>pic</td>
    <td>Title</td>
    <td>Contact</td>
    <td>Description</td>
    <td>expired_date</td>
    <td>posted_date</td>
    <td>
    
Status
 (Accepted == 1) (StopByUser == 3) (StopByAdmin == 5) (Refused == 2) (Wait == 0) 
 (Page closed by user == 7 )

    </td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <?php do { ?>
  <tr>
    <td>&nbsp;</td>
    <td><p><?php echo $row_admin_control['Id']; ?></p>
      <p>&nbsp;</p>
      <p>#Status: (
        <?php
	   echo $row_admin_control['Accept_Refuse'];
	   ?>
)</p>      <?php if ($row_admin_control['Accept_Refuse']=='1'){
		echo "<strong>Accepted</strong>";  
		  
	  }
	  if ($row_admin_control['Accept_Refuse']=='2'){
		echo "<strong>Refused</strong>";  
		  
	  }
	  if ($row_admin_control['Accept_Refuse']=='5'){
		echo "<strong>Need help</strong>";  
		  
	  }
	  
	  if ($row_admin_control['Accept_Refuse']=='0'){
		echo "<strong>##### Wait #####</strong>";  
		  
	  }
	  
	  
	   ?></td>
    <td><?php echo $row_admin_control['user_id']; ?></td>
<td><a href="../upload/<?php echo $row_admin_control['pic']; ?>"><img src="../upload/<?php echo $row_admin_control['pic']; ?>" width="150" height="200" /><br>Show Img</a></td>
    <td><?php echo $row_admin_control['imgName']; ?></td>
    <td><?php echo $row_admin_control['Name']; ?></td>
    <td><?php echo $row_admin_control['Currency']; ?></td>
    <td><?php echo $row_admin_control['StartPrice']; ?></td>
    <td><?php echo $row_admin_control['BuyNowPrice']; ?></td>
    <td><?php echo $row_admin_control['Status']; ?></td>
    <td><?php echo $row_admin_control['Country']; ?></td>
    <td><?php echo $row_admin_control['City']; ?></td>
    <td><?php echo $row_admin_control['pic']; ?></td>
    <td><?php echo $row_admin_control['Title']; ?></td>
    <td><?php echo $row_admin_control['Contact']; ?></td>
    <td><?php echo $row_admin_control['Description']; ?></td>
    <td><?php echo $row_admin_control['expired_date']; ?></td>
    <td><?php echo $row_admin_control['posted_date']; ?></td>
    <td><form id="form5" name="form5" method="post" action="<?php echo $editFormAction; ?>">
      <p>&nbsp;</p>
      <table width="200">
        <tr>
          <td><label>

<!--
            <input type="radio" name="auc_acc" value="1" id="auc_acc_1" /> -->
            
            
            
            
            
            
                        <?php       if($row_admin_control['Accept_Refuse']=='1'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
		               <input type="radio" name="auc_acc" value="1" id="auc_acc_1" />
		   
		   ';}  ?>
          
             
            
            
            
                        <?php     /*  if($row_admin_control['Accept_Refuse']=='1'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
		               <input type="radio" name="auc_acc" value="1" id="auc_acc_1" />
		   
		   ';} 
		   
		   */
		   
		    ?>
           
            
            
            
            Accept</label></td>
        </tr>
        
        
        <tr>
          <td><label>
          
          <!--
            <input type="radio" name="auc_acc" value="0" id="auc_acc_0" />
            -->
            
     
                        <?php     if($row_admin_control['Accept_Refuse']=='0'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
		          <input type="radio" name="auc_acc" value="0" id="auc_acc_0" />
		   
		   ';}  ?>
           
            
   ###Wait###</label></td>
        </tr>
        
         <tr>
            <td><label>

<!-- 
<input type="radio" name="auc_acc" value="5" id="auc_acc_0" /> 
-->


      
            
            
     <?php       if($row_admin_control['Accept_Refuse']=='5'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
<input type="radio" name="auc_acc" value="5" id="auc_acc_5" /> 
		   
		   ';} 
		   
		  
		   
		    ?>
           
           
           
           
   
            ### I don't know ###</label></td>
          </tr>

        
        <tr>
          <td><label>
          
          
          
            
     <?php       if($row_admin_control['Accept_Refuse']=='2'){	echo '<img src="images/rightIcon.png" alt="Follow us on Twitter"  width="20" height="20" >'; 	   }else{ echo'
	 
  <input type="radio" name="auc_acc" value="2" id="auc_acc_2" />
		   
		   ';} 
		   
		  
		   
		    ?>
           
           
           
           
          
<!--
            <input type="radio" name="auc_acc" value="2" id="auc_acc_2" />
            -->
            
            
            
            
            Refuse</label></td>
        </tr>
      </table>
      <p>
        <input type="hidden" name="MM_update" value="form5" />
        <input name="hd_edit5" type="hidden" id="hd_edit5" value="<?php echo $row_admin_control['Id']; ?>" />
        <input type="hidden" name="hd_Accept_Refuse_date" id="hd_Accept_Refuse_date" />
      </p>
      <p>
      
      
        
            
      <?php
     
			 		   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];



 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordRefu = 'AdminConrolDailyAuction';
    $seAuthQueRefu = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWordRefu ."%' "); 
    $nAuthSelQuerRefu = mysql_num_rows($seAuthQueRefu);
//    $rowAuthSRefu = mysql_fetch_assoc($seAuthQueStP);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerRefu == 1 ) {
		
		
		?>  
        
        
      
      
        <input type="submit" name="btn_edit" id="btn_edit" value="OK" />
        
     
        
           
    <?php
	   
	  
	}else{
		echo "<hr> No Authorization <hr>";	


		
	}




?>
 
        
        
        
        
        
        
      </p>
   
    </form>
   <p><?php echo $row_admin_control['Accept_Refuse_date']; ?></p>
   <p>#Status:
     <?php if ($row_admin_control['Accept_Refuse']=='1'){
		echo "<strong>Accepted</strong>";  
		  
	  }
	  if ($row_admin_control['Accept_Refuse']=='2'){
		echo "<strong>Refused</strong>";  
		  
	  }
	  if ($row_admin_control['Accept_Refuse']=='0'){
		echo "<strong>##### Wait #####</strong>";  
		  
	  }
	  	  if ($row_admin_control['Accept_Refuse']=='5'){
		echo "<strong>Stoped (do not know)</strong>";  
		  
	  }
	  
	  
	   ?>
   </p></td>
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


    $seaAdminAuthWord = 'AdminUpdateAuction';
    $seAuthQue = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWord."%' "); 
    $nAuthSelQuer = mysql_num_rows($seAuthQue);
    $rowAuthS = mysql_fetch_assoc($seAuthQue);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuer == 1 ) {
		
		
		?>
        
  <form id="form2" name="form2" method="post" action="edit.php">
      <p>  <input type="submit" name="btn_edit" id="btn_edit" value="Update" /></p>
      <p>
        <input name="hd_edit" type="hidden" id="hd_edit" value="<?php echo $row_admin_control['Id']; ?>" />
      </p>
    </form>
    
    <?php
	   
	  
	}else{
		echo "<hr>UNAUTHORIZED <hr>";	
	}




?>

  <!--  <td><form id="form2" name="form2" method="post" action="edit.php">
      <p>
        <input type="submit" name="btn_edit" id="btn_edit" value="Update" />
      </p>
      <p>
        <input name="hd_edit" type="hidden" id="hd_edit" value="<?php // echo $row_admin_control['Id']; ?>" />
      </p>
    </form></td>
    
    -->
    
   
   
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


    $seaAdminAuthWordDeLeT = 'AdminDeleteAuction';
    $seAuthQueDeLeT = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWordDeLeT ."%' "); 
    $nAuthSelQuerDeLeT = mysql_num_rows($seAuthQueDeLeT);
//    $rowAuthSDeLeT = mysql_fetch_assoc($seAuthQueStP);

    if($nAuthSelQuerDeLeT == 1 ) {
		
		
		?>
        
   
   
   
    
    <form id="form1" name="form1" method="post" action="">
      <p>
        <input type="submit" name="btn_del" id="btn_del" value="DELETE" />
      </p>
      <p>
        <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_admin_control['Id']; ?>" />
      </p>
    </form>
    
    
    
      
           
           
    <?php
	   
	  
	}else{


		echo "<hr> UNAUTHORIZED <hr>";	
		
	}




?>
 
                     
                 
    <!--
    
    <form id="form1" name="form1" method="post" action="">
      <p>
        <input type="submit" name="btn_del" id="btn_del" value="DELETE" />
      </p>
      <p>
        <input name="hd_del" type="hidden" id="hd_del" value="<?php // echo $row_admin_control['Id']; ?>" />
      </p>
    </form>
    
    
    -->
    
    
    </td>
  </tr>
  <?php  } while ($row_admin_control = mysql_fetch_assoc($admin_control)); } ?>
</table>
<input type="submit" name="btn_edit2" id="btn_edit2" value="Update" />
<p>&nbsp;</p>
<a class="AdmnBut_O_A" href="list.php"> Show All</a> <a class="AdmnBut_O_A" href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, 0, $queryString_admin_control); ?>">First</a> 
<a class="AdmnBut_O_A" href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, max(0, $pageNum_admin_control - 1), $queryString_admin_control); ?>">&lt;&lt; Previous</a> 
<a class="AdmnBut_O_A" href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, min($totalPages_admin_control, $pageNum_admin_control + 1), $queryString_admin_control); ?>">Next &gt;&gt;</a> 
<a class="AdmnBut_O_A"  href="<?php printf("%s?pageNum_admin_control=%d%s", $currentPage, $totalPages_admin_control, $queryString_admin_control); ?>">Last</a> 
<p>Results found: <?php echo $totalRows_admin_control ?></p>
 

</body>
</html>
<?php
mysql_free_result($admin_control);
//mysql_free_result($edit);
?>
