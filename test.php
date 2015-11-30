<?php
include('settings_t.php');

$indirizzo ="https://docs.google.com/spreadsheets/d/1KPGAvaSToouxGhy3Av1E6XUCvOJL43rLcLhXCy5zjX4/pub?gid=1033778007&single=true&output=csv";

$inizio=1;
$homepage ="";
//  echo $url;
$csv1 = array_map('str_getcsv', file($indirizzo));
//var_dump($csv1);
	$titolo=str_replace(" ","%20",$titolo);
	$url =$csv1[0][0];

  $homepage1 = file_get_contents($url);
  $homepage1=str_replace(";",",",$homepage1);
  //echo $homepage1;
  $file = 'eventi.csv';

// Write the contents back to the file
  file_put_contents($file, $homepage1);
	$inizio=1;
	$homepage ="";
  $comune="Lecce";
  $urlgd  ="https://spreadsheets.google.com/tq?tqx=out:csv&tq=SELECT%20%2A%20WHERE%20L%20LIKE%20%27%25";
  $urlgd .=$comune;
  $urlgd .="%25%27&key=1KPGAvaSToouxGhy3Av1E6XUCvOJL43rLcLhXCy5zjX4&gid=1044676138";
//echo $urlgd;
	$csv = array_map('str_getcsv',file($urlgd));
//var_dump($csv[1][0]);
  $count = 0;
	foreach($csv as $data=>$csv1){
		$count = $count+1;
	}
  //echo $count;
//  $count=3;
	for ($i=$inizio;$i<$count;$i++){

		$homepage .="\n";
		$homepage .="Comune: ".$csv[$i][11]."(".$csv[$i][13].")";
		$homepage .="Nome: ".$csv[$i][0]."\n";
		$homepage .="Tipologia: ".$csv[$i][1]."\n";
		$homepage .="Tel: ".$csv[$i][2]."\n";
		$homepage .="Email: ".$csv[$i][3]."\n";
		$homepage .="Web: ".$csv[$i][4]."\n";
		$homepage .="Ticket: ".$csv[$i][7]."\n";
		$homepage .="Descrizione: ".$csv[$i][9]."\n";
		$homepage .="Inizio: ".$csv[$i][14]."\n";
		$homepage .="Fine: ".$csv[$i][15]."\n";
		$homepage .="Foto: ".$csv[$i][16]."\n";
	  $homepage .="____________\n";

}
echo $homepage;


?>
