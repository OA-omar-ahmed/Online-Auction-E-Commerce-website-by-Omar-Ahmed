<nav id="main_nav">
                    
                    
                    
						<ul class="nav">

<p>
                    		<a rel="nofollow" href="omer.php"><img src="images/omar_auction_logo.png" width="240" height="60" /></a></p>





                            <li><a href="index.php">Back to the main page</a></li>
                    

                            
						
						</ul>
   
   
      
                 
                 	
            
            
			    </nav>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<?php 


$hostname_connection = "localhost";
$database_connection = "A_MSHROA_A";
$username_connection = "omar";
$password_connection = "12345";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 

?>


<?php

// include("connection.php");
$con=mysqli_connect("localhost","omar","12345","A_MSHROA_A");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:". mysqli_connect_error();
}



$Fname= addslashes(strip_tags($_POST['Fname']));
$Lname= addslashes(strip_tags($_POST['Lname']));
$username= addslashes(strip_tags($_POST['username']));
$userpass= addslashes(strip_tags($_POST['userpass']));
$md5userpass = md5($userpass);

$Email= addslashes(strip_tags($_POST['Email']));



 $PhoneNumber=$_POST["PhoneNumber"];

$Country=$_POST["CountryReg"];





if($_POST['R_submit']){
	
	$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);

$seReg =mysql_query("select * from user_information_table where username='$username' ");
$rowReg = mysql_fetch_assoc($seReg);
	$RegUsername = $rsub['username'];
	


	

	
	if($Fname == '' or $Lname =='' or $username == '' or $userpass =='' or $Email =='' or $PhoneNumber =='' or $Country =='' ){
	
	echo"<script>alert(\" All textboxes are required\");</script>";
	
	
	}elseif($RegUsername != 0 ) {
   

			   
echo"<script>alert(\" This username is exist please choose another one\");</script>";
    
	
	}elseif(!is_numeric($PhoneNumber)){
	echo"<script>alert(\"Phone number should be number \");</script>";
	
	
	

	
		}elseif(!preg_match("/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,4})/",$Email )) {
echo"<script>alert(\"The E-mail is not correct\");</script>";		

	
		}else{

$ins="insert into  user_information_table (user_stat, user_f_name , user_l_name , username , user_password , user_phone , user_email , country, reg_date ) values('0','$Fname','$Lname','$username','$md5userpass','$PhoneNumber','$Email','$Country',now())";
if(mysqli_query($con,$ins)){







		echo "<h3><p> Welcome ". $Fname ." to O_Auction </h3><h4>Your Account added successfully <br>
		Login now !
		</h4>" ;
 include 'login_page.php';

exit;}else{
    echo"fail to add".mysqli_error($con);



}
	}
		}

?>



















<!--///////////////////-->

 <form action="" method="post">

<table width ='25%' border='1' align="center" cellpadding='7'>


    <tr>
        <td colspan="2" align="center"><h4>Online Auction registeration form</h4></td>

    </tr>

          
             <tr>
             <td width="50%"><p>First Name: </p></td>
            <td width="50%"> <input type="text" name="Fname" value="<?php echo $Fname ; ?>"><br></td>
         </tr>


           <tr>
           <td width="50%"><p>Last Name: </p></td>
           <td width="50%"> <input type="text" name="Lname" value="<?php echo $Lname ; ?>"><br></td>
           </tr>

           <tr>
           <td width="50%"><p>USER Name: </p></td>
           <td width="50%"> <input type="text" name="username" value="<?php echo $username ; ?>"><br></td>
           </tr>


           <tr> <td width="50%"><p>Password: </p></td>
           <td width="50%"> <input type="password" name="userpass" value="<?php echo $userpass ; ?>"><br></td>
           </tr>
            
         <tr>  <td width="50%"><p>Phone Number: </p></td>
          <td width="50%">  <input type="text" name="PhoneNumber" value="<?php echo $PhoneNumber ; ?>"><br></td>
        </tr>


         <tr> <td width="50%"><p>E-mail: </p></td>
          <td width="50%"><input type="text" name="Email" value="<?php echo $Email ; ?>"><br></td>
          </tr>

  <tr> <td width="50%"><p>Country: </p></td>
  <td width="50%">
  

   <select  name="CountryReg" >
      <option value=""> <?php echo $Country ; ?> Select your Country  </option>
      
      
      





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

  }
?> 
       
       
   

      
      
      
        </select>
    
        
        
        
        </td>
</tr>

  <tr>
        <td colspan="2" align="center">
  <a href='ourPolicies.php'>Read our Policies</a><br>
           
      <input type="submit" name="R_submit" value="     Submit     ">
      </td>
</tr>
    </table>
    </form>



</body>
</html>


   <?php 
    include 'footer.php';?>