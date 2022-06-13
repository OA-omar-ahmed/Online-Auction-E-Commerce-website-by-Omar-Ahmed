<?php  include("admin_session.php");  ?>
<?php // include("head_admin.php"); ?>

<?php  include("head_admin.php"); ?>



<html>
<head>


	<link href="o_ad_style.css" rel="stylesheet" type="text/css">
   
   <!--
<script>
function deleletconfig(){

var del=confirm("Are you sure you want to delete this record?");
if (del==true){
alert ("record deleted")
}else{
alert("Record Not Deleted")
}
return del;
}
</script>
-->
   
   
</head>

<body>


<div class="head_o" >
  <h2>Edit Authontication page </h2> </div>
<?php

// echo " <td><a href='../clints/cat.php?cid=$id'><hr>$name</hr></a></td> ";

?>

<?php
// include("./include/config.php");


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


?>


<div class="bodypanel" > 
<table width="100%" border="0" dir="ltr" align="center">
<tr>
<td class="head_o">#</td>
<td class="head_o">Name</td>
<td class="head_o" >Authorization</td>
<td class="head_o" >
<p>Authority</p>
<hr><hr>
 
<h6>----------------------------//
  //for insert and edit website setting in the setting.php page
  </h6>
    <p>AuthSettingPaGeAucth</p>
  
  
  
  <h6>
  <hr>
  // for categories   in addcat.php  and editcat.php
</h6>
    <p>
  AdminAddCategory
  AdminControlCategory
  </p>
  <h6>
  <hr>
  // list.php     for controll all the auctions / items
  </h6>
    <p>
  AdminUpdateAuction
  AdminDeleteAuction
  AdminConrolDailyAuction
  </p>
  
  <h6>
  <hr>
  // control_admin.php 
  
AdminstrationControlPage  to enter control_admin page and the others inside the page
  </h6>
  
    <p>
 AdminstrationControlPage
  AdminstrationDeleteAdmin
  AdminstrationDeleteUser
  </p>
  <h6>

  <hr>

  // adv.php to controll the fee  adv andd add one //adv_edit.php
    </h6>
    
    <p>
  AdminAcceptAdvertisement
  AdminEditAdvertisement
  AdminDeleteAdvertisement 


  </p>
  
  </h6>
<hr><hr><hr>
                
  
  </td>
<td class="head_o" >Delete</td>
</tr>
<?php

$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);












################################# update


if($_REQUEST['do'] =='update'){
$postname = $_POST['adminAuth'];
$postid = $_POST['admin_id'];
$get_admin_id = intval($_GET['admin_id']);
$s4 = mysql_query("select * from admin_table where admin_id='$get_admin_id'");
$r4 = mysql_fetch_assoc($s4);
$idcat = $r4['admin_id'];
$namecat = $r4['adminAuth'];
echo " <a href='../admin/control_admin.php?admin_id=$id'><hr><h4>Authontication now: </h4>   $namecat<hr><h3>[(<-)Back]</h3></a><br>
";
if($_POST['edit']){
	
	if($postname == ''){
	echo "<div class='no_o' >You did not enter the category name </div>";
    	echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/control_admin.php">';


}else{
	$updat = mysql_query("update admin_table set adminAuth='$postname' where admin_id='$postid'");
	if($updat){
			 
			 echo "<div class='ok_o' >Admin Authentication Updated successfully </div>";
    	echo'<meta http-equiv="Refresh" content="1;url=http://localhost/onlineauctionweb/admin/control_admin.php">';

		
		exit;}
	
	}
}


 echo"<form action='adminAuth.php?do=update' method='post'>

 
 Category Name:  <input name='adminAuth' value='$namecat' type='text'/>
  <input name='edit' value='Save' type='submit'/>
    <input name='admin_id' value='$idcat' type='hidden'/>
  
 </form>";

exit;}



		
?>
</table>
<p>&nbsp;</p>
<hr>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
