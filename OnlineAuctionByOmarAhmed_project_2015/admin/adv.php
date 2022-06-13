<?php  include("admin_session.php");  ?>
<h1>Control fee ADVERTISEMENTS page</h1>
<?php // require_once('../Connections/connection.php'); 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


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

if ((isset($_POST['hd_del'])) && ($_POST['hd_del'] != "")) {
  $deleteSQL = sprintf("DELETE FROM fee_adv_table WHERE adv_id=%s",
                       GetSQLValueString($_POST['hd_del'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($deleteSQL, $connection) or die(mysql_error());

  $deleteGoTo = "adv.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
// $adm_idSeeA   = $_SESSION['adminEmailSession'];
 
  $insertSQL = sprintf("INSERT INTO  fee_adv_table (adv_id, adm_id, web_loc, adv_n_seen, adv_pic, adv_name, adv_short_detail, adv_detail, adv_owner, admin_notes, adv_date) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, now())",
                       GetSQLValueString($_POST['hd_id_adv'], "int"),
					   GetSQLValueString($_POST['adminAccSession'], "int"), 
					   GetSQLValueString($_POST['ValueZeroLoc'], "int"),
					  GetSQLValueString($_POST['ValueZeroSeenSess'], "int"),

                       GetSQLValueString($_POST['pic'], "text"),
                       GetSQLValueString($_POST['adv_name'], "text"),
					   GetSQLValueString($_POST['adv_short_detailPost'], "text"),
                       GetSQLValueString($_POST['adv_detail'], "text"),
                       GetSQLValueString($_POST['adv_owner'], "text"),
                       GetSQLValueString($_POST['admin_notes'], "text"),
                       GetSQLValueString($_POST['hd_date_adv'], "date"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());



}

mysql_select_db($database_connection, $connection);

if (isset($_POST['Adv_admin_st'])) 
{
  	$word = $_POST['Adv_admin_st'];
	$query_adv = "SELECT * FROM fee_adv_table WHERE web_loc LIKE'%".$word."%' ORDER BY adv_id DESC ";
}

else

{

$query_adv = "SELECT * FROM  fee_adv_table ORDER BY adv_id DESC";
}

$adv = mysql_query($query_adv, $connection) or die(mysql_error());
$row_adv = mysql_fetch_assoc($adv);
$totalRows_adv = mysql_num_rows($adv);
?>

<html>
<head>


	<link href="o_ad_style.css" rel="stylesheet" type="text/css">
   
</head>

<body>
<?php  include("head_admin.php"); ?>



 <h4>
   <p>&nbsp;</p>
</h4>

 </p>
 

 <p>&nbsp;</p>
 <hr />
 </p>
 <p></p>
 <h4>
 
<?php

////////////////////////  AdminAcceptAdvertisement  Start Code
		 		   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];


	 
//                     include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);



    $seaAdminAcceptAdvertisement = 'AdminAcceptAdvertisement';
    $seAuthQueDel = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAcceptAdvertisement."%' "); 
    $nAuthSelQuerIns = mysql_num_rows($seAuthQueDel);
    $rowAuthSDel = mysql_fetch_assoc($seAuthQueDel);
   //  $adminAuthWo = $rowAuthS['adminAuth'];
    if($nAuthSelQuerIns == 1 ) {
	echo "Authorized to post an  Advertisement by(AdminId: " .$sessionIdAuth . " )";	
	  	  
		  

                // echo " <div class='no_o'><input type=\"checkbox\"" . "name=\"Delete_auction[]\"" . "value=\"" . "$del_auction \"" . "></div><br>";
		
		

	  

?>


<hr>

   <p><strong>First step: </strong></p>
 </h4>
 <p><?php echo $filename;?>
   </hr>
   <?php
//this successful upload and stored in filed
$filename = $_FILES['file']['name'];
$filesize = $_FILES['file']['size'];
$tmpname = $_FILES['file']['tmp_name'];
$filetype = $_FILES['file']['type'];
$folder="../adv_pic/";

if(isset($_POST['do'])and $_POST['do']=='upload'){
    if(empty($filename)){
        echo "where is the file ??";
    }else if ($filesize>9999999999999){
        echo "the file is big then 1 MB";
    }else{
    echo "<h3>file is uploaded Successfully </h3>";
    move_uploaded_file($tmpname,$folder.$filename);


echo "<p>Alhamdolelah( <h4>";
echo $filename ;
echo "</h4> ) Stored</p> ";
}

}

//include("upload_file.php");

?>
 <tr>
     
      <td><label for="adv_name2"></label>
      <input type="text" value='<?php echo $filename ; ?>'/></td>
</tr>
   <?php 
echo"<form action='#' method='post' enctype='multipart/form-data'><p>
1- Choose the Image Path : </p><input type='file' name='file'/><br>
 <br>
<br>
<p>2- Press to Upload an image:<input type='submit' name='do'value='upload'/></p>
</form>";


?>
   </h4>
</p>
 <p></p>
 <p>&nbsp;</p>

<hr>

<p>&nbsp;</p>


<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">

 <h4> <p>&nbsp;</p></h4>
<h4><strong>Second step: </strong></h4>
  <table width="100" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td>adv_name</td>
      <td><label for="adv_name2"></label>
      <input type="text" name="adv_name" id="adv_name2" /></td>
    </tr>
    <tr>
      <td>Short Description</td>
      <td><label for="adv_name2"></label>
      <input type="text" name="adv_short_detailPost" id="adv_short_detailPost" /></td>
    </tr>
    <tr>
      <td>adv_detail</td>
      <td><label for="adv_detail"></label>
      <textarea name="adv_detail" rows="7" id="adv_detail"></textarea></td>
    </tr>
   
   <tr>
      <td>Present Location in website</td>
      <td><table width="200">
        <h3>As Two</h3>
        <tr>
          <td><label>
            <input type="checkbox" name="web_adv_loc" value="1" id="web_adv_loc21" />
            Left (View in most pages)</label></td>
        </tr>
        <tr>
         
        </tr>
        <tr>
          <td><label>
            <input type="checkbox" name="web_adv_loc" value="2" id="web_adv_loc22" />
            Right  (View in Home page only)</label></td>
        </tr>
    </table>
      
     <?php
	  /*
	  if($row_adv['web_loc'] == 31){
		  
		echo "<p>As three (left)</p>";  
	  }
	  
	  	  if($row_adv['web_loc'] == 32){
		  
		echo "<p>As three (Middle)</p>";  
	  }
	  	  if($row_adv['web_loc'] == 33){
		  
		echo "<p>As three (Right)</p>";  
	  }
	  
	  	  if($row_adv['web_loc'] == 22){
		  
		echo "<p>As two (Right)</p>";  
	  }
	    if($row_adv['web_loc'] == 21){
		  
		echo "<p>As two (Left)</p>";  
	  }
	  
	    if($row_adv['web_loc'] == 11){
		  
		echo "<p>As One (Alone)</p>";  
	  }
	  
	  */
	  ?>
     
     
      
      
      </td>
    </tr>
   
    <tr>
      <td>adv_owner</td>
      <td><label for="adv_owner"></label>
      <input type="text" name="adv_owner" id="adv_owner" /></td>
    </tr>
    <tr>
      <td>admin_notes</td>
      <td><label for="admin_notes"></label>
      <input type="text" name="admin_notes" id="admin_notes" /></td>
    </tr>
    <tr>
      <td><input type="hidden" name="hd_date_adv" id="hd_date_adv" /></td>
      <td><input type="submit" name="btn_adv" id="btn_adv" value="Submit" /></td>
    </tr>
    

    
  </table>   
  
   <input type="hidden" name="adminAccSession" value="<?php echo $_SESSION['SESSION_admin_id'] ; ?>" />
    <input type="hidden" name="pic" value="<?php echo $filename ; ?>" />
    
    

    
<input type="hidden" name="ValueZeroLoc" value="0" />
               
<input type="hidden" name="ValueZeroSeenSess" value="0" />
               
<input type="hidden" name="ValueZeroSeenNoSess" value="0" />

  <p>&nbsp;</p>
  <input type="hidden" name="MM_insert" value="form1" />
</form>

<hr>

<?php
	  
	}else{
//	echo "<hr>UNAUTHORIZED  <hr>";
		echo "<hr>UNAUTHORIZED to post an  Advertisement by(AdminId: " .$sessionIdAuth . " )<hr>";		
	}
////////////////////////  AdminAcceptAdvertisement  End Code


?>


<hr>

<form id="form3" name="form3" method="post" action="">
 <hr> <hr>
  <label for="txt_search">Search by Auction Id, User Id, or Auction Name</label>
  <input type="text" name="txt_search" id="txt_search" />
  <input type="submit" name="btn_search" id="btn_search" value="Submit" />
  <hr>
<p>Advanced search:</p>
<table width="200">
 
  <tr>
    <td><label>
      <input type="radio" name="Adv_admin_st" value="0" id="auc_admin_st4" />
      ###View Stoped###</label></td>
  </tr>
  
    <tr>
            <td><label>
<input type="radio" name="Adv_admin_st" value="1" id="auc_admin_st5" /> 


              Left(Most pages)</label></td>
          </tr>

  
   <tr>
    <td><label>
      <input type="radio" name="Adv_admin_st" value="2" id="auc_admin_st3" />
      Right (Home Page only)</label></td>
  </tr>
  
  
</table>



<p><a href="list.php"> Show All</a></p>
<p>
  <?php


 if($totalRows_admin_control =="0"){
	 echo "<h3>No such Result is found </h3>";
 }
	 else{

 echo "<h6>Result found: (" . $totalRows_admin_control  . ") </h6>";
	 }

?>
</p>
</form>


<p>show all Adv:</p>
 <table width="100" border="1" cellspacing="0" cellpadding="0">
   <tr>
     <td>Adv_Pic</td>
     <td>Adv_ID</td>
     <td>adv_name</td>
     <td>adv_detail</td>
     <td>adv_owner</td>
     <td>admin_notes</td>
     <td>Status</td>
     <td>Web location</td>
     <td>AdminAccepted</td>
     <td>Date_submited</td>
     <td>Edit</td>
     <td>Delete</td>
   </tr>
   <?php do { ?>
    <tr>
      <td>
        <p><img src="../adv_pic/<?php echo $row_adv['adv_pic']; ?>" width="100" height="100"  class="img-thumbnail img-responsive img_left">  </p>
      </td>
      <td><?php echo $row_adv['adv_id']; ?></td>
      <td><?php echo $row_adv['adv_name']; ?></td>
      <td><?php echo $row_adv['adv_detail']; ?></td>
      <td><?php echo $row_adv['adv_owner']; ?></td>
      <td><?php echo $row_adv['admin_notes']; ?></td>
      <td>

      <?php 
/*		echo $row_adv['web_loc'];
	  if($row_adv['web_loc']== 0){

	  echo "<h4>On</h4>"; 
	  }else{
		 echo "<h4>Off</h4>";   
		  
	  }
	  */
	  
	  ?>
      
      </td>
      <td><?php echo $row_adv['web_loc']; ?><strong>
       <?php
	
	  if($row_adv['web_loc'] == 0){
		  
		echo "<p>ADVERTISEMENT Stoped</p>";  
	  }
	  
	    if($row_adv['web_loc'] == 1){
		  
		echo "<p>In more pages (left)</p>";  
	  }
	  	  if($row_adv['web_loc'] == 2){
		  
		echo "<p>In Home page only (Right)</p>";  
	  }
	 
	 
	    
		
	  
	  ?></strong></td>
      <td><?php 
	  $AdmIdAcc = $row_adv['adm_id'];
	  echo "Accepted by (AdmID: $AdmIdAcc )";  
	  
	  
	  echo $row_adv['adm_id']; ?></td>
      <td><?php echo $row_adv['adv_date']; ?></td>
      <td>
      
      
      
      
      <form id="form3" name="form3" method="post" action="adv_edit.php">
        <p>
          <input type="submit" name="btn_edit" id="btn_edit" value="UPDATE" />
        </p>
        <p>
          <input name="hd_edit" type="hidden" id="hd_edit" value="<?php echo $row_adv['adv_id']; ?>" />
        </p>
      </form></td>
      <td>  
      
    
                   
      <?php
     
			 		   
$sessionIdAuth = $_SESSION['SESSION_admin_id'];


	 // echo"(ID: <h6> $sessionIdAuth </h6> ) ";
    // include("../admin/include/config.php");
 $host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $seaAdminAuthWordAcc = 'AdminDeleteAdvertisement';
    $seAuthQueAccUser = mysql_query("select * from admin_table WHERE admin_id='$sessionIdAuth' and adminAuth LIKE'%".$seaAdminAuthWordAcc ."%' "); 
    $nAuthSelQuerAccUser = mysql_num_rows($seAuthQueAccUser);
    $rowAuthSAccUser = mysql_fetch_assoc($seAuthQueAccUser);

    if($nAuthSelQuerAccUser == 1 ) {
		
		
		?>
              
  
  
    
      
      
      
      
      
    <form id="form2" name="form2" method="post" action="">
        <p>
          <input type="submit" name="btn_del" id="btn_del" value="DELETE" />
        </p>
        <p>
            <input name="hd_del" type="hidden" id="hd_del" value="<?php echo $row_adv['adv_id']; ?>" />
        </p>
      </form>
      
  
  
  
  
  
    <?php
}    else{
echo " ";
}
         ?>
         
         
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      </td>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    </tr>
     <?php } while ($row_adv = mysql_fetch_assoc($adv)); ?>
 </table>
<p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($adv);
?>
