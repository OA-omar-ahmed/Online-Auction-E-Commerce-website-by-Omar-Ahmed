<?php  include("admin_session.php");  ?>


<?php  include("head_admin.php"); ?>

<div class="head_o">Add an Admen </div>




<?php 


$con=mysqli_connect("localhost","omar","12345","A_MSHROA_A");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:". mysqli_connect_error();
}

 
$Padmin_name= addslashes(strip_tags($_POST['admin_name']));

$Padmin_pass = md5($_POST['admin_pass']);
$Padmin_email= addslashes(strip_tags($_POST['admin_email']));
$Padmin_phone= addslashes(strip_tags($_POST['admin_phone']));
$Padmin_info= addslashes(strip_tags($_POST['admin_info']));
if($_POST['SendAddAdmind']){
	if($Padmin_name == '' or $Padmin_pass =='' or $Padmin_email == '' or $Padmin_phone =='' or $Padmin_info =='')	{
	
	echo"<script>alert(\" All textboxes are required\");</script>";
	
		



	}elseif(strlen($admin_info) > 500){
echo"<script>alert(\"Message shuld be less than 300 character\");</script>";		
	
	}elseif(!preg_match("/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,4})/",$Padmin_email )) {
echo"<script>alert(\"The E-mail is not correct\");</script>";		

	}else{

	$AdminSta = 0 ;
		$add = "insert into admin_table (admin_id, adminStatus, admin_name, admin_pass, admin_email, admin_phone, admin_info) values('','$AdminSta','$Padmin_name','$Padmin_pass','$Padmin_email','$Padmin_phone','$Padmin_info')";
if(mysqli_query($con,$add)) {
				echo"<div class='ok_o'><h1>The Admin added Successfully</h1></div>";
				echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/addAdmin.php">';
				

	}
		
	}
	
}

?>




<div class="bodypanel"> 
<form name="form1" method="post" action="">

<table width="100%" border="0"> 

<tr>
<td> Admin name: </td>

<td> 
  <p>

    <input type="text" name="admin_name" id="admin_name">
  </p></td>
</tr>

<tr>

<tr>
<td> Admin password: </td>

<td> 
  <p>

    <input type="password" name="admin_pass" id="admin_pass">
  </p></td>
</tr>

<tr>


<tr>
<td> Admin Email: </td>

<td> 
  <p>

    <input type="text" name="admin_email" id="admin_email">
  </p></td>
</tr>

<tr>


<tr>
<td> Admin phone: </td>

<td> 
  <p>

    <input type="text" name="admin_phone" id="admin_phone">
  </p></td>
</tr>

<tr>


<tr>
<td> Admin information: </td>

<td> 
  <p>
    <textarea name="admin_info" cols="60" rows="30" id="admin_info"></textarea>
  </p></td>
</tr>

<tr>
<td colspan="2" class="head_o">

 <input name="SendAddAdmind" type="submit" value=" Submit "/> 
 </td>
</tr>
</table>

</form>
</div>
<p>&nbsp;</p>
</body>
</html>
