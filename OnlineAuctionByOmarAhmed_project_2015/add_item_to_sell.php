




<?php 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


?>





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

<p>&nbsp;</p>




                            
                            <li class="active"><a href="index.php">Home</a></li>
                    
							<li><a href="personal_page.php">Personal Page</a></li>
                            
						
						</ul>
			    </nav> 
   </p>












					<div>
			
					</div>
</div>
				
				
				
				
				<div id="right_container" class="col col-md-9 col-sm-12">
                
                
                
                
					<div class="row">
                    	<div class="col col-md-12">
                        
                    		<a rel="nofollow" href="omer.php"><img src="images/omar_auction_logo.png" width="240" height="60" /></a>
                 <p>

       
                          
                          
                          </p>
               
               
                             <p>&nbsp;</p>
                              <p>
                              
                            
                   <!--- from addprod.php Start -->         
                            
                            
                            
                            
                            
                            
                            
                            
<?php
@ session_start();
?>

<?php include 'header.php';?>





<?php
if($_SESSION['SESSION_USER_id'] =='' ){
echo 'Please <a href="login_page.php">Log in</a>
                          or if you  New <a href="register_page.php">Register</a>
 ';	
	
}
if($_SESSION['SESSION_USER_id'] !='' ){
echo 'Do you want to  <a href="logout_page.php">Log out</a> !
                         
 ';	
	
}

?>


  <?php 

$_SESSION['SESSION_USER_id'] ;
	  $_SESSION['SESSION_Username'] ;
	  $_SESSION['SESSION_user_email'] ;
          $_SESSION['SESSION_user_password'];
		  

if($_SESSION['SESSION_Username']==''){
	
	
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<h1>You should login to post new Auction please </h1>";
	
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	
	
echo'<meta http-equiv="Refresh" content="0;url=http://localhost/onlineauctionweb/login_page.php">';
	
}else{
	


?>



<?php
//initialize the session
if (!isset($_SESSION)) {
 @ session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['SESSION_USER_id'] = NULL;
  $_SESSION['SESSION_user_password'] = NULL;
  $_SESSION['SESSION_Username'] = NULL;
  unset($_SESSION['SESSION_USER_id']);
  unset($_SESSION['SESSION_user_password']);
  unset($_SESSION['SESSION_Username']);
	
	
  $logoutGoTo = "login_page.php";
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


// $cat_selected = intval($_GET['cid']);

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
    case "long":$theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
 

$pName =  trim(addslashes(strip_tags(nl2br(addslashes(strip_tags($_POST['namepost']))))));
$pDescription = addslashes(strip_tags($_POST['descriptionpost']));

  $ploc=$_POST['slct1'] ;

  $plocdesc= addslashes(strip_tags($_POST['slct2']));


  $pprice=intva($_POST['pricepost']);
  $Start_Spricepost=trim(addslashes(strip_tags(nl2br($_POST['Start_Spricepost']))));
$USER_id=intval($_POST['USER_id']);

$nameimguplinsh =  $_POST['nameimguplinshpost'];
$Currencyp = $_POST['Currencypost'];
 $n_seen= 0;
 $Status = $_POST['post_status'];;
  $pcat = $_POST['catpost'] ;
 $gidCatSelectP = intval($_GET['cid']);
//  $pCateGoryInshallhBoth =  $gidCatSelectP . $pcat ;
  
//    $pCateGoryInshallhBoth =  $gidCatSelectP . " SubO_A " .$pcat ;
      $pCateGoryInshallhBoth =  $gidCatSelectP . "  " . $pcat ;
 $concatdate = $_POST['year']. "-" . sprintf("%02d", $_POST['month']). "-" . sprintf("%02d", $_POST['day']). " " . $_POST['hour']. ":" . $_POST['minute']. ":00";

 if($pName == '' or $pDescription == ''  )
 
 {
	// echo "<h1>Name and Description are required</h1>";
	  echo"<script>alert(\"Name and Description are required\");</script>";		
	 } elseif( $nameimguplinsh == ''  ){ 
	 echo"<script>alert(\"An image should be uploaded\");</script>";		
 }else{
 
 
 
$CateGoryDetail= addslashes(strip_tags($_POST['CateGory_detail']));


$moreSpec_titleT= addslashes(strip_tags($_POST['moreSpec_title']));
 

$insertSQL = "INSERT INTO items_table (user_id, cat_id,  Title, Name,Currency, StartPrice, BuyNowPrice, n_seen, Status,loc_detail, CatDetail, Country, pic, Description, expired_date, posted_date) VALUES('$USER_id','$pCateGoryInshallhBoth','$moreSpec_titleT','$pName','$Currencyp','$Start_Spricepost', '$pprice','$n_seen', '$Status','$plocdesc','$CateGoryDetail','$ploc','$nameimguplinsh','$pDescription','$concatdate', now())";

 



 $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

 require("personalPageSell.php");
  @header(sprintf("Location: ",  $p));

if($Result1){
	 $num_posted_items = $row_info['posted_items'];
	 	 $id_user_seen = $row_info['user_id'];
			 $num_posted_itemstotal = $num_posted_items + 1 ;
			$updatenum_seen_total = "UPDATE user_information_table SET posted_items='$num_posted_itemstotal' WHERE user_id='$id_user_seen'";
			  mysql_select_db($database_connection, $connection);
  $Result1ud = mysql_query($updatenum_seen_total, $connection) or die(mysql_error());
			
			
}

// date close
/* } */
// date close

}
}



$connectdb = mysql_connect('localhost','omar','12345') or die ("not connect");
$selectdb=mysql_select_db('bauctionndba',$connectdb)or die("not selected database");
 


?>
<br>
 <h4> <a href="index.php">Home</a> >>   <a href="personal_page.php"> Personal page </a> >>  <a href="add_item_to_sell.php"> Add item to sell.</a> </h4>
<h6>Post an Auction for:(ID: <?php echo $row_info['user_id']; ?> )   <?php echo $row_info['user_f_name']; ?> - <?php echo $row_info['user_l_name']; ?></h6>

<p>

</p>




























   <hr>

    <p>&nbsp;</p>

                      <ul class="nav">

    <h1> First Step </h1>
<div class="head_o"> <h2><strong>Choose your Category</strong></h2> </div>






                          <?php
// include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);

    $gid = intval($_GET['cid']);

    $se = mysql_query("select * from cat where cid='$gid'");
    $num = mysql_num_rows($se);
    $row = mysql_fetch_assoc($se);
    $name = $row['name_cat'];
	 $id1 = intval($row['cid']);
    if($num == 0 or $num <0) {

//      echo '<div class="head_o"> <h3>  <strong>  Select Category</strong></h3> </div>';

// include("../admin/include/config.php");

	$s =mysql_query("select * from cat where cid_cat='0'  ORDER BY cid ASC");

    while($r = mysql_fetch_assoc($s)){
    $id0 = $r['cid'];
    $name0 = $r['name_cat'];
	echo "<li><h3 class='ok_o'><a href='add_item_to_sell.php?cid=$id0'  > $name0 </a><h3  class='ok_o'></li>";


    }


		 //



    }




   ?>





   </ul>
   </hr>

				  </nav>
					<p>&nbsp;</p>














                                        



















  <hr>


   <h1> Second Step </h1>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


  </hr>
  
  
  
  
  
  <div class="head_o"><strong>Press Brows choose Image for this item and Press upload to store it.</strong></div>

<div class="bodypanel_o">
  
  
  
<?php 






echo"<form action='#' method='post' enctype='multipart/form-data'>
1- Choose the Image Path : </p><input type='file' name='file'/><br>
 <br>
<br>
2- Press to Upload to save the image:<h4><input type='submit' name='dopost' value='upload'/></h4>
</form>";





// the file name is     upload 
if(isset($_POST['dopost'])and $_POST['dopost']=='upload'){

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 999999999 )
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error to upload an image <br>";
    }
  else
    {
   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo "<h1>Image already exists. </h1>";

	 
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "<h1>Stored </h1> " . $_FILES["file"]["name"];
      }
    }
  }
