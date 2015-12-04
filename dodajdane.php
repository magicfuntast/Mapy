<?php

$host="localhost";
$user="root";  
$pass="";  
$baza="markery";  
  
mysql_connect ($host, $user, $pass) or   
    die ("Nie nawiązano połączenie z bazą MySQL");  
mysql_select_db ($baza) or   
    die ("Nie nawiązano połączenia z bazą serwisu.");  
      
mysql_query("SET NAMES 'UTF8';");  

$nazwa	= mysql_real_escape_string(strip_tags($_POST['nazwa']));
$opis	= mysql_real_escape_string(strip_tags($_POST['opis']));
$ikona	= mysql_real_escape_string(strip_tags($_POST['ikona']));
$lat	= $_POST['lat'];
$lng	= $_POST['lng'];
$ip 	= $_SERVER['REMOTE_ADDR'];

if($nazwa && $opis && $ikona && $lat && $lng)
{
	$query = sprintf('INSERT INTO poznajgooglemaps_073 (id,nazwa,opis,ikona,lat,lng,data,ip) VALUES ("","%s","%s","%s",%f,%f,now(),"%s")',$nazwa,$opis,$ikona,$lat,$lng,$ip);
	mysql_query($query);
	header("Location: http://localhost/Bandi/pokazmarker.html?dodano=1");
}
else
{
	header("Location: http://localhost/Bandi/pokazmarker.html?dodano=0");
}
?>