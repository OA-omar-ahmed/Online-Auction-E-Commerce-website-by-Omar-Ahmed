



<?php 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


?>



<?php // include 'header.php';?>





<style type="text/css">
.O_a_menu {background-color:#FFF;
#left_container #main_nav blockquote h4 a strong {
	text-align: center;
}

</style>
<body class="O_a_menu">
	
    <div id="main_container">
    
    
    
		<div class="container" id="home">
	
    
    
    
    
    		<div class="row col-wrap">			 
				
				
                
				
				<div id="left_container" class="col col-md-3 col-sm-12">
                	
					<nav id="main_nav">
                    
                    
                    
						<ul class="nav">

<p>
                    		<a rel="nofollow" href="omer.php"><img src="images/omar_auction_logo.png" width="240" height="60" /></a></p>





                            <li><a href="index.php">Home</a></li>
                    
							<li class="active"><a href="personal_page.php">Personal Page</a></li>
                            
						
						</ul>
            
            
            
             
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
                  
             



           <?php // include 'header.php';?>


<style type="text/css">





.UserImgUser{ border: 1px solid #CCC; border-radius: 100px;  margin:0px 20px 0px 0px; }

.AucclasImgAuc{ border: 2px solid #0000; border-radius: 8px; color: #0000; background:#FFF; display: font-size: 30px;  padding: 4px; margin:0px 0px 0px 0px; } 

.StyleADVPAgeO_A{ border: 2px solid #06F; border-radius: 12px; color: #06F; background: #FFF; display: font-size: 55px;  padding: 6px; margin:2px 4px 4px 6px; }

</style>



    <div class="StyleADVPAgeO_A">

<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>





   <?php
   // personalPageFrindAuctions.php
@ session_start();
   
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);

?>

    
    
  <?php 
 

if($_SESSION['SESSION_Username']==''){
	
	
	echo ' <table   width="40%" border="25" cellspacing="2" cellpadding="2" align="center">
	    <tr>
        <td colspan="2" align="center" >
	<h1>You should login to view your content please. </h1></td>

    </tr></table>';
	
	
	
	
	 echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/login_page.php">';
	
exit;}
	
			$_SESSION['SESSION_USER_id'];
?>

    
    
  <!--   You are following  -->
      
      
      <?php
echo "<h4>My watching list</h4><h6> Working right now </h6><hr>";

// include("../admin/include/config.php");
$UserSesion_idU = $_SESSION['SESSION_USER_id'];

//echo $UserSesion_idU;
/*	$s =mysql_query("select * from  frind_t where id_send_request='$sesion_watch_auction_id	' ");

    $num_frinds = mysql_num_rows($s);
echo "<p>You are following <strong>(".$num_frinds.")</strong> user.</p>";
    while($r = mysql_fetch_assoc($s)){
    $id_t = $r['id_t'];
    $id_receive_request = $r['id_receive_request'];
	$id_send_request = $r['id_send_request'];
	*/
		$s_user_t =mysql_query("select * from watch_table where watch_user_id='$UserSesion_idU' order by watch_id desc ");
// $r_user_t = mysql_fetch_assoc($s_user_t);
       $n_user_t = mysql_num_rows($s_user_t);
   while($r_user_t = mysql_fetch_assoc($s_user_t)){
   
		$rwatch_watch_id= $r_user_t['watch_id'];
		
		$rwatch_auction_id= $r_user_t['watch_auction_id'];
 				$rwatch_auctauc_name= $r_user_t['auc_name'];
		
// echo $rwatch_auction_id;

   //}
// if($n_user_t != 0){
	
			$s_auction_t =mysql_query("select * from items_table where Id='$rwatch_auction_id' ORDER BY Id DESC  ");

    $n_auction_t = mysql_num_rows($s_auction_t);

		
		if($n_auction_t != 0){
		
		 
// while($r_auction_t = mysql_fetch_assoc($s_auction_t)){
$r_auction_t = mysql_fetch_assoc($s_auction_t);

$RAucID = $r_auction_t['Id'];
  $RAucName = $r_auction_t['Name'];
$RAucTitle = $r_auction_t['Title'];
$RAucpic = $r_auction_t['pic'];		
$RAucAcceptRefuse = $r_auction_t['Accept_Refuse'];		
$RAucBuyNowPrice = $r_auction_t['BuyNowPrice'];		
// 		 if($RAucAcceptRefuse == '1'){

		 	echo " <li> $rwatch_auctauc_name   <h4>  &gt;&gt;    $RAucTitle </h4><a href='details.php?I=$RAucID'>";
//			echo "<div class='UserImgUser'>  </div>";
		  
//  echo "".$user_f_name."";
//  	        echo"	 <a href ='personalPageChat.php?id_user_rec=$watch_auction_id	' class='btn btn-primary'><img src='images/chatting.png'  width='44' height='44' class='AucclasImgAuc'  ></a>";		
			
			echo " <pre> <img src='upload/$RAucpic'  width='80' height='80' class='AucclasImgAuc' > $RAucName <h6>( $RAucBuyNowPrice )</h6></pre> </a>";
			
			
			?>


<form action="" method="POST">

<input name="po_watchinuserpage" type="hidden" value="<?php echo $r_user_t['watch_id']; ?>">
<input type="submit" name="btn_postWatchVie" value="View" type="button">

<!--<input name="ddddd" type="button" disabled>-->


</form>

<?php

			
	        // echo"	 <a href ='personalPageChat.php?id_user_rec=$watch_auction_id	' class='btn btn-primary'><img src='images/chatting.png'  width='44' height='44' class='AucclasImgAuc'  ></a>";		
			
echo "</li>";
			?>
            
            <form name="form1" method="post" action="">
        <p>
          <input type="submit" name="btn_del" id="btn_del" value="Un Watch">
        </p>
		
        <p>
          <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $r_user_t['watch_id']; ?>">
        </p>
      </form>
            <?php
			
			echo "<h1> OOOMMMAR </h1>";
			

			
		
				 //		 }  // closeif($RAucAcceptRefuse == '1')
				 if($RAucAcceptRefuse != '1'){
echo "<p class='no_o'> Stoped by the owner or an adminstration </p>";
		 }  // close while($r = mysql_fetch_assoc($s))
		 			echo "<hr>";
	}  // closeif($n_auction_t != 0)
}  // closeif($n_user_t != 0)
		
		 
	  
	  
	  
	  
?>


					<div>


            
			    </nav>
   </p>








					<div>
			
					</div>
</div>
				
			
				
				
				<div id="right_container" class="col col-md-9 col-sm-12">
                
                
                
                
					<div class="row">
                    	<div class="col col-md-12">
                        

                 <p>
                       
               
                          
                          </p>
               
                 <p>&nbsp;</p>

                        
                        
                 
                 <p>
 

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