else
  {
 echo "<h1>Invalid file</h1>";
 // echo "<h1>Choose an image ! </h1>";
  }
  $imguplinsh = $_FILES["file"]["name"] ;
   // echo "<h1>Alhamdolelah Uploded  successfully </h1><h1>".    $imguplinsh ."</h1>";

/* close of if do and upload button */
}






?>



  
  
  </div>
  
  
  

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p>&nbsp;</p>
 <hr>







 <h1> Third Step </h1>

<div class="bodypanel_o">
  







<!-- Create a new file called newitem.phpand add the form: -->





<p>

</p>










<!-- <table align="center" > -->
<tr>
<td><h3>  <div class="head_o">Title: </div></h3></td>
<p>tittle for your listing (Brand, Model) or enter a UPC , ISBN , VIN or part Numper to enable people to find your item easly.</p>
<td>    <input name="moreSpec_title" cols="30" rows="5" placeholder=" give us tittle for your listing (Brand, Model) or enter a UPC , ISBN , VIN or part Numper. "><?php echo $CateGoryDetail; ?></textarea><h6>Example 3: RangRover 2015 </h6>
      <h6>Example 2: TOSHIBA MODEL: TECRA 504393894 name. </h6>
            <h6>Example 3: Samsung GALAXY NOTE5  </h6></td>

</tr>
<tr><hr></tr>

  
         
         

	<article class="row">
				   <td><h3>  <div class="head_o">Category: </div></h3></td>
                			<div class="col col-md-4">
								<h4>
                   
                

<h3>

<?php
// $catsql = "SELECT * FROM cat ";

// cat means Category
 $gidCatSelectP = intval($_GET['cid']);
$catsql = "SELECT * FROM cat WHERE cid_cat ='$gidCatSelectP'";
$catresult = mysql_query($catsql);
    $num_catresult = mysql_num_rows($catresult);
if($num_catresult == 0){
echo "Please write enough details about the category";
	                  echo "              <h6>Example 1: Vehicle , Cars, RangRover. </h6>";
					  
}else{
	
?>

<select name="catpost" >

<option value=""> Select category </option>
<?php

while($catrow = mysql_fetch_assoc($catresult)) {
$catrow_name_cat = $catrow['name_cat'] ;
echo "<option value='" . $catrow['cid'] . "'>" . $catrow_name_cat . "</option>";

}
?>
</select>  


                                </h4>
								<p>

                                <h6>Example 1: Vehicle => Cars</h6>
                                <h6>Example 2: Fashion => Men</h6>
                                
<h6>Example 3: Electronics</h6>

                                </p><?php


} /// close else of if($num_catresult == 0)
?>

							</div>	
                            
                            
							<div class="col col-md-6">
								<h4>
    <input name="CateGory_detail" cols="30" rows="5" placeholder=" Subsubcategory 
 "><?php echo $CateGoryDetail; ?></textarea>
  
   </h4>
								<p>
                                  <h6>Example 1: Cars, RangRover. </h6>
      <h6>Example 2: Men, Shows, Sport.  </h6>
 <h6>Example 2: Women, Accessories, Perfume, Narcissus.  </h6>
 <h6>Example 3: Phones, cellphone, Smartphones, Samsung.  </h6>
 
                                </p>
							</div>			            
						</article> 

  
 
