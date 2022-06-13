



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
            
            
            
            
            
            
             

<?php 



@ session_start();


?>



<?php
if($_SESSION['SESSION_USER_id'] =='' ){
echo 'Please <a href="login_page.php">Log in</a>
                          or if you  New <a href="registeration_page.php">Register</a>
 ';	
	
}
if($_SESSION['SESSION_USER_id'] !='' ){
echo 'Do you want to  <a href="logout_page.php">Log out</a> !
                         
 ';	
	
}

?>
                          
   
     
     
       <p>&nbsp;</p>     <p>&nbsp;</p>     <p>&nbsp;</p>
     
                 
                 
                  
                    <?php include 'adv_show.php';?>
                 
                 	
            
            
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
                 
                 
<?php


if($_SESSION['SESSION_USER_id'] !='' ){


 include 'o_auction_header.php';
	
}

?>
       
                    <?php // include 'o_auction_header.php';?>
 <?php include 'Search_in_free_advertisements.php';?>
 
                 
                 