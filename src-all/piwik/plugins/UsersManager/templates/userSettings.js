/**
 * Piwik - Web Analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: userSettings.js 2967 2010-08-20 15:12:43Z vipsoft $
 */

function getUserSettingsAJAX()
{
	var params;
	var defaultDate = $('input[name=defaultDate]:checked').val();
	if(defaultDate == 'today' || defaultDate == 'yesterday') {
		params = 'period=day&date='+defaultDate;
	} else {
		params = 'date=today&period='+defaultDate;
	}

	var ajaxRequest = piwikHelper.getStandardAjaxConf('ajaxLoadingUserSettings', 'ajaxErrorUserSettings', params);
	var alias = $('#alias').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var passwordBis = $('#passwordBis').val();
	var defaultReport = $('input[name=defaultReport]:checked').val();
	if(defaultReport == 1) {
		defaultReport = $('#defaultReportWebsite option:selected').val();
	}
	var request = '';
	request += 'module=UsersManager';
	request += '&action=recordUserSettings';
	request += '&format=json';
	request += '&alias='+alias;
	request += '&email='+email;
	request += '&password='+password;
	request += '&passwordBis='+passwordBis;
	request += '&defaultReport='+defaultReport;
	request += '&defaultDate='+defaultDate;
 	request += '&token_auth=' + piwik.token_auth;

	ajaxRequest.data = request;
	return ajaxRequest;
}
function getAnonymousUserSettingsAJAX()
{
	var ajaxRequest = piwikHelper.getStandardAjaxConf('ajaxLoadingAnonymousUserSettings', 'ajaxErrorAnonymousUserSettings');
	var anonymousDefaultReport = $('input[name=anonymousDefaultReport]:checked').val();
	if(anonymousDefaultReport == 1) {
		anonymousDefaultReport = $('#anonymousDefaultReportWebsite option:selected').val();
	}
	var anonymousDefaultDate = $('input[name=anonymousDefaultDate]:checked').val();
	var request = '';
	request += 'module=UsersManager';
	request += '&action=recordAnonymousUserSettings';
	request += '&format=json';
	request += '&anonymousDefaultReport='+anonymousDefaultReport;
	request += '&anonymousDefaultDate='+anonymousDefaultDate;
 	request += '&token_auth=' + piwik.token_auth;
	ajaxRequest.data = request;
	return ajaxRequest;
}

$(document).ready( function() {
	$('#userSettingsSubmit').click( function() {
		$.ajax( getUserSettingsAJAX() );
	});
	$('#userSettingsTable input').keypress( function(e) {
		var key=e.keyCode || e.which;
		if (key==13) {
		$('#userSettingsSubmit').click();
	}});
	
	$('#anonymousUserSettingsSubmit').click( function() {
		$.ajax( getAnonymousUserSettingsAJAX() );
	});
});