</div>
<!-- </table> -->
</div>
  <hr>
 <h1> Fourth Step </h1>

<div class="head_o"><strong>Add Location</strong></div>
  <div class="bodypanel_o">
<tr>
<td>
  <p>&nbsp;</p></td>

<td>


  
  
 
  </td>
  </tr>
  <tr>
  <td> <p>&nbsp;</p></td>
  <td>


   



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script type="text/javascript">
function populate (s1,s2){
var s1 = document.getElementById(s1);
var s2 = document.getElementById(s2);
s2.innerHTML = "";
if (s1.value=="Afghanistan"){
	var optionArray =["Kabul|Kabul", "Chaghcharan|Chaghcharan","Chaghcharan|Chaghcharan", "Charikar|Charikar","Farah|Farah","Ghazni|Ghazni", "Herat|Herat","Jalalabad|Jalalabad","Kandahar|Kandahar", "Khost|Khost","Kunduz|Kunduz","Lashkar Gah|Lashkar Gah", "Mazar-i-Sharif|Mazar-i-Sharif","Mihtarlam|Mihtarlam","Pul-i-Alam	|Pul-i-Alam	", "Puli Khumri|Puli Khumri","Puli Khumri|Puli Khumri","Samangan|Samangan", "Sar-e Pol|Sar-e Pol","Sheberghan|Sheberghan","Taloqan|Taloqan"
	
	];
} else if (s1.value=="Albania"){
	var optionArray =["Tirana|Tirana","Tirana|Tirana","Durrës|Durrës", "Durrës|Durrës","Vlorë|Vlorë","Elbasan|Elbasan", "Shkodër|Shkodër","Korçë|Korçë","Fier|Fier", "Kamëz|Kamëz","Berat|Berat","Lushnjë|Lushnjë", "Lushnjë|Lushnjë","Sarandë|Sarandë","Paskuqan|Paskuqan", "Kavajë|Kavajë","Pogradec|Pogradec","Gjirokastër|Gjirokastër"];
} else if (s1.value=="Algeria"){
	var optionArray =["Algiers|Algiers"];
} else if (s1.value=="Angola"){
	var optionArray =["Luanda|Luanda"];
} else if (s1.value=="Argentina")
{
	var optionArray =["Buenos Aires|Buenos Aires", "Córdoba|Córdoba","La Plata|La Plata","Mar del Plata|Mar del Plata", "Mendoza|Mendoza","Rosario|Rosario","Salta|Salta", "San Carlos de Bariloche|San Carlos de Bariloche"];

} else if (s1.value=="Armenia"){
	var optionArray =["Yerevan|Yerevan"];


} else if (s1.value=="Australia"){
	var optionArray =["Brisbane|Brisbane", "Melbourne|Melbourne","Perth|Perth","Sydney|Sydney"];


} else if (s1.value=="Austria"){
	var optionArray =["Vienna|Vienna"];


} else if (s1.value=="Azerbaijan"){
	var optionArray =["Baku|Baku"];


} else if (s1.value=="Bangladesh"){
	var optionArray =["Dhaka|Dhaka"];


} else if (s1.value=="Bahrain"){
	var optionArray =["|"];

} else if (s1.value=="Belgium"){
	var optionArray =["Brussels|Brussels"];


} else if (s1.value=="Bolivia"){
	var optionArray =["Santa Cruz de la Sierra|Santa Cruz de la Sierra"];


} else if (s1.value=="Bosnia and Herzegovina"){
	var optionArray =["Sarajevo|Sarajevo"];


} else if (s1.value=="Brazil"){
	var optionArray =["Belo Horizonte|Belo Horizonte", "Brasília|Brasília","Cabo Frio|Cabo Frio","Campinas|Campinas", "Curitiba|Curitiba","Florianópolis|Florianópolis","Fortaleza|Fortaleza", "Goiânia|Goiânia","Guarulhos|Guarulhos","João Pessoa|João Pessoa", "Maceió|Maceió","Manaus|Manaus","Natal|Natal", "Porto Alegre|Porto Alegre","Praia Grande|Praia Grande","Recife|Recife", "Ribeirão Prêto|Ribeirão Prêto","Rio de Janeiro|Rio de Janeiro","Salvador|Salvador", "Santos|Santos","São José dos Campos|São José dos Campos","São Luís|São Luís", "São Paulo|São Paulo"];


} else if (s1.value=="Bulgaria"){
	var optionArray =["Sofia|Sofia"];


} else if (s1.value=="Cambodia"){
	var optionArray =["Phnom Penh|Phnom Penh"];


} else if (s1.value=="Cameroon"){
	var optionArray =["Yaoundé|Yaoundé"];


} else if (s1.value=="Canada"){
	var optionArray =["Calgary|Calgary", "Edmonton|Edmonton","Montreal|Montreal","Ottawa|Ottawa", "Toronto|Toronto","Vancouver|Vancouver"];


} else if (s1.value=="Central African Republic"){
	var optionArray =["Batam|Batam"];


} else if (s1.value=="Chile"){
	var optionArray =["Santiago|Santiago", "Viña del Mar|Viña del Mar"];


} else if (s1.value=="China"){
	var optionArray =["Beijing|Beijing", "Shanghai|Shanghai"];


} else if (s1.value=="Colombia"){
	var optionArray =["Barranquilla|Barranquilla", "Bogotá|Bogotá","Bucaramanga|Bucaramanga","Cali|Cali", "Cartagena|Cartagena","Medellín|Medellín","Pereira|Pereira", "Santa Marta|Santa Marta"];


} else if (s1.value=="Costa Rica"){
	var optionArray =["San José|San José"];


} else if (s1.value=="Côte d'Ivoire"){
	var optionArray =["Abidjan|Abidjan"];


} else if (s1.value=="Croatia"){
	var optionArray =["Zagreb|Zagreb"];


} else if (s1.value=="Cuba"){
	var optionArray =["Varadero|Varadero"];


} else if (s1.value=="Cyprus"){
	var optionArray =["Nicosia|Nicosia"];


} else if (s1.value=="Czech Republic"){
	var optionArray =["Prague|Prague"];


} else if (s1.value=="Democratic Republic of the Congo"){
	var optionArray =["Kinshasa|Kinshasa"];


} else if (s1.value=="Denmark"){
	var optionArray =["Copenhagen|Copenhagen"];


} else if (s1.value=="Dominican Republic"){
	var optionArray =["Santo Domingo|Santo Domingo"];


} else if (s1.value=="Ecuador"){
	var optionArray =["Cuenca|Cuenca", "Guayaquil|Guayaquil","Quito|Quito"];


} else if (s1.value=="Egypt"){
	var optionArray =["Alexandria|Alexandria", "Cairo|Cairo"];


} else if (s1.value=="El Salvador"){
	var optionArray =["San Salvador|San Salvador"];


} else if (s1.value=="Estonia"){
	var optionArray =["Tallinn|Tallinn"];


} else if (s1.value=="Ethiopia"){
	var optionArray =["Addis Ababa|Addis Ababa"];


} else if (s1.value=="Fiji"){
	var optionArray =["Suva|Suva"];


} else if (s1.value=="Finland"){
	var optionArray =["Helsinki|Helsinki"];


} else if (s1.value=="France"){
	var optionArray =["Marseille|Marseille", "Nice|Nice","Paris|Paris"];



} else if (s1.value=="Georgia"){
	var optionArray =["Tbilisi|Tbilisi"];


} else if (s1.value=="Germany"){
	var optionArray =["Berlin|Berlin", "Frankfurt|Frankfurt","Hamburg|Hamburg","Munich|Munich"];


} else if (s1.value=="Ghana"){
	var optionArray =["Accra|Accra"];


} else if (s1.value=="Greece"){
	var optionArray =["Athens|Athens"];


} else if (s1.value=="Guatemala"){
	var optionArray =["Guatemala City|Guatemala City", "|"];


} else if (s1.value=="Haiti"){
	var optionArray =["Port-au-Prince|Port-au-Prince"];



} else if (s1.value=="Honduras"){
	var optionArray =["Tegucigalpa|Tegucigalpa"];


} else if (s1.value=="Hong Kong"){
	var optionArray =["Causeway Bay|Causeway Bay"];


} else if (s1.value=="Hungary"){
	var optionArray =["Budapest|Budapest"];


} else if (s1.value=="India"){
	var optionArray =["Ahmedabad|Ahmedabad","Bangalore|Bangalore","Bhopal|Bhopal", "Calcutta|Calcutta","Chandigarh|Chandigarh","Chennai|Chennai", "Delhi|Delhi","Goa|Goa","Gurgaon|Gurgaon", "Hyderabad|Hyderabad","Indore|Indore","Jaipur|Jaipur", "Mumbai|Mumbai","New Delhi|New Delhi","Pune|Pune"];


} else if (s1.value=="Indonesia"){
	var optionArray =["Bali|Bali", "Bandung|Bandung","Batam|Batam","Bekasi|Bekasi", "Bogor|Bogor","Denpasar|Denpasar","Jakarta|Jakarta", "Makassar|Makassar","Malang|Malang","Medan|Medan", "Palembang|Palembang","Pekanbaru|Pekanbaru","Semarang|Semarang", "Surabaya|Surabaya","Tangerang|Tangerang","Yogyakarta|Yogyakarta"];


} else if (s1.value=="Iran"){
	var optionArray =["Tehran|Tehran", "|"];



} else if (s1.value=="Iraq"){
	var optionArray =["Baghdad|Baghdad"];


} else if (s1.value=="Ireland"){
	var optionArray =["Dublin|Dublin"];


} else if (s1.value=="Israel"){
	var optionArray =["Tel Aviv|Tel Aviv", "|"];


} else if (s1.value=="Italy"){
	var optionArray =["Bologna|Bologna","Florence|Florence", "Milan|Milan","Naples|Naples","Palermo|Palermo", "Rome|Rome","Turin|Turin","Venice|Venice"];


} else if (s1.value=="Jamaica"){
	var optionArray =["Kingston|Kingston", "|"];


} else if (s1.value=="Japan"){
	var optionArray =["Kyoto-shi|Kyoto-shi", "|"];






} else if (s1.value=="Jordan"){
	var optionArray =["Amman|Amman", "|"];


} else if (s1.value=="Kenya"){
	var optionArray =["Nairobi|Nairobi"];


} else if (s1.value=="Kuwait"){
	var optionArray =["Kuwait|Kuwait"];


} else if (s1.value=="Laos"){
	var optionArray =["Vientiane|Vientiane"];


} else if (s1.value=="Latvia"){
	var optionArray =["Riga|Riga"];



} else if (s1.value=="Lebanon"){
	var optionArray =["Beirut|Beirut"];


} else if (s1.value=="Libya"){
	var optionArray =["Tripoli|Tripoli"];


} else if (s1.value=="Lithuania"){
	var optionArray =["Vilnius|Vilnius"];


} else if (s1.value=="Luxembourg"){
	var optionArray =["Luxembourg|Luxembourg"];


} else if (s1.value=="Madagascar"){
	var optionArray =["Antananarivo|Antananarivo"];


} else if (s1.value=="Malaysia"){
	var optionArray =["Kuala Lumpur|Kuala Lumpur", "Melaka|Melaka","Penang|Penang"];


} else if (s1.value=="Malta"){
	var optionArray =["Valletta|Valletta"];


} else if (s1.value=="Mauritius"){
	var optionArray =["Port Louis|Port Louis", "|"];


} else if (s1.value=="Mexico"){
	var optionArray =["Acapulco|Acapulco","Aguascalientes|Aguascalientes", "Cancún|Cancún","Cuernavaca|Cuernavaca","Guadalajara|Guadalajara", "Hermosillo|Hermosillo","León|León","Mérida|Mérida", "Mexicali|Mexicali","Mexico City|Mexico City","Monterrey|Monterrey", "Morelia|Morelia","Oaxaca de Juárez|Oaxaca de Juárez","Playa del Carmen|Playa del Carmen", "Puebla|Puebla","Puerto Vallarta|Puerto Vallarta","Querétaro|Querétaro", "San Luis Potosí|San Luis Potosí","Tijuana|Tijuana","Veracruz|Veracruz"];


} else if (s1.value=="Montenegro"){
	var optionArray =["Budva|Budva"];


} else if (s1.value=="Morocco"){
	var optionArray =["Casablanca|Casablanca", "Marrakesh|Marrakesh","|"];


} else if (s1.value=="Mozambique"){
	var optionArray =["Maputo|Maputo", "|"];


} else if (s1.value=="Myanmar"){
	var optionArray =["Yangon, Burma|Yangon, Burma", "|","|","|", "|","|","|", "|","|","|", "|","|","|", "|","|","|"];


} else if (s1.value=="Namibia"){
	var optionArray =["Windhoek|Windhoek", "|","|","|" ,"|", "|","|","|", "|","|","|", "|","|","|", "|","|","|"];


} else if (s1.value=="Nepal"){
	var optionArray =["Kathmandu|Kathmandu", "|","|","|", "|","|","|", "|","|","|", "|","|","|", "|","|","|", "|","|","|", "|","|","|", "|","|","|"];


} else if (s1.value=="Netherlands"){
	var optionArray =["Amsterdam|Amsterdam"];


} else if (s1.value=="New Caledonia"){
	var optionArray =["Nouméa|Nouméa"];


} else if (s1.value=="New Zealand"){
	var optionArray =["Auckland|Auckland"];


} else if (s1.value=="Nicaragua"){
	var optionArray =["Managua|Managua"];


} else if (s1.value=="Norway"){
	var optionArray =["Oslo|Oslo"];


} else if (s1.value=="North Korea"){
	var optionArray =["|"];


} else if (s1.value=="Oman"){
	var optionArray =["Muscat|Muscat"];


} else if (s1.value=="Pakistan"){
	var optionArray =["Islamabad|Islamabad", "Karachi|Karachi","Lahore|Lahore"];


} else if (s1.value=="Palestine"){
	var optionArray =["Gaza|Gaza"];


} else if (s1.value=="Panama"){
	var optionArray =["Panama City|Panama City"];


} else if (s1.value=="Paraguay"){
	var optionArray =["Asunción|Asunción"];


} else if (s1.value=="Peru"){
	var optionArray =["Arequipa|Arequipa", "Chiclayo|Chiclayo","Lima|Lima","Trujillo|Trujillo"];


} else if (s1.value=="Philippines"){
	var optionArray =["Baguio City|Baguio City", "Cebu City|Cebu City","Davao City|Davao City","Makati|Makati", "Manila|Manila","Quezon City|Quezon City","Tagaytay City|Tagaytay City"];


} else if (s1.value=="Poland"){
	var optionArray =["Kraków|Kraków", "Warsaw|Warsaw"];


} else if (s1.value=="Portugal"){
	var optionArray =["Lisbon|Lisbon", "Porto|Porto"];


} else if (s1.value=="Puerto Rico"){
	var optionArray =["San Juan|San Juan","|"];


} else if (s1.value=="Qatar"){
	var optionArray =["Doha|Doha"];


} else if (s1.value=="Republic of Macedonia"){
	var optionArray =["Skopje|Skopje"];



} else if (s1.value=="Réunion"){
	var optionArray =["Saint-Denis|Saint-Denis","|"];


} else if (s1.value=="Romania"){
	var optionArray =["Bucharest|Bucharest","|"];


} else if (s1.value=="Russia"){
	var optionArray =["Moscow|Moscow", "|"];

} else if (s1.value=="Saudi Arabia"){
	var optionArray =["Jeddah|Jeddah", "|"];

} else if (s1.value=="Riyadh"){
	var optionArray =["Senegal|Senegal", "|","|"];

} else if (s1.value=="Dakar"){
	var optionArray =["Serbia|Serbia", "|"];

} else if (s1.value=="Belgrade"){
	var optionArray =["Singapore|Singapore"];

} else if (s1.value=="Singapore"){
	var optionArray =["Singapore|Singapore", "|"];




} else if (s1.value=="Slovakia"){
	var optionArray =["Bratislava|Bratislava", "|"];

} else if (s1.value=="Slovenia"){
	var optionArray =["Ljubljana|Ljubljana", "|"];

} else if (s1.value=="South Africa"){
	var optionArray =["Cape Town|Cape Town", "|"];

} else if (s1.value=="South Korea"){
	var optionArray =["Seoul|Seoul", "|"];

} else if (s1.value=="Spain"){
	var optionArray =["Barcelona|Barcelona", "Granada|Granada", "Madrid|Madrid", "Málaga|Málaga", "Seville|Seville", "|", "|"];

} else if (s1.value=="Sri Lanka"){
	var optionArray =["Colombo|Colombo", "|"];

} else if (s1.value=="Sudan"){
	var optionArray =["Khartoum|Khartoum", "|"];

} else if (s1.value=="Sweden"){
	var optionArray =["Stockholm|Stockholm", "|"];

} else if (s1.value=="Switzerland"){
	var optionArray =["Zürich|Zürich"];

} else if (s1.value=="Syria"){
	var optionArray =["Damascus|Damascus"];


} else if (s1.value=="Taiwan"){
	var optionArray =["Kaohsiung|Kaohsiung", "Taichung|Taichung","Tainan|Tainan","Taipei|Taipei"];


} else if (s1.value=="Tanzania"){
	var optionArray =["Dar es Salaam|Dar es Salaam", "|"];


} else if (s1.value=="Thailand"){
	var optionArray =["Bangkok|Bangkok", "Chiang Mai|Chiang Mai","Phuket|Phuket"];
	
	

} else if (s1.value=="The Bahamas"){
	var optionArray =["Nassau|Nassau", "|"];

} else if (s1.value=="Trinidad and Tobago"){
	var optionArray =["Port of Spain|Port of Spain"];
	
} else if (s1.value=="Tunisia"){
	var optionArray =["Tunis|Tunis"];
	

} else if (s1.value=="Turkey"){
	var optionArray =["Ankara|Ankara", "Antalya|Antalya","Istanbul|Istanbul","Izmir|Izmir"];

} else if (s1.value=="Uganda"){
	var optionArray =["Kampala|Kampala"];

} else if (s1.value=="Ukraine"){
	var optionArray =["Kyiv|Kyiv"];

} else if (s1.value=="United Arab Emirates"){
	var optionArray =["Abu Dhabi|Abu Dhabi", "Dubai|Dubai"];
	
} else if (s1.value=="United Kingdom"){
	var optionArray =["Brighton|Brighton", "Bristol|Bristol","Edinburgh|Edinburgh","Liverpool|Liverpool", "London|London","Manchester|Manchester"];

	
} else if (s1.value=="United States"){
	var optionArray =["Atlanta|Atlanta","Austin|Austin","Baltimore|Baltimore", "Boston|Boston","Brooklyn|Brooklyn","Charleston|Charleston", "Charlotte|Charlotte","Chicago|Chicago","Columbus|Columbus", "Dallas|Dallas","Denver|Denver","Honolulu|Honolulu", "Houston|Houston","Indianapolis|Indianapolis", "Jacksonville|Jacksonville","Las Vegas|Las Vegas","Los Angeles|Los Angeles", "Miami|Miami","Miami Beach|Miami Beach","Minneapolis|Minneapolis", "Myrtle Beach|Myrtle Beach","Nashville|Nashville","New Orleans|New Orleans", "New York|New York","Orlando|Orlando","Philadelphia|Philadelphia", "Phoenix|Phoenix","Pittsburgh|Pittsburgh","Portland|Portland", "Sacramento|Sacramento","San Antonio|San Antonio","San Diego|San Diego", "San Francisco|San Francisco","San Jose|San Jose","Seattle|Seattle", "Tampa|Tampa","Virginia Beach|Virginia Beach","Washington|Washington"];

	
} else if (s1.value=="Uruguay"){
	var optionArray =["Montevideo|Montevideo"];

	
} else if (s1.value=="Venezuela"){
	var optionArray =["Barquisimeto|Barquisimeto", "Caracas|Caracas","Maracaibo|Maracaibo","Maracay|Maracay", "Valencia|Valencia"];

	
} else if (s1.value=="Vietnam"){
	var optionArray =["Hanoi|Hanoi", "Ho Chi Minh City|Ho Chi Minh City"];

	
} else if (s1.value=="Yemen"){
	var optionArray =["Sanaa|Sanaa", "Ibb|Ibb","Taes|Taes","Aden|Aden", "Hadramot|Hadramot","Alhodaidah|Alhodaidah","Abian|Abian"];


}else if (s1.value=="Zimbabwe"){
	var optionArray =["Harare|Harare"];
}
for (var option in optionArray){
var pair = optionArray[option].split("|");
var newoption = document.createElement("option");
newoption .value = pair[0];
newoption.innerHTML = pair[1];
s2.options.add (newoption);	
	
}
	
	
}

