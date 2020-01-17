<?php

	use LDA26\Dates\WorkingDays\WorkingDays_FR;	

	/*** Loads all needed tools ***/
	include_once $_SERVER["DOCUMENT_ROOT"].'/common/tools/tools.php';
	/***/

	$jour[0]['date'] = '2020-02-31';
	$jour[0]['sample_no'] = 'Extra entry at users will';
	$jour[1]['date'] = date("Y-m-d", easter_date(2020) + 86400);
	$jour[1]['dlt'] = -2;
	$jour[2]['date'] = '2019-05-01';
	$jour[2]['dlt'] = 20;
	$jour[3]['date'] = '2019-05-19';
	$jour[3]['dlt'] = -12;
	$jour[4]['date'] = '2019-07-14';
	$jour[5]['date'] = '2019-05-18';
	$jour[5]['dlt'] = 0;
	
	// $date = strtotime("now");
	// $i = 1200;
	// while($i > 0) {
		// $jour[] = array('date' => date("Y-m-d", $date + ($i * 86400)), 'dlt' => random_int(-1200, 1200));
		// $i--;
	// }

	$samedi = false;
	$message = 'Le samedi est travaillé: ';
	$message .= ($samedi) ? 'oui' : 'non';
	var_dump($message);

	$temps = microtime(true);
	$date = new WorkingDays_FR($samedi);
	var_dump($date->getAll($jour));
	$temps = "Temps exec: " . (microtime(true) - $temps);
	var_dump($temps);

	$autredate = '2020-01-10';
	$isworkable = ($date->isWorkable($autredate)) ? 'oui' : 'non';
	$message =  'Le '. $autredate . ' est travaillé: ' . $isworkable;
	var_dump($message);

?>