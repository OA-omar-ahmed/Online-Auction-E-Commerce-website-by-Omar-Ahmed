<h1>&nbsp;</h1>
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

$info_id


	echo "<li><a href='personalPage_info.php?user_id=$info_id'> [(OWNER(Item: $re_auc_id)(user:$re_auc_user_id ))]_[Sender: $re_user_id] </a></li>";
	
    
    -->
    
    
    
    
    
    
<?php // require_once('../Connections/connection.php');



$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
 ?>


<?php include 'header.php';?>
	
                  
                    <p>&nbsp;</p>
                     <p>&nbsp;</p>


    
    
    
<?php

// include("../admin/include/config.php");

$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);




 $gid = intval($_GET['user_id']);
 
 
$sel_user_info = mysql_query("select * from user_information_table where user_id='$gid' ");
 $nume_user_info = mysql_num_rows($sel_user_info);


    
    									
    
$row_user_info= mysql_fetch_assoc($sel_user_info);
		 $user_info_user_id = $row_user_info['user_id'];
	  	 $user_info_user_f_name = $row_user_info['user_f_name'];
	  	 $user_info_user_l_name = $row_user_info['user_l_name'];
	  	 $user_info_username = $row_user_info['username'];
	  	 $user_info_user_phone = $row_user_info['user_phone'];
	  	 $user_info_user_email = $row_user_info['user_email'];
	  	 $user_info_country = $row_user_info['country'];
		 	  	 $user_info_postedtotal = $row_user_info['country'];
				 $posted_itemsP = $row_user_info['posted_items'];
	  	 $user_info_reg_date = $row_user_info['reg_date'];
	  
    
    
    echo '<table width="%100" dir="ltr" align="center">';
	

//	echo "<h4>$nameCountryLoc</h4>";
	
	 
    
echo"



<tr>
<td>
<hr>
 </td>
</tr>



<tr>
<td>First name :</td>
<td><p> $user_info_user_f_name </p></td>
</tr>



<tr>
<td>Last name: </td>
<td><p>		 $user_info_user_l_name</p></td>
</tr>

<tr>
<td>User Email: </td>
<td><p> $user_info_user_email </p></td>
</tr>

<tr>
<td>User Country: </td>
<td><p> 	  	 $user_info_country </p></td>
</tr>


<tr>
<td>Total Posted: </td>
<td><p> $posted_itemsP </p></td>
</tr>

<tr>
<td>Register date: </td>
<td><p>$user_info_reg_date </p></td>
</tr>



<tr>
<td>
<hr>
 </td>
</tr>


";



echo '</table>';


	
	

?>







       
                            
                              
                          <?php
      
// include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);




 $giduser = intval($_GET['user_id']);
 
 
