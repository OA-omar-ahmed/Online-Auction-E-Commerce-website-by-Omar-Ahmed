


<html>
<head>

<!-- /omar -->

<style type="text/css">






.main-search{
	background-color:#f0f0f0;
	background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #f0f0f0),color-stop(100%, #c9c9c9));
	background-image:-webkit-linear-gradient(top, #f0f0f0,#c9c9c9);
	background-image:-moz-linear-gradient(top, #f0f0f0,#c9c9c9);

	background-image:-ms-linear-gradient(top, #f0f0f0,#d6e0ea);

	background-image:-o-linear-gradient(top, #f0f0f0,#c9c9c9);
	background-image:linear-gradient(top, #f0f0f0,#c9c9c9);
	width:966px;
	padding:6px;
	height:64px;
	border:solid 1px #989393;
	margin:0 auto;
	box-shadow:inset 0px 1px 1px 0px #fff,0px 2px 2px 0px rgba(0,0,0,0.2);
	position:relative;
	margin-top:15px;
	border-top-left-radius:4px;
	border-bottom-left-radius:4px;
	border-top-right-radius:4px;
	border-bottom-right-radius:4px
}.main-search .has-placeholder{float:none}.main-search input{background-color:#f6f6f6;border:solid 1px #bfbfbf;border-top-left-radius:3px;border-top-right-radius:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px;border-top-left-radius:3px;border-bottom-left-radius:3px;border-top-right-radius:3px;border-bottom-right-radius:3px;box-shadow:inset 0 1px 0 0 #E0E0E0;display:inline-block;vertical-align:middle;color:#646464;line-height:43px;text-decoration:none;padding:0 15px;box-shadow:inset 0 1px 0 0 #d6cece;height:43px;width:100%}.main-search .selector{padding-left:42px;padding-right:12px}.main-search .reset-padding{padding-left:0px}.main-search .ui-button{background-color:#35c3d9;background-color:#35c3d9;background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #35c3d9),color-stop(100%, #18a7be));background-image:-webkit-linear-gradient(top, #35c3d9,#18a7be);background-image:-moz-linear-gradient(top, #35c3d9,#18a7be);background-image:-ms-linear-gradient(top, #35c3d9,#18a7be);background-image:-o-linear-gradient(top, #35c3d9,#18a7be);background-image:linear-gradient(top, #35c3d9,#18a7be);border:solid 1px #1f91a3;border-top-left-radius:3px;border-top-right-radius:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px;border-top-left-radius:3px;border-bottom-left-radius:3px;border-top-right-radius:3px;border-bottom-right-radius:3px;display:inline-block;vertical-align:middle;color:#fff !important;line-height:43px;text-decoration:none;padding:0 15px;box-shadow:inset 0 1px 0 0 #a0e3ed;text-shadow:0 1px 0 rgba(0,0,0,0.3);height:43px}.main-search .cell{display:table-cell;width:100%;vertical-align:top}#header .nav{position:absolute;right:0;top:10px;padding:0;margin:0;list-style:none}#header .nav li{float:left;position:relative}#header .nav li.search,#header .nav li.cat{display:none}#header .nav li a,#header .nav li span{color:white;font-size:0.875em}#header .nav li{color:white}#header .nav li a{margin-left:10px}#header .nav li.publish{clear:both;float:right;margin-top:10px}


 
 
 
 
 
 

</style>


<!-- /omar -->
</head>
<body>
      
   
        <form id="form1" name="form1" action=""  class="search nocsrf"  method="post" >

        <div class="main-search">
            <div class="cell">

               <input type="text" class="form-control" placeholder="I'm searching for... " id="keyword" name="namesearchjquery">
           
                        <h6>(Optional)</h6>
            </div>
                            <div class="cell selector">
                    
                    

  <select class="ui-button ui-button-big js-submit" name="CaSear_cat" > 
<option value=""> Select a category </option>
<?php


// include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);

	$s =mysql_query("select * from cat");

//	$s =mysql_query("select * from cat where cid_cat='0' ");
//	    $numsuCats = mysql_num_rows($s);
    while($r = mysql_fetch_assoc($s)){
    $CcatId = $r['cid'];
    $cationname = $r['name_cat'];
//	echo "<li><a href='cat.php?cid=$id'>$name</a></li>";
//echo "<option value='$CcatId'>$cationname</option>";

//if($numsuCats != 0 ){

	
			$suCatAucs =mysql_query("select cat_id from items_table where cat_id='$CcatId' ");
	    $numsuCatAuaacs = mysql_num_rows($suCatAucs);
		
			//echo "<li> <a href='cat.php?cid=$oCat'>  ";
// echo "  <strong>  $NaSu </strong>  ( ".$numsuCatAuaac." )  ";
	
	
echo "<option value='$CcatId'> <strong> $cationname  </strong>  ( ".$numsuCatAuaacs." )  </option>";
	
//}//closeif($numsuCat != 0 )


	
    }

	  
	  
	  
	  
	  
?>

                         </select>
                          <h6>(Optional)</h6>
                                    </div>
              
              
                          
                                    <!-- Loc s-->
                                    
                        <div class="cell selector">
                    
                    

  <select class="ui-button ui-button-big js-submit" name="LoCSear_LoC" >
<option value=""> Select a place  </option>


<?php


include("../admin/include/config.php");
//	$s =mysql_query("select * from cat where cid_cat='0' ");
//	$sLOcA =mysql_query("select * from location");
//			$sLOcA =mysql_query("select distinct loc_detail from auctiont");
			$sLOcA = mysql_query("SELECT DISTINCT Country FROM   items_table ORDER BY Country DESC");
// ORDER BY category";
    $numsLOcAs = mysql_num_rows($sLOcA);
    while($rLOcA = mysql_fetch_assoc($sLOcA)){
//    $LlAtId = $rLOcA['lid'];
    $loCionname = $rLOcA['Country'];
//	    $loCionnametwo = $rLOcA['loc_detail'];
//	echo "<li><a href='cat.php?cid=$id'>$name</a></li>";

 

echo "<option value='$loCionname'>  <strong> $loCionname  </strong>  ( ".$numsLOcAs." )  </option>";
	
    }

	  
	  
	  
	  
?>

                         </select>
                                                   <h6>(Optional)</h6>

                                    </div>
                   
                                                                        <!-- Loc s-->
              
              
                <div class="cell reset-padding">

    <input type="submit" value="Ok"  class="ui-button ui-button-big js-submit"  name="post_btn_search">
            
<!--            	<button type="submit"  value="Ok"  class="ui-button ui-button-big js-submit" id="btn_search" name="btn_search">                    <img src="images/Search.png" alt="Go Search"  width="50" height="50" > Ok  </button>-->
                            

               
<!--             -->

            </div>
            
        </div>
        
        
        <div id="message-seach"></div>
</form>






      
      
      
      
      
      
      
      
      
      
      <?php

   //start code 
   
// include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);

// this is if post
 if($_POST['post_btn_search'] ) {

 if(($_POST['CaSear_cat'] =="") And  ($_POST['namesearchjquery'] =="") And  ($_POST['LoCSear_LoC'] =="")){
echo "Please enter what are you looking for...!";	 
	 exit;}
///////////////////1
 if(($_POST['CaSear_cat'] =="") And  ($_POST['namesearchjquery'] !="") And  ($_POST['LoCSear_LoC'] =="")){

   $page = intval($_GET['page']);
   $num_page = 10;
   
   
   if(!$page){
	   $page = 0;
	   
	   
   }



 $searchword = trim(addslashes(strip_tags(nl2br($_POST['namesearchjquery']))));	   
    $ar = mysql_query("SELECT * FROM items_table WHERE Name LIKE'%".$searchword."%' OR Id LIKE'%".$searchword."%'  ORDER BY Id DESC LIMIT $page,$num_page");
    $numar= mysql_num_rows($ar);
	 echo"<pre>Results Found: ( $numar ) for the word ( $searchword )  </pre>";  
 
 
 
 
   }
   
   //////////////////////////2
   
    if(($_POST['CaSear_cat'] =="") And  ($_POST['namesearchjquery'] !="") And  ($_POST['LoCSear_LoC'] !="")){

   $page = intval($_GET['page']);
   $num_page = 10;
   
   
   if(!$page){
	   $page = 0;
	   
	   
   }

 $searchCouLoc =trim(addslashes(strip_tags(nl2br($_POST['LoCSear_LoC']))));

 $searchword = $_POST['namesearchjquery'];	   
    $ar = mysql_query("SELECT * FROM items_table WHERE Name LIKE'%".$searchword."%' AND Country LIKE'%".$searchCouLoc."%' OR  Title LIKE'%".$searchword."%' AND Country LIKE'%".$searchCouLoc."%' ORDER BY Id DESC LIMIT $page,$num_page");
    $numar= mysql_num_rows($ar);
	 echo"<pre>Results Found: ( $numar ) for the word ( $searchword ) and Country the ( $searchCouLoc )  </pre>";  
 
 
 
 
   }
   

   ////////////////////21
   
   ////////////////////22
       if(($_POST['CaSear_cat'] =="") And  ($_POST['namesearchjquery'] =="") And  ($_POST['LoCSear_LoC'] !="")){

   $page = intval($_GET['page']);
   $num_page = 10;
   
   
   if(!$page){
	   $page = 0;
	   
	   
   }

 $searchCouLoc =trim(addslashes(strip_tags(nl2br($_POST['LoCSear_LoC']))));

 $searchword = $_POST['namesearchjquery'];	   
    $ar = mysql_query("SELECT * FROM items_table WHERE Country LIKE'%".$searchCouLoc."%' OR  loc_detail	 LIKE'%".$searchCouLoc."%' ORDER BY Id DESC LIMIT $page,$num_page");
    $numar= mysql_num_rows($ar);
	 echo"<pre>Results Found: ( $numar ) for the Place ( $searchCouLoc )  </pre>";  
 
 
 
 
   }
   

   ////////////////////22
   
      
   ////////////////////22
       if(($_POST['CaSear_cat'] !="") And  ($_POST['namesearchjquery'] =="") And  ($_POST['LoCSear_LoC'] !="")){

   $page = intval($_GET['page']);
   $num_page = 10;
   
   
   if(!$page){
	   $page = 0;
	   
	   
   }

 $searchCouLoc =trim(addslashes(strip_tags(nl2br($_POST['LoCSear_LoC']))));
$searcCat =trim(addslashes(strip_tags(nl2br($_POST['CaSear_cat']))));
// $searchword = $_POST['namesearchjquery'];	   
    $ar = mysql_query("SELECT * FROM items_table WHERE Country LIKE'%".$searchCouLoc."%' AND cat_id='$searcCat' OR loc_detail LIKE'%".$searchCouLoc."%' AND cat_id LIKE'%".$searcCat."%'  ORDER BY Id DESC LIMIT $page,$num_page");
    $numar= mysql_num_rows($ar);

  	if ($numar !=0){
	    $arcatSearch = mysql_query("SELECT * FROM cat WHERE cid LIKE'%".$searcCat."%' ");	
		$rowarcatSearch = mysql_fetch_assoc($arcatSearch);
			   $NameCatSearch = $rowarcatSearch['name_cat'];
		 echo"<div class='bodypanel_o'><pre>Results Found: ( $numar ) for category  ( $NameCatSearch ) and Place ( $searchCouLoc )   </pre></div>";  
		
	}

//	 echo"<pre>Results Found: ( $numar ) for the category and Place ( $searchCouLoc )  </pre>";  
 
 
 
 
   }
   

   ////////////////////23
   
if(($_POST['CaSear_cat'] !="") And  ($_POST['namesearchjquery'] ==""))
   {
	   
	   
	   
	   
	   
   $page = intval($_GET['page']);
   $num_page = 10;
   
   
   if(!$page){
	   $page = 0;
	   
	   
   }


    $searcCat =  trim(addslashes(strip_tags(nl2br($_POST['CaSear_cat']))));
    $ar = mysql_query("SELECT * FROM items_table WHERE cat_id LIKE'%".$searcCat."%'  ORDER BY Id DESC LIMIT $page,$num_page");
    $numar= mysql_num_rows($ar);
	
  
  	if ($numar !=0){
	    $arcatSearch = mysql_query("SELECT * FROM cat WHERE cid LIKE'%".$searcCat."%' ");	
		$rowarcatSearch = mysql_fetch_assoc($arcatSearch);
			   $NameCatSearch = $rowarcatSearch['name_cat'];
		 echo"<div class='bodypanel_o'><pre>Results Found: ( $numar ) for category  ( $NameCatSearch ) </pre></div>";  
		
	}

  
  
   }
   
   ///////////////////////////3
   
if(($_POST['CaSear_cat'] !="") And  ($_POST['namesearchjquery'] !="") And  ($_POST['LoCSear_LoC'] !=""))   {
	   
	   
	   
   $page = intval($_GET['page']);
   $num_page = 10;
   
   
   if(!$page){
	   $page = 0;
	   
	   
   }

	   
	   $searchword = trim(addslashes(strip_tags(nl2br($_POST['namesearchjquery']))));
  $searcCat = $_POST['CaSear_cat'] ;
    $ar = mysql_query("SELECT * FROM items_table WHERE Name LIKE'%".$searchword."%' AND cat_id LIKE'%".$searcCat."%'  ORDER BY Id DESC LIMIT $page,$num_page");
  $numar= mysql_num_rows($ar);

	 echo"<div class='bodypanel_o'><pre>Results Found: ( $numar ) for word  ( $searchword ) and category  ( $searcCat )  </pre></div>";  
	 
	 


}
/////////////////////......

if ($numar ==0){



		 echo"<div class='bodypanel_o'><pre>Results Found: ( $numar ) </pre></div>";  
		
	}


?>
 
	  
	  <?php
	  
	  
	  
	  

   while($rowar = mysql_fetch_assoc($ar) ){
    
	
	   $id_ar = intval($rowar['Id']);
	   	   $Name_ar = trim(addslashes(strip_tags(nl2br($rowar['Name']))));
	$pic= $rowar['pic'];
	$BuyNowPrice= $rowar['BuyNowPrice'];

$Accept_Refusecat= $rowar['Accept_Refuse'];
		
if($Accept_Refusecat == '1'){	


$query_biddetail = mysql_query("SELECT * FROM bids_table WHERE bids_auction_id ='$id_ar' ORDER BY bids_amount DESC");
   
    $rowbid = mysql_fetch_assoc($query_biddetail);
	 $numbid = mysql_num_rows($query_biddetail);
	 
	     $bidAmount = $rowbid['bids_amount'];
	     $Getbids_auction_id = $rowbid['bids_auction_id'];
  
  
  echo"

	<a href='details.php?I=$id_ar'> <img src='upload/$pic'  width='100' height='100' > $Accept_Refusecat Name: <strong>$Name_ar </strong> Price:$BuyNowPrice <p> ";

	

if($Getbids_auction_id==""){echo "There is no bidding yet";}
		 if($Getbids_auction_id!=""){		 echo "Bids amount: <strong>". $bidAmount . "  </strong> (Number of Bids: <strong>" . $numbid . ")</strong> ";}
		 


echo "</p></a><hr>";
	
}
  
   }
	
	?>
	
    

<?php

 


?>


    
      <?php  



 ?>
    
  </p>  
	
     

		
	   
	<?php
	// }

	
	
   

}////if post

               
	  
	  
			
			//////////////.....
 
 
 


?>


      
</body></html>
 <p>&nbsp;</p>
