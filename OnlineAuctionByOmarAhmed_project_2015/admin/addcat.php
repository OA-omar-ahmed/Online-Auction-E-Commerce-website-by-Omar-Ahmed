<?php  include("admin_session.php");  ?>

<?php   include("head_admin.php");




 ?>

 
      <?php
	  
	  @ session_start();
	  
     $_SESSION['SESSION_admin_id'] ;
			 		   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];


	 // echo"(ID: <h6> $sessionIdAuth </h6> ) ";
    // include("../admin/include/config.php");
 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordAcc = 'AdminAddCategory';
    $seAuthQueAcc = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWordAcc ."%' "); 
    $nAuthSelQuerAcc = mysql_num_rows($seAuthQueAcc);
    $rowAuthSAcc = mysql_fetch_assoc($seAuthQueAcc);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerAcc != 1 ) {
				  echo"<div class='no_o'> <h2>You are not authorized to enter this page.</h2> </div>";

	echo'<meta http-equiv="Refresh" content="5;url=http://localhost/onlineauctionweb/admin/setting.php">';
	exit;}
		?>
        
  


<div class="head_o"><h2> <a href="addcat.php">ADD  </a> CATEGORIES </h2></div>

<?php

   
// include("./include/connection.php");

$con=mysqli_connect("localhost","omar","12345","A_MSHROA_A");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:". mysqli_connect_error();
}
 
	$nm = $_POST['txt_name'];
	$cm = $_POST['cc_cat'];
	
	if($_POST['addcat']) {
		if($nm == ''){
			echo"<div class='no_o'>You did not enter the name of the category.</div>";
			echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/addcat.php">';
				
			
		exit; }
		else{
		
		$add = "insert into  cat (name_cat, cid_cat) values('$nm','$cm')";
if(mysqli_query($con,$add))
				echo"<div class='ok_o'>The category added Successfully</div>";
				echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/addcat.php">';
				

		
		
		}
		
	}
		
?>

<table width="25%" border="0" align="right"> 
<tr class="ok_o">
  <td colspan="2" > <a href="editcat.php">   &lt;&lt; Go to Control CATEGORIES page</a></td>
</tr>
</table>

<div class="bodypanel"> 
<form name="form1" method="post" action="">

<table width="100%" border="0" align="center"> 

<tr>
<td> Category name: </td>

<td> 
  <p>

    <input type="text" name="txt_name" id="txt_name">
  </p></td>
</tr>

<tr>
<td> Category Type: </td>

<td> 
<select name="cc_cat">
<option value="0">main category</option>


<?php

// include("./include/config.php");

$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


	$s =mysql_query("select * from cat");

    while($r = mysql_fetch_assoc($s)){
    $id = $r['cid'];
    $name = $r['name_cat'];
	echo "<option value='$id'> $name </option>";

	
    }
	

?>


</select>
</td>
</tr>

<tr>
<td colspan="2" class="head_o">

 <input name="addcat" type="submit" value=" Submit Category "/> 
 </td>
</tr>
</table>

</form>
</div>
<p>&nbsp;</p>

</body>
</html>
