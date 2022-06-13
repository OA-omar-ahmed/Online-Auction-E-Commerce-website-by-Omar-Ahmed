<?php include 'header.php';?>
       <?php // include 'menu.php';?>
  

           
                <p>
                    		<a rel="nofollow" href="omer.php"><img src="images/omar_auction_logo.png" width="240" height="60" /></a></p>


                
  

<?php 

$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 


?>
<?php @ session_start(); ?>

<?php // include 'header.php';?>
<?php //  include 'menu.php';?>



<?php 
// include("../admin/include/config.php");


$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);






$postname= addslashes(strip_tags($_POST['name']));
$postTitle= addslashes(strip_tags($_POST['Title']));
$postemail= addslashes(strip_tags($_POST['email']));
$postmsg= addslashes(strip_tags($_POST['msg']));

if($_POST['send']){
	if($postname == '' or $postTitle =='' or $postemail == '' or $postmsg =='')	{
	
	echo"<script>alert(\" All textboxes are required\");</script>";
	
		
	}elseif(strlen($postname) > 50){
echo"<script>alert(\"Name should be less than 50 character\");</script>";		
	}elseif(strlen($postname) < 5){
echo"<script>alert(\"Name should be more than 50 character\");</script>";		
	}elseif(strlen($postTitle) > 100){
echo"<script>alert(\"Title too long\");</script>";		
	}elseif(strlen($postmsg) > 500){
echo"<script>alert(\"Message should be less than 500 character\");</script>";		
	}elseif(strlen($postmsg) < 20){
echo"<script>alert(\"Message should be more than 20 character\");</script>";		
	}elseif(!preg_match("/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,4})/",$postemail )) {
echo"<script>alert(\"The E-mail is not correct\");</script>";		

	}elseif($_SESSION['addmsg'] > time() -180){
	echo"<script>alert(\"Not allowed to send more than one message during three minutes\");</script>";			
	}else{
	$_SESSION['addmsg'] = time();
	$ch = 0 ;
	$ch_date = 0000 ;
	
		$add = mysql_query("insert into contact_us_table values('','$postname','$postTitle','$postemail','$postmsg','$ch','$ch_date')");	
		if($add){
			echo"
<div class='head_o'><h1>Thank you</h1><h2>Message successfully sent</h2></div>
";			
			
echo'<meta http-equiv="Refresh" content="5;url=http://localhost/onlineauctionweb/index.php">';


		}
		
	}
	
}

?>



<div class="head_o">Contact with online auction </div>

<div class="bodypanel">
 <form id="form1" name="form1" method="post" action="">
 
   
<table width="100%" align="center"   bordercolor="#5f7ad5;" cellpadding="1" cellspacing="2">
       
                    
   <tr>
   <td width="36%"><blockquote>
     <blockquote>
       <blockquote>
         <h4>Title</h4>
       </blockquote>
     </blockquote>
   </blockquote></td>
   <td width="64%">
      
<select name="Title" id="Title" >
<?php // echo "<option value='$postTitle'>". $postTitle ."</option>"; ?>

<option value="<?php echo $postTitle; ?>"><?php echo $postTitle; ?></option>
<option value="Post fee ">Thanks or Suggestion</option>
<option value="Complaint">Complaint</option>
<option value="Technical problem">Technical problem</option>
<option value="Proposal for fee advertisement ">Proposal for fee advertisement </option>
<option value="=Others">Others </option>
   </select>
   

 
 
</td>
   </tr>            
      
       
               
   <tr>
   <td ><blockquote>
     <blockquote>
       <blockquote>
         <h4>Name </h4>
         <pre>&nbsp;</pre>
       </blockquote>
       </blockquote>
     </blockquote></td>
   <td >
   
   
   
      <textarea name="name" cols="50" placeholder="Your Name"><?php echo $postname ; ?></textarea>
   (optional)
   </td>
   </tr>            
           
               
   <tr>
   <td><blockquote>
     <blockquote>
       <blockquote>
         <h4>E-mail</h4>
       </blockquote>
     </blockquote>
   </blockquote></td>
<td><textarea name="email" cols="50" placeholder="Address@ DomainName.com "><?php echo $postemail; ?></textarea></td>
   </tr>            
              
  <blockquote>
    <blockquote>
      <blockquote>
        <p>
          </div>
        </p>
      </blockquote>
    </blockquote>
  </blockquote>

 
               
   <tr>
   <td><blockquote>
     <blockquote>
       <blockquote>
         <h4>Content message:</h4>
       </blockquote>
     </blockquote>
   </blockquote></td>
   <td><textarea name="msg" rows="10" cols="50" value='' placeholder="Your message" ><?php echo $postmsg; ?></textarea></td>
   </tr>            
      
      
               
   <tr>
   

   <td class="head_o" colspan="2" ><blockquote>
     <blockquote>
       <blockquote>
         <p>
           <input name="send" value="Send"  type="submit"/>
         </p>
       </blockquote>
     </blockquote>
   </blockquote></td>
   
</tr>            
               
      
               
          
   </table>
          
   



</form>
              




<?php include 'footer.php';?>


                 