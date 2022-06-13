<?php

@ session_start();
 if(!isset($_SESSION['SESSION_admin_id']) or !isset($_SESSION['SESSION_admin_pass'])){



echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/admin/admin_login.php">';

exit;}





$sessionIdButIwroteEmailAsTry = $_SESSION['SESSION_admin_id'];
echo '<div class="head_o">						<a rel="nofollow" href="../index.php"><img src="images/omar_auc_logo.png" width="500" height="100" /></a>';

echo " <h4>


( $sessionIdButIwroteEmailAsTry ) WelCome to O_A admin page </h4><h4><a href='admin_logout.php' class='butnAd' > LogOut ! </a></h4></div>";


$Session_Admin_Id = $sessionIdButIwroteEmailAsTry;

?>

