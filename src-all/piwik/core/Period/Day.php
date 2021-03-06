<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: Day.php 2967 2010-08-20 15:12:43Z vipsoft $
 * 
 * @category Piwik
 * @package Piwik
 */

/**
 * @package Piwik
 * @subpackage Piwik_Period
 */
class Piwik_Period_Day extends Piwik_Period
{
	protected $label = 'day';

	public function getPrettyString()
	{
		$out = $this->getDateStart()->toString() ;
		return $out;
	}
	
	public function getLocalizedShortString()
	{
		//"Mon 15 Aug"
		$date = $this->getDateStart();
		$template = "%shortDay% %day% %shortMonth%";
		$out = $date->getLocalized($template);
		return $out;
	}
	public function getLocalizedLongString()
	{
		//"Mon 15 Aug"
		$date = $this->getDateStart();
		$template = "%longDay% %day% %longMonth% %longYear%";
		$out = $date->getLocalized($template);
		return $out;
	}
	
	public function getNumberOfSubperiods()
	{
		return 0;
	}	
	
	public function addSubperiod( $date )
	{
		throw new Exception("Adding a subperiod is not supported for Piwik_Period_Day");
	}
	
	public function toString()
	{
		return $this->date->toString("Y-m-d");
	}
	public function __toString()
	{
		return $this->toString();
	}
}
