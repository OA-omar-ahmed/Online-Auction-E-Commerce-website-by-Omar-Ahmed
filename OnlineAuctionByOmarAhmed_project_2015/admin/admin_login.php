
<?php


ob_start();

@session_start(); 

 if(isset($_SESSION['SESSION_admin_id']) or isset($_SESSION['SESSION_admin_pass'])){



echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/admin/setting.php">';
		
 exit;}

?>





  
<html>
<head>


	<link href="o_ad_style.css" rel="stylesheet" type="text/css">
   
   
   
</head>

<body>






<?php 

// include("./include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);





 $post_email = addslashes(strip_tags($_POST['email_textbox']));



$post_password = md5($_POST['password_textbox']);

if($_POST['SendLogInfo']){
	if($post_email == '' or $post_password =='' )	{
	
	echo"<script>alert(\" All textboxes are required\");</script>";
	
			}elseif(!preg_match("/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,4})/",$post_email )) {
echo"<script>alert(\"The E-mail is not correct\");</script>";		

	}elseif(strlen($post_email) > 70){
echo"<script>alert(\"email too long\");</script>";		

	}elseif(strlen($post_password) > 70){
echo"<script>alert(\"Password too long\");</script>";		


	}else{


    $seAdmLog = mysql_query("select * from admin_table where admin_email='$post_email' AND admin_pass='$post_password' "); 
    $numseAdmLog = mysql_num_rows($seAdmLog);

   
    if($numseAdmLog == 1 ) {
   
    $rowseAdmLog = mysql_fetch_assoc($seAdmLog);

$db_id_admin = $rowseAdmLog['admin_id'];
$dbEmail = $rowseAdmLog['admin_email'];
$dbPassword = $rowseAdmLog['admin_pass'];
$dbadminStatus = $rowseAdmLog['adminStatus'];
$dbRowAdminName = $rowseAdmLog['admin_name'];
$dbRowAdminHistory = $rowseAdmLog['adminHistory'];

if($dbEmail == $post_email and $dbPassword == $post_password){
	  
	  $dbRowAdminStatusRe = 2 ;
	   $dbRowAdminStatusAcc = 1 ;
	    $dbRowAdminStatusWai = 0 ;
	    $dbRowAdminStatusSto = 3 ;
		$dbRowAdminStatusOwner = 5 ;
		if($dbadminStatus == $dbRowAdminStatusWai ){

echo "<h2>Welcome <strong>" . $dbRowAdminName . "</strong></h2>";
		   echo "<h1>You are Wait to be accepted </h1>";
		   echo "<a href ='admin_logout.php'>LogOut ! </a>";
	   }
	   if($dbadminStatus == $dbRowAdminStatusRe ){
		
		
		echo "<h2>Welcome <strong>" . $dbRowAdminName . "</strong></h2>";
		   echo "<h1>You are refused </h1>";
		 
		   echo "<a href ='admin_logout.php'>LogOut ! </a>";
	   }

	   	   
		
	     if($dbadminStatus == $dbRowAdminStatusSto ){
		
echo "<h2>Welcome <strong>" . $dbRowAdminName . "</strong></h2>";
		   echo "<h1>You are Stoped for period of time. </h1>";
		   echo "<a href ='admin_logout.php'>LogOut ! </a>";
	   }


	   	// start accepted code
		     if($dbadminStatus == $dbRowAdminStatusAcc ){

			
		   
		   		  $_SESSION['SESSION_admin_id'] = $db_id_admin ;
		  $_SESSION['SESSION_admin_email'] = $dbEmail ;
		  $_SESSION['SESSION_admin_pass'] = $dbPassword ;			   


$GET_SESSION_admin_id = $_SESSION['SESSION_admin_id'];

			  echo"<div class='ok_o'> <h2>Wellcome  ( $dbEmail ) $dbRowAdminName ( $postEmail )  </h2> </div>";

			    
				
				echo "<a href ='setting.php'>Setting </a>";



include("head_admin.php");
				
		   	echo "<h2>Welcome <strong>" . $dbRowAdminName . "</strong></h2>";
		   echo "<h1>You are Accepted </h1>";
		   
		   
		   
		   			  echo"<div class='ok_o'> <h9>Wellcome  			   $GET_SESSION_admin_id </h9> </div>";
		   	   
			   
					
// End accepted code
	   }
	   	   	// End accepted code
			
			
			
			
/* _________________________ OWner inshallah Start _________________________- */
			// start for owner
		     if($dbadminStatus == $dbRowAdminStatusOwner ){



			
		   
		   		  $_SESSION['SESSION_admin_id'] = $db_id_admin ;
		  $_SESSION['SESSION_admin_email'] = $dbEmail ;
		  $_SESSION['SESSION_admin_pass'] = $dbPassword ;			   
 $SESSION_admin_id_owner = $_SESSION['SESSION_admin_id'];
			  echo"<div class='ok_o'> <h2>Wellcome Owner ( $dbEmail ) $dbRowAdminName ( $dbEmail )  </h2> </div>";

			    
				
				echo "<a href ='setting.php'>Setting </a>";


include("head_admin.php");
				
		   	echo "<h2>Welcome <strong>" . $dbRowAdminName . "</strong></h2>";
		   echo "<h1>You are the owner inshallah </h1>";
		   
		   
		   
		   			  echo"<div class='ok_o'> <h9>Wellcome  			   $SESSION_admin_id_owner </h9> </div>";
		   	   	   	
					
// End  code for the owner
					
	   }
	   
/* _________________________ OWner inshallah End _________________________- */
	   
	   
	   
	   	   	// End accepted code
///////////////////////////////////

// close db if
	}  
	// close db if
				
						  
exit;}else{
		
		
			  echo"<div class='no_o'> <h2>The Email or Password are not correct. </h2> </div>";



echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/admin/admin_login.php">';
			  	
		
	}





		
	}
	
}

?>



 <form id="form1" name="form1" method="post" action="">
   <p>&nbsp;</p>
   
<table width="%100" dir="ltr" align="center">
        
   <tr>
   <td class="head_o" colspan="2" >Admin Login</td>
   <td> </td>
   </tr>            
   
                  
   <tr>
   <td>Info: </td>
   <td><input name="email_textbox" type="text" maxlength="70"></td>
   </tr>            
               
   <tr>
   <td>Password: </td>
   <td><input name="password_textbox" type="Password" maxlength="70" ></td>
   </tr>            
          
          
           
               
   <tr>
   <td class="head_o" colspan="2" ><input name="SendLogInfo" value="Login"  type="submit"/></td>
   <td> </td>
   </tr>            
               
     
               
   </table>
   </form>


</body>
</html>






























<?php

ob_end_flush();

?>