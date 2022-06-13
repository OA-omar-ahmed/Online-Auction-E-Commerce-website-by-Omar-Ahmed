
<?php // require_once('../Connections/connection.php'); ?>





<html>
<head> </head>

<!-- <body> -->

<body bgcolor=white> 
 <meta http-equiv="refresh" content="1" >

<?php





?>
	

<?php




//  include("../admin/include/config.php");
$host =  "localhost";
$user =  "omar";
$pass =  "12345";
$db =  "A_MSHROA_A";

mysql_connect($host,$user,$pass);
mysql_select_db($db);


    $gidId = intval($_GET['Id']);
    $se = mysql_query("select * from items_table where Id='$gidId'"); 
    $num = mysql_num_rows($se);
    $row = mysql_fetch_assoc($se);
    $name = $row['Name'];
	$au_expired_date = $row['expired_date'];
  $Id = $row['Id'];

// $ex_date_inshallah = $row_show['expired_date'];


//$future =  172800;

$future =  strtotime( $au_expired_date );

$current = time();

$difference = $future - $current;
// $monthes =     floor($difference / 1036800);
$minutes =     floor($difference / 60);
$hours =       floor($difference / 3600);
$days =     floor($difference / 86400);
$r_minutes =     floor( ( $difference - ( $hours  * 3600 )) / 60 );
$r_seconds =     floor(  $difference - ( $minutes  * 60 ));


    
echo '<p>Remaining Days: <strong>'.$days .'<br></strong><p>';
//echo '<h4>Remaining monthes: <strong>'.$monthes .'<br></strong>'."<h4>";
echo  '<em>Time: '.$hours.' : '  .$r_minutes.' : '  .$r_seconds.' </em>';?></body>
<html>