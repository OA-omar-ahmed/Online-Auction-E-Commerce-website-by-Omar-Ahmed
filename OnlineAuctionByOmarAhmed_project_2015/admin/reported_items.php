<?php  include("admin_session.php");  ?>

<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>




-->
















<?php // require_once('../Connections/connection.php'); 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 



?>
  <?php  include("head_admin.php"); ?>
<link href="../clints/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	
    <!--<link href="o_a_c_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />

-->


<style type="text/css">
.OMAR_STYLE__juice_bg #left_container #main_nav blockquote h4 a strong {
	text-align: center;
}
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
                       
                       
                       

<div class="head_o"> <h2><strong>Reported Items</strong></h2> </div>



<?php


// include("./include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);





$s =mysql_query("select * from  reported_item where re_stat='1' ");
   $numes = mysql_num_rows($s);
   
echo '<div class="no_o"> <h3><strong>Reports or denouncement</strong></h3> ('.$numes.') </div> ';
 
    while($r = mysql_fetch_assoc($s)){
  
    $re_id = $r['re_id'];
    $re_user_id = $r['re_user_id'];
	$re_auc_user_id = $r['re_auc_user_id'];
	$re_auc_id = $r['re_auc_id'];
	//echo "<li><a href='details.php?I=$re_id'> [(OWNER(Item: $re_auc_id)(user:$re_auc_user_id ))]_[Sender: $re_user_id] </a></li>";
 $sel_report_sel = mysql_query("select * from items_table where Id='$re_auc_id' and Accept_Refuse='1'");
	$row_Accept_Refuse = mysql_fetch_assoc($sel_report_sel);
$namrow_Accept_Refuse = $row_Accept_Refuse['Accept_Refuse'];

if($namrow_Accept_Refuse =='1'){
	
	echo "<li><a href='reported_items.php?Id=$re_auc_id'> [(OWNER(Item: $re_auc_id)(user:$re_auc_user_id ))]_[Sender: $re_user_id] </a></li>";
	
}

	 

    }
	

?>

	<p>&nbsp;</p>
<hr>
    <hr>
    


<div class=""> <h3><strong></strong></h3> </div>



<?php

/*
include("./include/config.php");

$ssr =mysql_query("select * from send where ch='1' ");
 $numssr = mysql_num_rows($ssr);
   
echo '<div class="bodypanel"> <h3><strong>Read Messages</strong></h3> ('.$numssr.') </div> ';
    while($rrr = mysql_fetch_assoc($ssr)){
    $id = $rrr['id'];
    $name = $rrr['name'];
	$title = $rrr['title'];
	echo "<li><a href='contact_us.php?id=$id'>$title ($name)</a></li>";

	
    }

	*/
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
                        
                    		<h2>Welcome <a href=reported_items.php"  class="right_container_title"  >Reported page</a> O_Auction</h2> 
                
                 <p>&nbsp;</p>
                
                
                
                
                
          <!--    


<div class="head_o">Contact us Messages</div>

              
                
                
                
          

<div class="no_o">Unread Messages</div>
-->
                  

<?php

include("./include/config.php");
 $gid = intval($_GET['Id']);
 
 
$sel = mysql_query("select * from items_table where Id='$gid' ");
 $nume_re_sel = mysql_num_rows($sel);


if($_REQUEST['do'] == 'remove'){
	
	/*$gid = $_GET['Id'];
    $del= mysql_query("delete from items_table where Id='$gid'");
	*/
	
	 $acc= 2 ;
$ch_date=date("Y-m-d H:i:s");

  $updateSQL = "UPDATE items_table SET Accept_Refuse='$acc', Accept_Refuse_date='$ch_date' WHERE Id='$gid'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());
	if($updateSQL){
    	echo"<div class='ok_o'> Refused item successfully </div>";
        	echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/admin/reported_items.php">';
        
    }

}


