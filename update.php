<?php
$indirizzo ="https://docs.google.com/spreadsheets/d/1KPGAvaSToouxGhy3Av1E6XUCvOJL43rLcLhXCy5zjX4/pub?gid=1033778007&single=true&output=csv";
$inizio=1;
$homepage ="";
//  echo $url;
$csv1 = array_map('str_getcsv', file($indirizzo));
	$url =$csv1[0][0];

  $homepage1 = file_get_contents($url);
  $homepage1=str_replace(";",",",$homepage1);
  //echo $homepage1;
  $file = 'eventi.csv';

// Write the contents back to the file
  file_put_contents($file, $homepage1);
echo "finito";
?>