</script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />









</head>





<body>









<h4>Please select  country</h4>
<select id = "slct1" name="slct1" onChange="populate(this.id, 'slct2')">




<option value=""></option>







      <?php

$countries = array
(
	
	'Afghanistan' => 'Afghanistan (‫افغانستان‬‎)',
	'Albania' => 'Albania (Shqipëri)',
	'Algeria' => 'Algeria',
	'Angola' => 'Angola',
	'Argentina' => 'Argentina',
	
	'Armenia' => 'Armenia (Հայաստան)',
	'Austria' => ' Austria (Österreich)',
	'Azerbaijan' => '  Azerbaijan (Azərbaycan)',
	'Belgium' => 'Belgium',
	'Bolivia' => 'Bolivia',
	'Bahrain' => 'Bahrain (‫البحرين‬‎)',
	'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
	'Bangladesh ' => 'Bangladesh (বাংলাদেশ)',
	'Brazil' => 'Brazil',
	'Bulgaria' => 'Bulgaria (България)',
	'Cambodia' => 'Cambodia (កម្ពុជា)',
	'Cameroon' => 'Cameroon (Cameroun)',
	'Canada' => 'Canada',
	'Central African Republic' => 'Central African Republic',
	'Chile' => 'Chile',
	'China' => 'China (中国)',
	'Colombia' => 'Colombia',
	'Comoros ' => 'Comoros (‫جزر القمر‬‎) ',
	'Costa Rica' => 'Costa Rica',
	
	
	
	
	'Côte d\'Ivoire' => 'Côte d\'Ivoire',
	'Croatia' => 'Croatia (Hrvatska)',
	'Cuba' => 'Cuba',
	'Cyprus' => 'Cyprus (Κύπρος)',
	'Czech Republic' => 'Czech Republic (Česká republika)',

	'Democratic Republic of the Congo' => 'Democratic Republic of the Congo',
	'Denmark' => 'Denmark',
	'Dominican Republic' => 'Dominican Republic',
	
	'Ecuador' => 'Ecuador',
	'Chile' => 'Chile',
	'Egypt' => 'Egypt (‫مصر‬‎)',
	'Estonia' => 'Estonia',
	'Ethiopia' => 'Ethiopia',

	'Fiji' => 'Fiji',
	'Finland' => 'Finland (Suomi)',
	'France' => 'France',
	
	'Georgia (country)' => 'Georgia (საქართველო) (country)',
	'Germany' => 'Germany',
	'Ghana' => 'Ghana',
	
	
	
	'Greece' => 'Greece (Ελλάδα)',
	'Guatemala' => 'Guatemala',
	
	'Haiti' => 'Haiti',
	'Honduras' => 'Honduras',

	'Hungary' => 'Hungary',
	'Iceland' => 'Iceland',
	
	
	
	'India' => 'India (भारत)',
	'Indonesia' => 'Indonesia',
	
	
	
	'Iran' => 'Iran (‫ایران‬‎)',
	'Iraq' => 'Iraq (‫العراق‬‎)',
	'Ireland' => 'Ireland',


	'Italy' => 'Italy',
	'Jamaica' => 'Jamaica',
	'Japan' => 'Japan (日本)',
	'Jordan' => 'Jordan (‫الأردن‬‎)',
	
	'Kenya' => 'Kenya',
	'Kuwait' => 'Kuwait (‫الكويت‬‎)',
	'Laos' => 'Laos',
	
	'Latvia' => 'Latvia',
	'Lebanon' => 'Lebanon (‫لبنان‬‎)',
	'Libya' => 'Libya (‫ليبيا‬‎)',
	'Lithuania' => 'Lithuania',
	'Luxembourg' => 'Luxembourg',
	'Madagascar' => 'Madagascar',
	'Malaysia' => 'Malaysia',
	'Malta' => 'Malta',
	'Mauritius' => 'Mauritius',
	'Mexico' => 'Mexico',
	'Montenegro' => 'Montenegro',
	'Morocco' => 'Morocco',
	'Mozambique' => 'Mozambique',
	'Myanmar' => 'Myanmar',
	
	'Namibia' => 'Namibia',
	'Nepal' => 'Nepal (नेपाल)',
	'Netherlands' => 'Netherlands',
	'New Caledonia' => 'New Caledonia',
	'New Zealand' => 'New Zealand',
	'Nicaragua' => 'Nicaragua',
	'Nigeria' => 'Nigeria',
	'Norway' => 'Norway',
	'North Korea' => 'North Korea (조선민주주의인민공화국)',
	'Oman' => 'Oman (‫عُمان‬‎)',
	'Pakistan' => 'Pakistan (‫پاکستان‬‎)',
	
	
	
	'Palestine' => 'Palestine (‫فلسطين‬‎)',
	'Panama' => 'Panama',
	'Paraguay' => 'Paraguay',
	'Peru' => 'Peru',
	'Philippines' => 'Philippines',
	
	'Poland' => 'Poland',
	'Portugal' => 'Portugal',
	'Puerto Rico' => 'Puerto Rico',
	
	'Qatar' => 'Qatar (‫قطر‬‎)',
	'Republic of Macedonia' => 'Republic of Macedonia',
	'Réunion' => 'Réunion',
	'Romania' => 'Romania',
	'Russia' => 'Russia',
	'Saudi Arabia' => 'Saudi Arabia (‫المملكة العربية السعودية‬‎)',
	'Senegal' => 'Senegal',
	
	
	'Serbia' => 'Serbia (Србија)',
	'Singapore' => 'Singapore',
	'Slovakia' => 'Slovakia',
	
	'Slovenia' => 'Slovenia',
	
	'South Africa' => 'South Africa',
	'South Korea' => 'South Korea (대한민국)',
	'Spain' => 'Spain',
	'Sri Lanka' => 'Sri Lanka',
	
	'Sudan' => 'Sudan (السودان‬‎)',
	'Sweden' => 'Sweden',
	'Switzerland' => 'Switzerland',
	'Syria' => 'Syria (‫سوريا‬‎)',
	'Taiwan' => 'Taiwan (台灣)',
	
	'Tanzania' => 'Tanzania',
	'Thailand' => 'Thailand',
	
	'The Bahamas' => 'The Bahamas',
	'Trinidad and Tobago' => 'Trinidad and Tobago',
	'Tunisia' => 'Tunisia',
	'Turkey' => 'Turkey',
	'Uganda' => 'Uganda',
	
	'Ukraine' => 'Ukraine (Україна)',
	'United Arab Emirates' => 'United Arab Emirates (‫الإمارات العربية المتحدة‬‎)',
	'United Kingdom' => 'United Kingdom',
	'United States' => 'United States',
	
	'Uruguay' => 'Uruguay',
	
	'Venezuela' => 'Venezuela',
	'Vietnam' => 'Vietnam',
	'Yemen' => 'Yemen (‫اليمن‬‎)',
	'Zimbabwe' => 'Zimbabwe'





);