$se_info = mysql_query("select * from items_table where user_id='$giduser' ");



    $num_se_info = mysql_num_rows($se_info);
    $row_se_info = mysql_fetch_assoc($se_info);
    $name = $row_se_info['Name'];
	
    if($num_se_info == 0 or $num_se_info <0) {
   
  echo"<div class='no_o'> <h2>No items for this user. </h2> </div>";
			   

    
    }else{
    $se2 = mysql_query("select * from items_table where user_id='$giduser'");
    $num2 = mysql_num_rows($se2);
// $row_se2_info2 = mysql_fetch_assoc($se2);
    
	
	/* 
	  if($num2 != 0){
       echo"<div class='head_o'>Items: </div>";
	 
	$row2 = mysql_fetch_assoc($se2);
   
    $name2 = $row2['Name'];
    $id = $row2['Id'];
   
	
     
     } */

    /* SHOWING all the items */
  
   $page = $_GET['page'];
   $num_page = 10;
   
   $auc = mysql_query("SELECT * FROM items_table WHERE user_id='$giduser' ");
   $numauc= mysql_num_rows($auc);
 $row_se_infoauc = mysql_fetch_assoc($auc);
   // $user_id_infoauc == $row_se_infoauc['user_id'];
   //  $Accept_Refuse_infoauc= $row_se_infoauc['Accept_Refuse'];
   if(!$page){
	   $page = 0;
	   
	   
   }
  
  
	

   $ar_info2 = mysql_query("SELECT * FROM items_table WHERE user_id='$giduser' and Accept_Refuse='2' ");
     $numar_info2= mysql_num_rows($ar_info2);
echo "<hr><div class='bodypanel_o'><h4>Refused Items:<pre>Results  Refused Found:( $numar_info2 )</pre></h4><hr></div>";	


	
  $ar_info3 = mysql_query("SELECT * FROM items_table WHERE user_id='$giduser' and Accept_Refuse='0'  ");
       $num_info3= mysql_num_rows($ar_info3);
echo "<div class='bodypanel_o'><h4>Whait to be accepted: <pre>Results accepted found:( $num_info3 )</pre></h4><hr></div>";	


    
  
   $ar = mysql_query("SELECT * FROM items_table WHERE user_id='$giduser' and Accept_Refuse='1'  ORDER BY Id DESC LIMIT $page,$num_page");
    $numar= mysql_num_rows($ar);
/* echo"<div class='bodypanel'></div>";*/
  
	

	
	echo"<div class='bodypanel_o'><h4>Accepted: <pre>Results Found: $numar</pre></h4>";  

    	

   while($rowar = mysql_fetch_assoc($ar) ){
    
	
	   $id_ar = $rowar['Id'];
	   	   $Name_ar = $rowar['Name'];
	$pic= $rowar['pic'];
	$BuyNowPrice= $rowar['BuyNowPrice'];

$Accept_Refusecat= $rowar['Accept_Refuse'];
		
  
  echo"
	<div class='bodypanel_o'>
	<a href='details.php?I=$id_ar'> <img src='upload/$pic'  width='100' height='100' > $Accept_Refusecat Name: <strong>$Name_ar </strong> Price:$BuyNowPrice <p>   ";

	
	
  
	?>
	
	   <?php

             $bid1 = $rowar['Id'];

  
mysql_select_db($database_connection, $connection);
$query_showbid = sprintf("SELECT * FROM bidst WHERE bids_auction_id = '$bid1' ORDER BY bids_id DESC", GetSQLValueString($colname_showbid, "int"));
$showbid = mysql_query($query_showbid, $connection) or die(mysql_error());
$row_showbid = mysql_fetch_assoc($showbid);
$totalRows_showbid = mysql_num_rows($showbid);

$queryString_show = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_show") == false && 
        stristr($param, "totalRows_show") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_show = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_show = sprintf("&totalRows_show=%d%s", $totalRows_show, $queryString_show);

        
     ?><?php if($row_showbid['bids_amount']==""){echo "Ther is no bidding yet";}else {echo "Bids amount:<strong>".$row_showbid['bids_amount'] ; ?>
       </strong>     </p>
        
    <p>
    
     Number of Bids:<strong>
      <?php  
$colname_Recordset1 = $rowar['Id'] ;
if (isset($_GET['Id'])) {
  $colname_Recordset1 = $_GET['Id'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = %s ORDER BY bids_id DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1); 


echo $totalRows_Recordset1;
echo"</strong>";
}
 ?>
    
  </p>  
	 </a>
     
</div>
		
	   
	<?php
	}

	
	
   

	
    }
               
	     echo"</div>";		
			   
			   
			   

              $i = 1;
			for($x = 0 ; $x < $numauc ; $x=$x+$num_page ){
				
				if($page != $x){
				
				echo"<a class='page_o' href='personalPage_info.php?user_id=$giduser&page=$x'> $i </a>";   			
					
				}else{
					 
				echo"<a class='page_o2' href='personalPage_info.php?user_id=$giduser&page=$x'> $i </a>";   			
			}
						$i++;
				   
			   }
			
			
			
			
                          ?>    
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              </p>
                               <p>&nbsp;</p>








<?php include 'footer.php';?>




