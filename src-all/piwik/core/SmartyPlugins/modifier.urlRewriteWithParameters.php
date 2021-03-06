<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: modifier.urlRewriteWithParameters.php 2967 2010-08-20 15:12:43Z vipsoft $
 * 
 * @category Piwik
 * @package SmartyPlugins
 */

/**
 * Rewrites the given URL and modify the given parameters.
 * @see Piwik_Url::getCurrentQueryStringWithParametersModified()
 * 
 * @return string
 */
function smarty_modifier_urlRewriteWithParameters($parameters)
{
	$parameters['updated'] = null;
	$url = Piwik_Url::getCurrentQueryStringWithParametersModified($parameters);
	return htmlspecialchars($url);
}