foreach($countries  as $x=>$x_value)
  {
  echo "<option value='" . $x . "'>" . $x_value."</option>";
  echo "<br>";
 // echo '<option value="Aden">Aden</option>';
  }
?> 
       
       
   






</select>

<h4>Please select city</h4>

<span id="spryselect1">
<select id = "slct2" name="slct2">
  <option value=""> select city </option>
</select>
<span class="selectRequiredMsg">Please select country and city.</span></span>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
</script>
</body>
</html>


   
   
   
   
   
   
   
   
   
</td>
</tr>

  
  
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <hr>
   <h1> Fifth Step </h1>
<div class="head_o"><strong>Add item details</strong></div>

<div class="bodypanel_o">

  

<table align="center">
<tr>
<td><h4>Item name: </h4></td>
<td><input type="text" name="namepost"  value='<?php echo $pName; ?>' placeholder="Name enable users to find it"/></td>
</tr>

<tr>

<td><h4>Price: </h4></td>
<td>
<hr>
 <select name="Currencypost" id="Currency" >
   <option value="">Select Currency</option>
   <option value="EUR(Euro €)">Euro €</option>
   <option value="GBP(Pound £)">Pound £</option>
   <option value="USD(Dollar US$)">Dollar US$</option>
   <option value="Yemeni Rial">Yemeni Rial </option>
   </select>


