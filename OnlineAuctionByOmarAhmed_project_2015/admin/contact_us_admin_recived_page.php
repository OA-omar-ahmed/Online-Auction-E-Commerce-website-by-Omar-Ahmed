<?php  include("admin_session.php");  ?>

<?php // require_once('../Connections/connection.php'); 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 



?>
  <?php  include("head_admin.php"); 
  
  
  ?>



<!-- 	<link href="bootstrap.min.css" rel="stylesheet" type="text/css">  -->

    <!--<link href="../o_a_c_style.css" rel="stylesheet" type="text/css">-->

    <!--
    <link href="../o_a_c_style.css" rel="stylesheet" type="text/css">
    <link href="o_a_c_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />

-->


<style type="text/css">
.OMAR_STYLE__juice_bg #left_container #main_nav blockquote h4 a strong {
	text-align: center;
}

<!-- start Css style code -->


body {
	background-color: #FFF;

}


/* a { color: #f55b1f; }  */
 a { color: #131e44; }  
a:hover, a:focus { color: #CCFF66; }

.OMAR_STYLE__logo {
	margin-top: 20px;
	text-align: center;
}

/*
.O_A_backGroundBlack {
	
	background: url(images/O_AbackBlack.png) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
  	overflow-x: hidden;
	
	
}


.flexslider { width: 99%; }

.img_left {	float: left; margin-right: 20px; margin-bottom: 15px; }
*/
h1 { text-align: center; color: #e13916; }
h4 { color: #FF961F; }

li { color: white; }
li, input { font-family: Arial, sans-serif; }
li.active a { background-color: rgba(255, 255, 255, 0.2); color: #f55b1f; }

nav { 
	text-align: center; 
	font-family: Arial, sans-serif; 
	margin-top: 30px; 
	margin-bottom: 20px; 
}

p {  color:#0000; font-family: Arial, sans-serif; }
iframe, object, embed { width: 100%; border: none; margin-bottom: 20px; }

hr { 
	display: block; 
	height: 1px; 
	border: 0; 
	border-top: 1px dashed #ccc; 
	margin: 1em 0; 
	padding: 0;
}
article { margin-top: 15px; margin-bottom: 15px; }

.btn { border:solid : 0px; font-family: Arial, sans-serif;  }

.btn-primary { background-color: #666666; border-color: #c48c76; }

.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active { 
	background-color: #b4a9a9; 
	border-color: #c48c76; 
	color:white;
}

.nav > li > a:hover, .nav > li > a:focus { text-decoration: none; background-color: #4e4e4e; color:white; }

.navbar-form { margin-bottom: 20px; }
/*
.form-control { border-radius: 0px; }
.form-control:focus
.credit { padding-bottom: 9px; padding-top: 12px; background-color: rgba(0, 0, 0, 0.5); }

.container {  margin: 0 auto;  background-color: rgba(0, 0, 0, 0.5); } 
.containerO_A {  margin: 0 auto;  background-color: rgba(255, 255, 255, 0.2); }*/


/*.containero_ApersonalPage {  margin: 0 auto;  background-color: rgba(0, 0, 0, 0.5); } 
#left_containerWhiteO_A {  background-color: rgba(255, 255, 255, 0.4);  text-align: center; }
#left_containerWhiteO_A li a { color: #06F; }
*/




/*          /////////////////////

.left-inner-addon { position: relative; }
.left-inner-addon input, .left-inner-addon textarea { padding-left: 30px; }
.left-inner-addon span { position: absolute; padding: 10px 12px; pointer-events: none; }


.float_r { float: right }
.img-thumbnail { border-radius: 0px; background-color: rgba(255, 255, 255, 0.2); border: none; }


.result_output
{
border:1px solid #c3c3c3;
width:100%;
height:600px;
background-color:#ffffff;
color:#000000;
}

.border{  dispay: block;  padding: 20px 28px 14px 40px; margin:auto color:#FFF; text-decoration:none; border: 2px inset #FFF;  }

#left_container {  background-color: rgba(0, 0, 0, 0.4);  text-align: center; }
#left_container li a { color: white; }

#right_container .row { clear: both; padding-top: 0px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px; }
#right_container .col-md-7 { padding-left: 0px; }
#right_container .right_container_title {cursor:text;}
#right_container .right_container_title:hover {text-decoration:none; color:#f55b1f;}

#right_container h2 { color: #f55b1f; }
#right_container h3 { color: #f55b1f; } 


*/



/*
#omar_footer2 { color: #FFFFFF; font-size: 0.8em; text-align: center; font-family: Arial, sans-serif; }


#omar_footer3 { color: #FFFFFF; font-size: 0.8em; text-align: right; font-family: Arial, sans-serif; }


#omar_footer { background: #07080a ; height: 80px; width:1270px;}
#omar_footer ul{list-style: none;  }
#omar_footer ul li{ float:left }
#omar_footer ul li a{  dispay: block;  margin:20px;  font-size:17px; color:#323037; text-decoration: underline;  }
#omar_footer ul li a:hover{ color:#CCC; font-size:18px;  }
*/


/*  //////
#logoutok ul{list-style: none;  }
#logoutok li{ list-style: none; float: right;}
#logoutok li a{  dispay: block;  background-color: #333d74; padding: 12px; color: #FFF; text-decoration:none;   border: 2px dotted #FFF  }
#logoutok li a:hover{ background: #333d74; font-size:16px; border: 2px dotted #222222;  }


#home_btn{list-style: none;  }
#home_btn li{ float: left; }
#home_btn  li a{  dispay: block; background-image:url(../admin/images/omar_auc_logo.png); padding: 20px 28px 14px 40px; margin:auto color:#FFF; text-decoration:none; border: 2px inset #333d74;  }
#home_btn li a:hover{ background-image:url(../admin/images/omar_auc_logo.png); font-size:18px;  }



#navbar ul{list-style: none;  }
#navbar ul li{ float: left; border: 2px inset #FFF; }
#navbar ul li a{  dispay: block;  background-color:#070e39; padding: 12px; color:#FFF; text-decoration:none;   border: 2px ridge #FFF ; }
#navbar ul li a:hover{ background: #333d74; font-size:15px;  }

*/

@media only screen and (max-width: 480px) {
 article img { margin-bottom: 10px; }
 article .btn { margin-bottom: 20px; }
 h4, p { text-ali { 
	border-color: rgba(245, 91, 31, 0.8); 
	outline: 0; 
	-moz-box-shadow: 0 0 8px rgba(241, 50, 150, 0.6); 
	box-shadow: 0 0 8px rgba(241, 50, 150, 0.6) !important; 
}
gn: center; }
 .btn { margin: 0 auto; }
}

@media only screen and (min-width: 992px) {
  .container {  display: table; }
  #left_container { display: table-cell; height: 100%; }
  #right_container {  padding-top: 10px; display: table-cell;}
  .col-md-3, .col-md-9 { float: none; }
}

@media only screen and (max-width: 991px) {
  .container { display: block; }
  #left_container { display: block; height: auto; padding-top: 10px; padding-bottom: 20px; }
  #right_container { display: block; }
  #right_container .col-md-7 { padding-left: 15px; }
}




<!-- Close Css style code -->
</style>





 <body class="OMAR_STYLE__juice_bg"> 
	
    <div id="main_container">
    
    
    
		<div class="container" id="home">
	
    
    
    
    
    		<div class="row col-wrap">			 
				
				
                
				
				<div id="left_container" class="col col-md-3 col-sm-12">
                	
                    
                    
					<nav id="main_nav">
                    
                    
                    
						<ul class="nav">
<!--
<p>&nbsp;</p>




                            
                            <li class="active"><a href="omer.php">Home</a></li>
                    
							<li><a href="personalPage.php">Personal Page</a></li>
                            
							  <li><a href="addprod.php">Post an Auction</a></li>
						</ul>
			    </nav>
                
					<form  action="index.php" method="POST" class="navbar-form" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" id="txt_search" name="txt_search">
						</div>
						<button type="submit" class="btn btn-primary" id="btn_search" name="btn_search">Go</button>
					
                    
                    -->
                    
                    
                    
                    
                    
                    
               
   <hr>

                      <ul class="nav">
                       
                       
                       

<div class="head_o"> <h2><strong>Contact Messages</strong></h2> </div>



<?php


// include("./include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);



$s =mysql_query("select * from contact_us_table where ch='0' ");
   $numes = mysql_num_rows($s);
   
echo '<div class="no_o"> <h3><strong>Unread messages</strong></h3> ('.$numes.') </div> ';
 
    while($r = mysql_fetch_assoc($s)){
    $id = $r['id'];
    $name = $r['name'];
	$title = $r['title'];
	echo "<li><a href='contact_us_admin_recived_page.php?id=$id'>$title ($name)</a></li>";
 
	
    }
	

?>

	<p>&nbsp;</p>
<hr>
    <hr>
    


<div class=""> <h3><strong></strong></h3> </div>



<?php


// include("./include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);



$ssr =mysql_query("select * from contact_us_table where ch='1' ");
 $numssr = mysql_num_rows($ssr);
   
echo '<div class="bodypanel"> <h3><strong>Read Messages</strong></h3> ('.$numssr.') </div> ';
    while($rrr = mysql_fetch_assoc($ssr)){
    $id = $rrr['id'];
    $name = $rrr['name'];
	$title = $rrr['title'];
	echo "<li><a href='contact_us_admin_recived_page.php?id=$id'>$title ($name)</a></li>";

	
    }

	
?>













                       
                       
   
   </ul>
   </hr>
   
				  </nav>
					<p>&nbsp;</p>
					<div>
			
					</div>
				</div>
				
				
				
				
<div id="right_container" class="col col-md-9 col-sm-12">
                
                
                
                
					<div class="row">
                    	<div class="col col-md-12">
                        
                    		<h2>Welcome <a href="http://es.photohq.com" title="Foto" class="right_container_title"  >to</a> O Auction</h2> 
                
                 <p>&nbsp;</p>
                
                
                
                
                
              


<div class="head_o">Contact us Messages</div>

              
                
                
                
          

<div class="no_o">Unread Messages</div>

                  

<?php

// include("./include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


 $gid = intval($_GET['id']);
 
 
$sel = mysql_query("select * from contact_us_table where id='$gid'");



if($_REQUEST['do'] == 'remove'){
	$gid = $_GET['id'];
    $del= mysql_query("delete from contact_us_table where id='$gid'");
	if($del){
    	echo"<div class='ok_o'> Deleted successfully </div>";
        	echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/admin/contact_us_admin_recived_page.php">';
        
    }

}


echo '<table width="%100" dir="ltr">';
While ($row = mysql_fetch_assoc($sel)){


$id = $row['id'];
$name= $row['name'];	
$title	= $row['title'];
$email	= $row['email'];
$msg = $row['msg'];
$ch = $row['ch'];




if ($ch == 0 ){
	
 $acc= 1 ;
$ch_date=date("Y-m-d H:i:s");

  $updateSQL = "UPDATE contact_us_table SET ch='$acc', ch_date='$ch_date' WHERE id='$id'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());




echo"

<tr>
<td colspan='2' class='head_o'> $id </td>
</tr>

<tr>
<td>id </td>
<td>$id </td>
</tr>

<tr>
<td>Name</td>
<td>$name </td>
</tr>

<tr>
<td>Title </td>
<td> $title</td>
</tr>

<tr>
<td>Email </td>
<td> $email</td>
</tr>

<tr>
<td> Message</td>
<td>$msg </td>
</tr>


<tr>
<td> Controll</td>
<td colspan='1' class='no_o'><a href='?do=remove&id=$id'>Delete </td>
</tr>

<br/>

";
}


}



echo '</table>';


	
	

?>




<div class="no_o"> </div>


                
  
                              
                            
                            
                              
                          <?php
//                     include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);



 $gidd = intval($_GET['id']);
  
    $se = mysql_query("select * from contact_us_table where id='$gidd' and ch='1' ");
    $nume = mysql_num_rows($se);
    $rowe = mysql_fetch_assoc($se);
    
	  $email = $rowe['email'];
	  
	  
	  

	  
    if($nume == 0 or $nume <0) {
   
		  echo"<div class='no_o'> <h2>No messages before or read</h2> </div>";
			   

    
    }else{
   $sell2 = mysql_query("select * from contact_us_table where email='$email' and ch='1' order by ch_date DESC");
   $numsell2 = mysql_num_rows($sell2);
  
    echo"<div class='bodypanel'>Read messages from same E-mail ($numsell2)";
  
echo '<table width="%100" dir="ltr">';
While ($row3 = mysql_fetch_assoc($sell2)){


$id2 = $row3['id'];
$name2= $row3['name'];	
$title2	= $row3['title'];
$email2	= $row3['email'];
$msg2 = $row3['msg'];
$ch_date2 = $row3['ch_date'];


echo"

<tr>
<td colspan='2' class='head_o'> $id2 </td>
</tr>

<tr>
<td>id </td>
<td>$id2 </td>
</tr>

<tr>
<td>Name</td>
<td>$name2 </td>
</tr>

<tr>
<td>Title </td>
<td> $title2</td>
</tr>

<tr>
<td>Email </td>
<td> $email2</td>
</tr>

<tr>
<td> Message</td>
<td>$msg2 </td>
</tr>




<tr>
<td> Date</td>
<td>$ch_date2 </td>
</tr>


<tr>
<td> Controll</td>
<td colspan='1' class='no_o'><a href='?do=remove&id=$id'>Delete </td>
</tr>



<br/>

";


}

    echo" </div>";

echo '</table>';



  
  
  
  
  
  
  
  
  
  
	}
	
	
	?>
	
	                   
                              
                              
                              
                              
                              
                              
                              
                              </p>
                               <p>&nbsp;</p>
        				</div>
                        
                    </div>
                    
                    
                    

