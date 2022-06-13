

<?php 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 

?><head>
           	<link href="o_a_c_style.css" rel="stylesheet" type="text/css">
            </head>











  <a href="index.php">Home</a> >>   <a href="personal_page.php"> Personal page </a> >>  <a href="personalPageSell.php"> My items to sell.</a>




<br/>








<?php
//initialize the session
if (!isset($_SESSION)) {
@  session_start();
}



$_SESSION['SESSION_USER_id'] ;
	  $_SESSION['SESSION_Username'] ;
	  $_SESSION['SESSION_user_email'] ;
          $_SESSION['SESSION_user_password'];

if(isset($_SESSION['SESSION_Username']) == FALSE) {

}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['SESSION_Username'] = NULL;
  $_SESSION['SESSION_USER_id'] = NULL;
  $_SESSION['SESSION_user_password'] = NULL;
  unset($_SESSION['SESSION_Username']);
  unset($_SESSION['SESSION_USER_id']);
  unset($_SESSION['SESSION_user_password']);

  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>


<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_POST['hd_del'])) && ($_POST['hd_del'] != "")) {
  $deleteSQL = sprintf("DELETE FROM items_table WHERE Id=%s",
                       GetSQLValueString($_POST['hd_del'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());



}

if (isset($_POST["btnEditHide"])){
$btnEditHidev = 3 ;

$hd_edit = $_POST['hd_edit'];

  $updateSQL = "UPDATE items_table SET Accept_Refuse='$btnEditHidev' WHERE Id='$hd_edit'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());


}

if (isset($_POST["btnEditShow"])){
//
$btnEditShowv = 1 ;
$hd_edit = $_POST['hd_edit'];

  $updateSQL = "UPDATE items_table SET Accept_Refuse='$btnEditShowv' WHERE Id='$hd_edit'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());



}



if (isset($_POST["btnUser_StyleW"])){
$User_StyleWhite = 3 ;

$hd_StyleWhUSERIDwhite = $_POST['hd_btnUser_StyleW'];

  $updateSQLuserStyleWhite = "UPDATE user_information_table SET User_Style='$User_StyleWhite' WHERE user_id='$hd_StyleWhUSERIDwhite'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQLuserStyleWhite, $connection) or die(mysql_error());


}


if (isset($_POST["btnUser_StyleBlack"])){
$User_StyleBlack = 0 ;

$hd_StyleWhUSERIDblack = $_POST['hd_btnUser_StyleBlack'];

  $updateSQLuserStyleBlack = "UPDATE user_information_table SET User_Style='$User_StyleBlack' WHERE user_id='$hd_StyleWhUSERIDblack'";

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQLuserStyleBlack, $connection) or die(mysql_error());


}


if ((isset($_POST['hd_del2'])) && ($_POST['hd_del2'] != "")) {
  $deleteSQL2 = sprintf("DELETE FROM items_table WHERE Id=%s",
                       GetSQLValueString($_POST['hd_del2'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result12 = mysql_query($deleteSQL, $connection) or die(mysql_error());


//this successful upload and stored in filed


}



$colname_info = $_SESSION['SESSION_Username'];
if (isset($_GET['username'])) {
  $colname_info = $_GET['username'];
}


mysql_select_db($database_connection, $connection);
$query_info = sprintf("SELECT * FROM user_information_table WHERE username = %s", GetSQLValueString($colname_info, "text"));
$info = mysql_query($query_info, $connection) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);
$totalRows_info = mysql_num_rows($info);


$p=$row_info['user_id'];
$maxRows_sellauc = 10;
$pageNum_sellauc = 0;
if (isset($_GET['pageNum_sellauc'])) {
  $pageNum_sellauc = $_GET['pageNum_sellauc'];
}
$startRow_sellauc = $pageNum_sellauc * $maxRows_sellauc;

$colname_sellauc = "-1";
if (isset($_GET['user_id'])) {
  $colname_sellauc = $_GET['user_id'];
}
mysql_select_db($database_connection, $connection);
$query_sellauc = "SELECT * FROM items_table WHERE user_id = '$p'ORDER BY Id DESC";
$query_limit_sellauc = sprintf("%s LIMIT %d, %d", $query_sellauc, $startRow_sellauc, $maxRows_sellauc);
$sellauc = mysql_query($query_limit_sellauc, $connection) or die(mysql_error());
$row_sellauc = mysql_fetch_assoc($sellauc);

if (isset($_GET['totalRows_sellauc'])) {
  $totalRows_sellauc = $_GET['totalRows_sellauc'];
} else {
  $all_sellauc = mysql_query($query_sellauc);
  $totalRows_sellauc = mysql_num_rows($all_sellauc);
}
$totalPages_sellauc = ceil($totalRows_sellauc/$maxRows_sellauc)-1;


$connectdb = mysql_connect('localhost','omar','12345') or die ("not connect");
$selectdb=mysql_select_db('bauctionndba',$connectdb)or die("not selected database");


echo"<h2> The Personal Items willing to Sell</h2>";



################################# update catDetails





if($_REQUEST['do'] =='update'){



$postdescrip_cat= addslashes(strip_tags($_POST['descrip_cat']));
$postid = $_POST['Id'];
 $gidd = intval($_GET['Id']);
 $s4 = mysql_query("select * from items_table where Id='$gidd'");
 $r4 = mysql_fetch_assoc($s4);
 $idcat = $r4['Id'];
 $namecat = $r4['CatDetail'];

if($_POST['edit']){

	if($postdescrip_cat == ''){
	echo "<div class='no_o' >You did not enter description for category  </div>";


		echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/personalPageSell.php">';


}else{
	$updat = mysql_query("update items_table set CatDetail='$postdescrip_cat' where Id='$postid'");
	if($updat){

			 echo "<div class='ok_o' > Updated successfully </div>";
		echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/personalPageSell.php">';


		exit;}

	}
}

echo "<h3><p>Updade description category</h3>";
 echo"<form action='personalPageSell.php?do=update' method='post'>

 Category description:  <input name='descrip_cat' value='$namecat' type='text'/>
  <input name='edit' value='Save' type='submit'/>
    <input name='Id' value='$idcat' type='hidden'/>

 </form>";

exit;}






?>

  <?php

if($_SESSION['SESSION_Username']==''){

	echo "<h1>You should login please</h1>";


	 echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/login_page.php">'; 	  

}else{



?>



<?php
if ( $totalRows_sellauc=="0"){

	echo "<h2>No selling any Items yet for this username (". $_SESSION['SESSION_Username'] .")</h2>";
	
	echo " <a href='add_item_to_sell.php'>  Add an item to sell now !  </a>";

}else {
echo "<p><em>You have </em>  (".$totalRows_sellauc .") items.";



?>


<!-- style Start-->





<h4>Welcome <?php echo $row_info['user_f_name']; ?> (<?php echo $_SESSION['SESSION_Username']; ?>) to your Items willing to Sell. (ID:  <?php echo $row_info['user_id']; ?>   )
</h4>
<ul>
  <a href="personal_page.php"  class="btn btn-default float_r"> &lt;&lt; Back into My Page</a> 	<a href="personalPageSell.php?I= <?php echo $row_sellauc['Id']; ?>  "  class="btn btn-primary" > <img src="images/refreshIcon.png" alt="Follow us on Twitter"  width="35" height="35" > Refresh </a>
</ul>


  <hr>
<p>
  
  </p>
</p>





<table width="392" height="175" border="1" cellpadding="0" cellspacing="0">
  <tr>
<!--    <td>&nbsp;</td>-->
    <td>&nbsp;</td>
    <td><p><em><strong>Owner ID</strong></em></p></td>
    <td><p><em><strong>Auction ID </strong></em></p></td>
    <td><p><em><strong>Pic</strong></em></p></td>
    <td><p><em><strong>Name</strong></em></p></td>
    <td><p><em><strong> Price</strong></em></p></td>
    <td><p><em><strong>(Price) Currency</strong></em></p></td>
    <td><p><em><strong>Buy the item now Price</strong></em></p></td>


    <td><p><em><strong>Started Date</strong></em></p></td>
    <td><p><em><strong>Expired date</strong></em></p></td>
    <td><p><em><strong>view all bidders for this auction</strong></em></p>
    <p></p></td>
    <td><p><em><strong>Number of bids</strong></em></p></td>
    <td><p><em><strong>Maximum bidding Price</strong></em></p></td>

    <td><p><em><strong>Bidder Comment</strong></em></p></td>
    <td><p>Hide  </p></td>
        <td><p><em><strong>Edit category details</strong></em></p></td>
    <td><p><em><strong>Delete an Auction</strong></em></p></td>
  </tr>
  <?php do {

  if($row_sellauc['Accept_Refuse'] == '0'){
	  echo "<hr><h7>Your new Aucion </h7>";
	  	echo "<h4>Name: <strong>".$row_sellauc['Name']."</strong></h4>";

//		echo "<p>Auction Id: <strong>" . $row_sellauc['Id']. "</strong></p>"; 

		echo "</h9><p> is under process, It needs 24 hours to be accepted </p>";

		?>

        <form name="form6" method="post" action="">
      

          <input type="submit" name="btn_del2" id="btn_del2" value="Cancel the ( <?php echo $row_sellauc['Name']; ?> ) request">
       
          <input name="hd_del2" type="hidden" id="hd_del2" value="<?php echo $row_sellauc['Id']; ?>">
       

      </form>
       
        <?php

  }


else if($row_sellauc['Accept_Refuse'] == '3'){

	?>
    <div class='ok_o'>
	<hr>
    <form id="formbtnEditShow" name="formbtnEditShow" method="POST" action="" >

<hr>


          
          


<img src="upload/<?php echo $row_sellauc['pic']; ?>" width="100" height="100" alt="omar" />
          <h3><label>

               (Name: <?php echo $row_sellauc['Name']; ?> ) is stopping or is hiding by you for public.</label></h3>




    <p>

      <input name="hd_edit" type="hidden" id="hd_edit" value="<?php echo $row_sellauc['Id']; ?>" />

    </p>

        <input type="submit" name="btnEditShow" id="btn_edit" value="Show ( <?php echo $row_sellauc['Name']; ?> ) again" />



    <p> <?php echo $row_controlAuction['Accept_Refuse_date']; ?></p>
    <p>&nbsp;</p>
      

       </form>
 </div>

    <?php

  }


else if($row_sellauc['Accept_Refuse'] == '2'){
		echo "<hr><div class='no_o'> Your item <h4>Name: ( ".$row_sellauc['Name'] ." ) is not accept  Please read <a href='ourPolicies.php'>  Our Policies</a>";
		
?>



      <form name="form1" method="post" action="">
    <img src="images/deleteIcon.png" alt="Follow us on Twitter"  width="25" height="25" >
        <input type="submit" name="btn_del" id="btn_del" value="DELETE (<?php echo $row_sellauc['Name'] ; ?>) !">
       
          <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_sellauc['Id']; ?>">
          





      </form>

</h4> </div> <hr>


<?php
		
  }


 else if($row_sellauc['Accept_Refuse'] == '1'){


  ?>

    <tr>
    <!--  <td>&nbsp;</td>  -->
      <td>&nbsp;</td>

      <td><p><?php echo $row_sellauc['user_id']; ?></p></td>
      <td><p><?php echo $row_sellauc['Id']; ?></p></td>

      <td><img src="upload/<?php echo $row_sellauc['pic']; ?>" width="100" height="100" alt="omar" /></td>
      
      
      <td><p><?php echo $row_sellauc['Name']; ?></p></td>
      <td> <p> <?php echo  $row_sellauc['BuyNowPrice'] ; ?> </p> </td>
      <td> <p> ( <?php echo $row_sellauc['BuyNowPrice']; ?> ) </p> <p><?php echo $row_sellauc['Currency']; ?></p>

      </td>
      <td><p><?php echo $row_sellauc['BuyNowPrice']; ?></p></td>


      <td><p><?php echo $row_sellauc['posted_date']; ?></p></td>
      <td><p><?php echo $row_sellauc['expired_date']; ?> Day after <?php echo $row_sellauc['posted_date']; ?></p></td>
      <td><p><em><a href="details.php?I=<?php echo $row_sellauc['Id']; ?>">More Details</a></em></p></td>
      <td><p>
      <?php
$colname_Recordset1 =$row_sellauc['Id'] ;
if (isset($_GET['Id'])) {
  $colname_Recordset1 = $_GET['Id'];
}
mysql_select_db($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM bids_table WHERE bids_auction_id = %s ORDER BY bids_id DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
echo $totalRows_Recordset1;
 ?>
      &nbsp;</p></td>
      <td><p><?php

	   if($row_Recordset1['bids_amount'] ==""){
		 echo "No bids";

	  }else{


	  echo $row_Recordset1['bids_amount']; }
	  ?></p></td>

      <td><p><?php
	  if( $row_Recordset1['Comment'] ==""){
		 echo "No bids";

	  }else{

	  echo $row_Recordset1['Comment'];

	  }

	   ?></p></td>
      <td>



      <?php

       if($row_sellauc['Accept_Refuse'] == '1'){

	?>

    <form id="formbtnEditHide" name="formbtnEditHide" method="POST" action="">
  <p>





<p><label>

              Hide (<strong><?php echo $row_sellauc['Name']; ?></strong> ) for public</label></p>





    <p>

      <input name="hd_edit" type="hidden" id="hd_edit" value="<?php echo $row_sellauc['Id']; ?>" />
  <input type="submit" name="btnEditHide" id="btneditH" value="Hide" />
    </p>







       </form>


    <?php

  }




      ?>
      </td>
       <td>
      <?php

$CatDetailCatDescr = $row_sellauc['CatDetail'];
$idCatDescr = $row_sellauc['Id'];
echo "<p>" . $CatDetailCatDescr . "</p>";
echo "<hr><a href='?do=update&Id=$idCatDescr'  class='bodypanel_o'  > EDIT Category. </hr></a></hr>";


	  ?>
      </td>
      <td>

      <form name="form1" method="post" action="">
        <p>    <img src="images/deleteIcon.png" alt="Follow us on Twitter"  width="25" height="25" >
          <input type="submit" name="btn_del" id="btn_del" value="DELETE">
        </p>

      
      
        <p>
          <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_sellauc['Id']; ?>"></p>





      </form></td>

    </tr>
    <?php


  }


	 } while ($row_sellauc = mysql_fetch_assoc($sellauc)); ?>




</table>
 <div class="OMAR_STYLE__logo">
<p>&nbsp;</p>
<p>&nbsp;</p>

<p><a href="personalPageSell.php">Show All</a>
Records:  <?php echo min($startRow_sellauc + $maxRows_sellauc, $totalRows_sellauc) ?> of <?php echo $totalRows_sellauc ?> </p>
<p>&nbsp;<a href="<?php printf("%s?pageNum_sellauc=%d%s", $currentPage, max(0, $pageNum_sellauc - 1), $queryString_sellauc); ?>"class="btn btn-primary"> < Previous</a> <a href="<?php printf("%s?pageNum_sellauc=%d%s", $currentPage, min($totalPages_sellauc, $pageNum_sellauc + 1), $queryString_sellauc); ?>" class="btn btn-primary">Next > </a></p>



<?php
}

}
?>


<p>&nbsp;</p>




</div>




<?php
mysql_free_result($sellauc);

mysql_free_result($info);
?>
