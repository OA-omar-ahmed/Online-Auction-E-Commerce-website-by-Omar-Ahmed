


<?php  include("head_admin.php"); ?>


      <?php
	  
	  @ session_start();
	  
     $_SESSION['SESSION_admin_id'] ;
			 		   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];


 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordAcc = 'AdminControlCategory';
    $seAuthQueAcc = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWordAcc ."%' "); 
    $nAuthSelQuerAcc = mysql_num_rows($seAuthQueAcc);
    $rowAuthSAcc = mysql_fetch_assoc($seAuthQueAcc);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerAcc != 1 ) {
				  echo"<div class='no_o'> <h2>You are not authorized to enter this page.</h2> </div>";

	echo'<meta http-equiv="Refresh" content="5;url=http://localhost/onlineauctionweb/admin/setting.php">';
	exit;}
		?>
        


<html>
<head>


	<link href="o_ad_style.css" rel="stylesheet" type="text/css">
   
   
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

   
   
</head>

<body>


<div class="head_o" ><h2> Control <a href="editcat.php">Categories  </a></h2> </div>
<?php
include("./include/config.php");

?>

 <table width="25%" border="0" align="right"> 
<tr class="ok_o">
  <td colspan="2" ><a href="addcat.php">[+] Add Category [+] </a></td>
</tr>
</table>

<div class="bodypanel" > 
<table width="60%" border="0" dir="ltr" align="center">
<tr>
<td class="head_o">#</td>
<td class="head_o">Type</td>
<td class="head_o" >Catecory name</td>
<td class="head_o" >Edit</td>
<td class="head_o" >Delete</td>
<!-- <td class="head_o" > <a href="addcat.php">[+] Add Category [+] </a></td> -->


</tr>


<?php

include("./include/config.php");


if($_REQUEST['do']=='remove'){

$gid = intval($_GET['cid']);

$de = mysql_query("delete from cat where cid='$gid'");

if($de){
	echo "<div class='ok_o' > Deleted successfully </div>";
    	echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/editcat.php">';

exit;}

}

################################# confirm delete


if (isset($_POST['delete'])){ //delete clicked

$giddele = intval($_GET['cid']);

$degid = mysql_query("delete from cat where cid='$giddele'");



}






























################################# update


if($_REQUEST['do'] =='update'){
$postname = $_POST['name_cat'];
$postid = $_POST['cid'];
$gidd = intval($_GET['cid']);
$s4 = mysql_query("select * from cat where cid='$gidd'");
$r4 = mysql_fetch_assoc($s4);
$idcat = $r4['cid'];
$namecat = $r4['name_cat'];

if($_POST['edit']){
	
	if($postname == ''){
	echo "<div class='no_o' >You did not enter the category name </div>";
    	echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/editcat.php">';


}else{
	$updat = mysql_query("update cat set name_cat='$postname' where cid='$postid'");
	if($updat){
			 
			 echo "<div class='ok_o' > Updated successfully </div>";
    	echo'<meta http-equiv="Refresh" content="1;url=http://localhost/onlineauctionweb/admin/editcat.php">';

		
		exit;}
	
	}
}

 echo"<form action='editcat.php?do=update' method='post'>
 
 Category Name:  <input name='name_cat' value='$namecat' type='text'/>
  <input name='edit' value='Save' type='submit'/>
    <input name='cid' value='$idcat' type='hidden'/>
  
 </form>";

exit;}




	$se0 =mysql_query("select * from cat ");

    while($row = mysql_fetch_assoc($se0)){
    $id = $row['cid'];
    $name = $row['name_cat'];
	$cid_cat_show = $row['cid_cat'];
	echo " 
<tr>
<td class='head_o'><hr>$id</hr></td>
<td><hr>$cid_cat_show</hr></td>
<td><a target='_blank' href='../clints/cat.php?cid=$id'><hr>$name</hr></a></td>

<td align='center'><a href='?do=update&cid=$id'><hr> EDIT  ( $name )  </hr></a></td>";
 
 // echo "<td><a href='?do=remove&cid=$id'><hr> DELETE </hr></a></td>";
 
echo"
<td align='center'><hr> <form method = 'post' action ='editcat.php?cid=$id'>
<input type='submit' name = 'delete' value=' Delete ( $name ) cat ' onclick='return deleletconfig()' /></form></hr></td>

</tr>

  ";

// echo'';

	
    }

	
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
