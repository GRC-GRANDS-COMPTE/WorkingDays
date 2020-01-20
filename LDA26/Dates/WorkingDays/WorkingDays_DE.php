<?php

/********************
 *
 *	file : WorkingDays_DE.php
 *	author : La Drome laboratoire
 *	version: 1.0.0
 *	Date: 20/01/2020
 *	
 *	This class extends WorkingDays.php to define German public holidays
 *
 *
 ********************/

 namespace LDA26\Dates\WorkingDays;
 class WorkingDays_DE extends WorkingDays {
	
	/*************
	 *
	 * This constants defines the number of public holiday per year.
	 * Swiss public holidays
	 *
	 *************/	
	protected CONST __NBHOLPERYEAR = 9;
	
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
	 * Swiss public holidays
	 *
	 *************/
	protected function HolidaysOfYearToArray($year = null) {

		if (is_int($year)) {
			$easterDate = easter_date($year);
			$easterDay = date('j', $easterDate);
			$easterMonth = date('n', $easterDate);
			$easterYear = date('Y', $easterDate);

			// Jours feries fixes
			$this->publicHolidays[] = mktime(0, 0, 0, 1, 1, $year);// January 1st
			$this->publicHolidays[] = mktime(0, 0, 0, 5, 1, $year);// Workers day
			$this->publicHolidays[] = mktime(0, 0, 0, 10, 3, $year);// Germany's unity day
			$this->publicHolidays[] = mktime(0, 0, 0, 12, 25, $year);// Christmas
			$this->publicHolidays[] = mktime(0, 0, 0, 12, 26, $year);// Christmas' next day

			// Jour feries qui dependent de paques
			$this->publicHolidays[] = mktime(0, 0, 0, $easterMonth, $easterDay - 2, $easterYear);// Holy Friday
			$this->publicHolidays[] = mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear);// Easter Monday
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