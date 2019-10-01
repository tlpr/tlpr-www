<?php

// Requires void, returns array of strings.
function list_directory ()
{
	$locales_dir = realpath( dirname(__FILE__) ) . DIRECTORY_SEPARATOR. 'locales';
	$directory_listing =  array_diff( scandir($locales_dir), array('.', '..') );
	return $directory_listing;
}

// Requires a string with file name without extension,
// returns boolean if the language file exist.
function lang_exists ( $language_code )
{

	$directory_listing = list_directory ();
	foreach ( $directory_listing as $language_file )
	{
	
		if ( strtolower($language_code) == substr( $language_file, 0, -4 ) )
			return true;
	
	}
	
	return false;

}

// Requires a string with file name without extension,
// returns an array with localization.
function get_localization ( $language_code )
{

	$locales_dir = realpath( dirname(__FILE__) ) . DIRECTORY_SEPARATOR . 'locales' . DIRECTORY_SEPARATOR;
	require_once ( $locales_dir . strtolower($language_code) . '.php' );
	return lang_get();

}