<input type="text"
name="pricepost" placeholder="Maximum price" value="<?php echo $pprice; ?>" >
<hr/>
</td>

</tr>

<tr>
<td><h4>Item description: </h4></td>
<td><textarea name="descriptionpost" rows="20"
cols="50" placeholder="Description, Color, Size, Model Name "><?php echo $pDescription; ?></textarea></td>
<hr>
</tr>
</table>
<table align="center" class="head_o" cellspacing="0" cellpadding="4">
<tr>




<td colspan="2"><h2><strong> Use as an auction ! </strong></h2><pre>(Optional)</pre> <hr></td>
</tr>
<tr>
<td align="left"><p> Specify start price Number bidders: </p></td>
<td align="left">
<input type="text" name="Start_Spricepost" placeholder="Start price" value="<?php echo $Start_Spricepost; ?>" >
</td>

</tr>


<tr>

<td align="left"><p> Specify Condition: </p></td>

<td align="left">
       <p>&nbsp;</p>  
     <p>
       <label>
      <input type="radio" name="post_status" value="" id="auc_condation_new" />Leave status empty  </label>
     <br>
       <label>
      <input type="radio" name="post_status" value="new" id="auc_condation_new" /> New  </label>
           <br>
  <label>    <input type="radio" name="post_status" value="used" id="auc_condation_used" /> Used</label>
       <br>
