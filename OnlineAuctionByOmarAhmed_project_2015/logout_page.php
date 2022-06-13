<?php
// logout_page.php
session_start();
session_destroy();
header("Location:http://localhost/onlineauctionweb/login_page.php");





?>






