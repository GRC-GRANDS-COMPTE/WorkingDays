<?php

/********************
 *
 *	file : WorkingDays_BE.php
 *	author : La Drome laboratoire
 *	version: 1.0.1
 *	Date: 16/01/2020
 *	
 *	Classe qui étends la classe WorkingDays.php pour définir les jours fériés belges
 *
 *
 ********************/

 namespace LDA26\Dates\WorkingDays;
 class WorkingDays_BE extends WorkingDays {
	
	/*************
	 *
	 * This constants defines the number of public holiday per year.
	 * Belgium public holidays
	 *
	 *************/	
	protected CONST __NBHOLPERYEAR = 10;
	
	/*************
	 *
	 * You can modify array keys labels & error messages here below
	 *
	 *************/	
	// protected CONST __IN_DATE = 'date';
	// protected CONST __IN_DLT = 'dlt';
	// protected CONST __OUT_NEXTDAY = 'nextday';
	// protected CONST __OUT_PREVDAY = 'prevday';
	// protected CONST __OUT_ISWE = 'iswe';
	// protected CONST __OUT_ISHOL = 'ishol';
	// protected CONST __OUT_DUEDATE = 'duedate';
	// protected CONST __OUT_STARTDATE = 'startdate';
	// protected CONST __OUT_ERROR = 'error';
	// protected CONST __OUT_TIMESTP = 'timestamp';
	// protected CONST __MSG_INVALIDDATE = 'Date provided invalid';
	// protected CONST __MSG_NODLT = 'No DLT provided';
	
	/*************
	 *
	 * This function adds all the holidays of a given year to the holidays array.
	 * Belgium public holidays
	 *
	 *************/
	protected function HolidaysOfYearToArray($year = null) {

		if (is_int($year)) {
			$easterDate = easter_date($year);
			$easterDay = date('j', $easterDate);
			$easterMonth = date('n', $easterDate);
			$easterYear = date('Y', $easterDate);

			// Jours feries fixes
			$this->publicHolidays[] = mktime(0, 0, 0, 1, 1, $year);// 1er janvier
			$this->publicHolidays[] = mktime(0, 0, 0, 5, 1, $year);// Fete du travail
			$this->publicHolidays[] = mktime(0, 0, 0, 7, 21, $year);// Fete nationale
			$this->publicHolidays[] = mktime(0, 0, 0, 8, 15, $year);// Assomption
			$this->publicHolidays[] = mktime(0, 0, 0, 11, 1, $year);// Toussaint
			$this->publicHolidays[] = mktime(0, 0, 0, 11, 11, $year);// WW 1918
			$this->publicHolidays[] = mktime(0, 0, 0, 12, 25, $year);// Noel

			// Jour feries qui dependent de paques
			$this->publicHolidays[] = mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear);// Lundi de paques
			$this->publicHolidays[] = mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear);// Ascension
			$this->publicHolidays[] = mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear); // Pentecote

			sort($this->publicHolidays);
			return true;
		}
		return false;
		
	}
	/*********************************************
	 *
	 * END OF CLASS - END OF FILE
	 *
	 *********************************************/	
 }
 
 ?>