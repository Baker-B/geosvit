<?php

require_once("ips.inc.php" );

$redirect = "
//document.body.bgcolor = '#FFFFFF';
document.write('<noindex><br><br><div align=\"center\"><table border=\"0\" width=\"32%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"450\"><img border=\"0\" src=\"http://shinyshiny.ru/images/novsite.jpg\" width=\"450\" height=\"378\"></td></tr></table><table width=\"620\" border=\"0\"><tr><td><div align=\"left\"><a href=\'\' onClick=\"this.href=\'http://google.com\'\" rel=\"nofollow\"><img border=\"0\" src=\"http://shinyshiny.ru/images/logo_2.gif\" width=\"620\" height=\"64\"></a> </div></td></tr></table><img src=\"http://shinyshiny.ru/images/img01.jpg\" alt=\"\" /></div></noindex>');
document.write('<div style="padding-top:75%">');
";

//unescape('%3C%64%69%76%20%73%74%79%6C%65%3D%22%70%61%64%64%69%6E%67%2D%74%6F%70%3A%37%35%25%22%3E')

if (preg_match("/sklad/i", $_SERVER["HTTP_REFERER"]))
{
	//Piter / sklad-shin
	$visitor = 2;
}
elseif (preg_match("/shinalt/i", $_SERVER["HTTP_REFERER"]) || preg_match("/startyre/i", $_SERVER["HTTP_REFERER"]))
{
	//Spb / startyre / shinaltd
	$visitor = 3;
}
elseif (preg_match("/nadom/i", $_SERVER["HTTP_REFERER"]))
{
	//Msk
	$visitor = 1;
}

$ip = $_GET["ip"];

if (!$ip) $ip = $_SERVER["REMOTE_ADDR"];

$ipList = new IPGeo($ip);

$region = $ipList->ip($ip);

if ($region == 1 && $visitor == 2) // Guy from spb and his region is msk
	print $redirect;
elseif ($region == 1 && $visitor == 3) // Guy from spb and his region is msk
	print str_replace("google.com", "shinynadom.ru", $redirect);
elseif ($region == 2 && $visitor == 1) // Guy from msk and his region is spb
	print $redirect;
else 
	print "";

?>