<p>
<hr>
      </td>

</tr>

<tr>

<td align="left"><p>Specify Ending date of an auction: </p></td>
<td>

<table>
<tr>
<td><p>Day</td>
<td><p>Month</td>
<td><p>Year</td>
<td><p>Hour</td>
<td><p>Minute</td>
</tr>
<tr>
<td>
<select name="day">
<?php
echo "<option> </option>";
for($i=1;$i<=31;$i++) {
echo "<option>" . $i . "</option>";
}
?>
</select>
</td>
<td>
<select name="month">
<?php
echo "<option> </option>";
for($i=1;$i<=12;$i++) {
echo "<option>" . $i . "</option>";
}
?>
</select>
</td>
<td>
<select name="year">
<?php
echo "<option> </option>";

for($i=2015;$i<=2050;$i++) {
echo "<option>" . $i . "</option>";
}
?>
</select>
</td>
<td>
<select name="hour">
<?php
echo "<option> </option>";
for($i=0;$i<=23;$i++) {
echo "<option>" . sprintf("%02d",$i) . "</option>";
}
?>
</select>
</td>
<td>
<select name="minute">
<?php
echo "<option> </option>";
for($i=0;$i<=60;$i++) {
echo "<option>" . sprintf("%02d",$i) . "</option>";
}
?>
</select>
</td>
</tr>
</table>

