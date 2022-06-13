<?php //header("Content-Type:  application/pdf"); ?>
<?php

//$F = 'omarAhmedAliFinalProject.pdf';
$F = 'OmarAhmedFinal_project';
$o = '';

$oa = "<img src=\"images/omar_auction_logo.png\">";
$ob = " &nbsp;<a href=\"about_online_auction.php\" style=\"text-shadow:1px 1px 0 #FFF;\">&copy; Omar Ahmed Ali</a>";
$o .= "<h1 style=\"background:#0098db; text-shadow:1px 1px 0 #444; color:#d9c36d; \">".$oa."This is only for learning purpose".$ob."</h1>";

$RBIZDNIELMA = "<div title=\"".strip_tags(nl2br($o))."\">";
$RBIZDNIELMA = $o;

$RBIZDNIELMA .= '<iframe src="'.$F.'" title="'.strip_tags(nl2br($o)).'"


    style="border: 0; background:#0064ad; width:100%; height:100%;"></iframe>
';
$RBIZDNIELMA .= "<div>";
die($RBIZDNIELMA);

?>