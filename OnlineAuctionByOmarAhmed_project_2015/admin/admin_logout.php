<?php
ob_start();
 @ session_start();


 if(!isset($_SESSION['SESSION_admin_id']) or !isset($_SESSION['SESSION_admin_pass'])){

echo "<h1>Logout successfully inshallah</h1>";
	echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/admin/admin_login.php">';

exit; }else{
	session_destroy();
	die("<h1>LogOut is Done inshallah !! </h1>"); 
 }



ob_end_flush();


?>