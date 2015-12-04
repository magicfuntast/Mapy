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

$pobierz = mysql_query('SELECT nazwa,opis,lat,lng,ikona FROM poznajgooglemaps_073');

include('jsonencoder.php');
$json = new Services_JSON();

$tablica = array();

while($dane = mysql_fetch_array($pobierz))
{
	$wpis = array(
		'nazwa' => $dane['nazwa'],
		'opis' => $dane['opis'],
		'lat' => (float) $dane['lat'],
		'lng' => (float) $dane['lng'],
		'ikona' => $dane['ikona']	
	);
	array_push($tablica,$wpis);
}

$wynik = $json->encode($tablica);
print($wynik);

?>