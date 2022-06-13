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

mysql_select_db($database_connection, $connection);
$query_setting = "SELECT * FROM setting ORDER BY id_site DESC";
$setting = mysql_query($query_setting, $connection) or die(mysql_error());
$row_setting = mysql_fetch_assoc($setting);
$totalRows_setting = mysql_num_rows($setting);

/*session_start();*/

//include("connection.php");



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    
    
<head>
<!--    <meta charset= "windows-1256"> -->
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title><?php echo $row_setting['site_name']; ?></title>
	<meta name="keywords" content="<?php echo $row_setting['site_keyword']; ?>" />
	<meta name="description" content="<?php echo $row_setting['site_dies']; ?>" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<link href="o_a_c_style.css" rel="stylesheet" type="text/css"> 

    <link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />




	<!-- Modernizr -->
  	<script src="slider/modernizr.js"></script>

	<!-- HTML 5 shim for IE backwards compatibility -->
		<!-- [if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
		</script>
		<![endif]-->
	<!-- 
	Credits
	Equal Height Columns http://www.hongkiat.com/blog/css-equal-height/ -->
    
    
    
    
    
    
    
    
    
    
    <!-- 
    <script type="text/javascript" language="javascript" src="omarcount/omarcountjquery.js"></script>
	    <script type="text/javascript" language="javascript" src="omarcount/jfuncs.js" src="stylesheet"></script>
    
    inshallah countdown -->
    
    
        <!-- inshallah countdown -->
    
    
    
    
            <!-- 
    
    search with out refresh
    
    
    
	<style type="text/css">
	#age{
		display: none;
		line-height:0px;
		font-size: 20px;	
		
	}
	

	
    </style>
    <script type="text/javascript" src="jquery.js"></script>
    


<script type="text/javascript">

	function get() {
		
		$('#agesearchjquery').hide();
		$.post('jqsearch.php', { name: formsearchjquery.namesearchjquery.value },
		  function(output) {
			  $('#agesearchjquery').html(output).fadeIn(1000);
			
			}); 
		
	}


</script>
    
    
    
    
    
     -->
    
    
    
    
    
    
    
    
    
    
</head>
    
<?php
// show

mysql_free_result($setting);
?>
<?php //echo $row_setting['site_closed_msg']; ?>
<?php if ($row_setting['site_statu']=="closed"){die('<h1>'.$row_setting['site_closed_msg'].'</h1>');  } ?>