echo '<table width="%100" dir="ltr">';
if($nume_re_sel == '0'){
	echo "<h2>Auction (ID: ".$gid.") not exist it might be Deleted  </h2>";
	
}else{

$row_re_auc = mysql_fetch_assoc($sel);


	 $namedpic = $row_re_auc['pic'];
	$id_re2 = $row_re_auc['Id'];
	 $re_name = $row_re_auc['Name'];
	 $re_Accept_Refuse = $row_re_auc['Accept_Refuse'];
	 $re_Description = $row_re_auc['Description'];
	 
	 
echo"
	<div class='bodypanel_o'>
	<a href='../details.php?I=$id_re2'> <img src='../upload/$namedpic'  width='200' height='200' >  Name: <strong> $re_name </strong>  <p> More details about the items </div><p>Description: $re_Description</p> ";
 
 if ($re_Accept_Refuse =='1'){
		echo "<strong>Accepted</strong>";  
		  
	  }
	  if ($re_Accept_Refuse =='2'){
		echo "<strong>Refused</strong>";  
		  
	  }
	  if ($re_Accept_Refuse =='0'){
		echo "<strong>##### Wait #####</strong>";  
		  
	  }
	  
	  


	/*
 $acc= 1 ;
$ch_date=date("Y-m-d H:i:s");

  $updateSQL = "UPDATE send SET ch='$acc', ch_date='$ch_date' WHERE id='$id'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

*/
	//echo "<li><a href='reported_items.php?Id=$id_re2'> [(OWNER(Item: $re_auc_id)(user:$re_auc_user_id ))]_[Sender: $re_user_id] </a></li>";

echo"

<tr>
<td> Controll</td>
<td colspan='1' class='no_o'><a href='?do=remove&Id=$id_re2'>Delete </td>
</tr>

<br/>

";



$sel_re_t = mysql_query("select * from reported_item where re_auc_id='$id_re2'");
  $nume_re_re2 = mysql_num_rows($sel_re_t);

echo"<tr>reports total for this item :  $nume_re_re2 <tr>";
While($row_re_auc22 = mysql_fetch_assoc($sel_re_t)){

$re_re_re_id = $row_re_auc22['re_id'];
$re_re_re_auc_id= $row_re_auc22['re_auc_id'];	
$re_re_re_auc_user_id	= $row_re_auc22['re_auc_user_id'];
$re_re_re_re_stat	= $row_re_auc22['re_stat'];

$re_re_re_user_id = $row_re_auc22['re_user_id'];
$re_re_re_text = $row_re_auc22['re_text'];
$re_re_re_re_date = $row_re_auc22['re_date'];

echo"



<tr>
<td>
<hr>
 </td>
</tr>


<tr>
<td>Report Id:  </td>
<td> $re_re_re_id </td>
</tr>

<tr>
<td>Report_auction_id :</td>
<td> $re_re_re_auc_id </td>
</tr>



<tr>
<td>Auction Owner Id </td>
<td> $re_re_re_auc_user_id</td>
</tr>

<tr>
<td>Report status </td>
<td> $re_re_re_re_stat</td>
</tr>


<tr>
<td>Auction Owner Id </td>
<td> $re_re_re_auc_user_id


<a href='../personalPage_info.php?user_id=$re_re_re_auc_user_id'> See Owner information </a>
	
</td>
</tr>


<tr>
<td>Report Sender id</td>
<td>$re_re_re_user_id 

<a href='../personalPage_info.php?user_id=$re_re_re_user_id'> See reporter information </a>
</td>
</tr>


<tr>
<td>Report Message : </td>
<td>$re_re_re_text </td>
</tr>


<tr>
<td>Reported Date </td>
<td>$re_re_re_re_date </td>
</tr>


<tr>
<td>
<hr>
 </td>
</tr>


";

}



}


echo '</table>';


	
	

?>




<div class="no_o"> </div>


                
  
                              
                            
                            
                              
                          <?php
                     include("../admin/include/config.php");
/*
 $gidd = intval($_GET['id']);
  
    $se = mysql_query("select * from send where id='$gidd' and ch='1' ");
    $nume = mysql_num_rows($se);
    $rowe = mysql_fetch_assoc($se);
    
	  $email = $rowe['email'];
	  
	  
	  

	  
    if($nume == 0 or $nume <0) {
   
		  echo"<div class='no_o'> <h2>No messages before or read</h2> </div>";
			   

    
    }else{
   $sell2 = mysql_query("select * from send where email='$email' and ch='1' order by ch_date DESC");
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
	*/
	
	?>
	
	                   
                              
                              
                              
                              
                              
                              
                              
                              </p>
                               <p>&nbsp;</p>
        				</div>
                        
                    </div>
                    
                    
                    