</td>
</tr>

<tr>
<td colspan="2">



 <div class="bodypanel_o"> </div> </td><hr>
 </tr>
</table>





</table>


</div >

  <p></p>
  <hr>
<p>&nbsp;</p>
 
    
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><p>&nbsp;</p></td>
      <td><p>&nbsp; </p>
     
        <h1>Last step InshAllah </h1>
        <p>
        <div class="head_o"> <p>Make shure your image is stored and you fill the required information. </p><input type="submit" value="Insert to sell" /></div>
      </p></td>
    </tr>
  </table>
 

 
  <input type="hidden" name="MM_insert" value="form1" />
  
  
   <input type="hidden" name="USER_id" value="<?php echo $row_info['user_id']; ?>" />
  <input type="hidden" name="nameimguplinshpost" value="<?php echo $imguplinsh ; ?>" />
<!--   <input type="hidden" name="posted_date" value="posted_date" />  ->
  
  
</form>






<p>&nbsp;</p>
</body>
</html>
<p>
  <?php
}

/*   }  */

/*   }  */

mysql_free_result($sellauc);

mysql_free_result($info);
?>
  
  
  
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<?php include 'footer.php';?>

                            
                            
                            
                            
                            
                            
                            
                            
                                    <!--- from addprod.php End  -->                    
                            
                            <hr>
                                       
                               <p>&nbsp;</p>
        			        
                               <p>&nbsp;</p>
        			
     
                               <p>&nbsp;</p>
        			
                               <p>&nbsp;</p>
        			
                        
                    </div>
                    
                    
          

