<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: Live.php 2967 2010-08-20 15:12:43Z vipsoft $
 *
 * @category Piwik_Plugins
 * @package Piwik_Live
 */

/**
 *
 * @package Piwik_Live
 */
class Piwik_Live extends Piwik_Plugin
{
	public function getInformation()
	{
		return array(
			'description' => Piwik_Translate('Live_PluginDescription'),
			'author' => 'Piwik',
			'author_homepage' => 'http://piwik.org/',
			'version' => Piwik_Version::VERSION,
		);
	}

	function getListHooksRegistered()
	{
		return array(
			'AssetManager.getJsFiles' => 'getJsFiles',
			'AssetManager.getCssFiles' => 'getCssFiles',
			'WidgetsList.add' => 'addWidget',
			'Menu.add' => 'addMenu',
		);
	}
	
	function getCssFiles( $notification )
	{
		$cssFiles = &$notification->getNotificationObject();
		
		$cssFiles[] = "plugins/Live/templates/live.css";
	}	
	
	function getJsFiles( $notification )
	{
		$jsFiles = &$notification->getNotificationObject();
		
		$jsFiles[] = "plugins/Live/templates/scripts/spy.js";
		$jsFiles[] = "plugins/Live/templates/scripts/live.js";
	}

	function addMenu()
	{
		Piwik_AddMenu('General_Visitors', 'Live_VisitorLog', array('module' => 'Live', 'action' => 'getLastVisitsDetails'));
	}

	public function addWidget() {
		Piwik_AddWidget('Live!', 'Live Visitors!', 'Live', 'widget');
	}

}
