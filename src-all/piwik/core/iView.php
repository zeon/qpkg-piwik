<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: iView.php 2967 2010-08-20 15:12:43Z vipsoft $
 * 
 * @category Piwik
 * @package Piwik
 */

/**
 * @package Piwik
 */
interface Piwik_iView
{
	/**
	 * Outputs the data.
	 * @return mixed (image, array, html...)
	 */
	function render();
}
