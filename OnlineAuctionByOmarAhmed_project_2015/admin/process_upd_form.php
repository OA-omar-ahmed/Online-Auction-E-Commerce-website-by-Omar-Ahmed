<?php  include("admin_session.php");  ?>

<!--

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
-->








<?php

include("./include/config.php");

$gidduserubda =$_POST['0']['USERBLOCKED'];
$interest[user_id]=  intval($_GET['user_id']);

$gidduserid = intval($_GET['user_id']);
 $upda ="UPDATE users SET user_stat='$gidduserubda' WHERE user_id='$gidduserid'";
//$de = mysql_query("delete from users where user_id='$gidduserdel'");

if($upda){
	echo "<div class='ok_o' > Updated user successfully </div>";
    	echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/delete_user.php">';
}
?>


































<?php
/*
include("./include/config.php");




$gid = intval($_GET['row222_users']);

$de = mysql_query("delete from cat where cid='$gid'");

if($de){
	echo "<div class='ok_o' > Deleted successfully </div>";
    	echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/editcat.php">';
*/
?>


