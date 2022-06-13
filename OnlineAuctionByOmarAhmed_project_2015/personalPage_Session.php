

<?php
            
			
			
			

if (!isset($_SESSION)) {
@  session_start();
}

?>

  
  
  
  
  
  <!---- Change Style inshallah work Start -->
  

<?php

//  Start connection

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR);

//  close connection
?>

  
						<a rel="nofollow" href="index.php"><img src="images/omar_auction_logo.png" width="240" height="60" /></a>
                        
<?php
// $user_id = $_SESSION['SESSION_Username'];
$user_NameSession = $_SESSION['SESSION_Username'];

$_SESSION['SESSION_USER_id'] ;
	  $_SESSION['SESSION_Username'] ;
	  $_SESSION['SESSION_user_email'] ;

if( $_SESSION['SESSION_Username'] ==''){
//	echo '<p> <a href="login.php">Log in</a>                           or if you  New <a href="register.php">Register</a></p>';
// echo "<h3>Login:<a href='login.php'></a></h3>";
// echo "<h3>USER Id: ".  $_SESSION['USER_id'] ."</h3>";
// echo "<h2>USER Id ". $SessionUserId ."</h2>";
}

			
			   $SessionUserId = $_SESSION['SESSION_USER_id'] ;





?>


