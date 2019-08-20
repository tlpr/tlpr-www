<?php
/*
 * The Las Pegasus Radio
 * This code is licensed under AGPL-3.0-only
 */

# If the file is being executed directly instead of being included.
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) )
{

	echo "<b>406: Not acceptable</b>";
	http_response_code(406);
	header("Refresh: 5; url=/"); # Redirects to root after 5 seconds.

}

else
{

	require_once("misc/config.php");

	#
	#	When user accounts are done, user may be able to choose	
	#   website language in the settings. The language code will be stored
	#	in session cookie $_SESSION["LANGUAGE"]
	#

	if (!isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
		
		$user_language = $default_language;
	
	else
	{
	
		$accept_language_http_header = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
		$user_language = substr($accept_language_http_header, 0, 2);

	}
	
	$locale_directory_contents = scandir("misc/locale");
	$available_languages = array_diff($locale_directory_contents, array(".", ".."));
	
	if ( in_array("$user_language.php", $available_languages) )
		
		require_once("misc/locale/$user_language.php");

	else
		
		require_once("misc/locale/$default_language.php");
	
}
