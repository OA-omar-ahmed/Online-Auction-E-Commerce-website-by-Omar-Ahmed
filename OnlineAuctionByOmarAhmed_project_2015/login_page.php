



   <?php 
    include 'header.php';
    
	
	?>
       <?php include 'menu_index.php';?>
<?php

@ session_start();



?>

<?php
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);

?>




<?php


if (isset($_POST['button_login'])){

	$user_email= trim(addslashes(strip_tags(nl2br($_POST['$user_email']))));
	$user_pass=$_POST['user_pass'];
$md5userpass = md5($user_pass);
	if($user_email== '' or $md5userpass== ''){
			echo "<h1>All the data is required</h1>";

	}else{

	$select_user_log = mysql_query("select * from  user_information_table where user_email = '$user_email' and user_password = '$md5userpass'");
	$num = mysql_num_rows($select_user_log);
		if($num == 1){
			$row=mysql_fetch_assoc($select_user_log);
			$dbuser_email = $row['user_email'];
			$dbpassword = $row['user_password'];

			if($dbuser_email == $user_email and $dbpassword == $md5userpass){





			$_SESSION['SESSION_USER_id'] =  $row['user_id'];


	  $_SESSION['SESSION_Username'] = $row['username'];
          $_SESSION['SESSION_user_password'] = $row['user_password'];
	  $_SESSION['SESSION_user_email'] = $row['user_email'];



			echo "<h1> welcome</h1> ".  $row['user_id'] . $row['username'];

				 echo'<meta http-equiv="Refresh" content="0;url= http://localhost/onlineauctionweb/personal_page.php">';

			}
		exsit;}else{

		echo"<h1>The Username or the password is not correct</h1>";

		}
	}

}






?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>



<!-- <p>Welcome to Online Auction Login </p> -->
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

  <form action="login_page.php" method="POST">

 <table bordercolor="#00CCFF" bordercolorlight="#c7d0ee" bordercolordark="#c7d0ee"  width="40%" border="25" cellspacing="2" cellpadding="2" align="center">
 
 

    <tr>
        <td colspan="2" align="center" ><h1><strong>OnlineAuction Login </strong></h1></td>

    </tr>




          <tr> <td width="50%"><h4><strong> E-mail: </strong></h4></td>
          <td width="50%"><input type="text" name="$user_email"><br></td>
          </tr>


           <tr> <td width="50%"><h4><strong>Password: </strong></h4></td>
           <td width="50%"> <input type="password" name="user_pass"><br></td>
           </tr>


            <tr>
        <td colspan="2" align="center">


          <p>
            <input type="submit" name="button_login" value="     Login     ">
          </p>   </td>
       
       
       
       
      
   
</tr>

    </table>
</form>

 <table bordercolor="#0bd6f7"  border="2" align="center">

            <tr>
            
            
       <td>

               <p>    If you  New <a href="registeration_page.php">Register</a>

            </td>
   
</tr>

</table>

<p>&nbsp;</p>
</body>
</html>
   
   <?php 
    include 'footer.php';?>