<?php

require_once("misc/config.php");

$headers = getallheaders();


if ( isset( $headers["Upgrade-Insecure-Requests"] ) && ($upgrade_https) )
{

	if ( $headers["Upgrade-Insecure-Requests"] == "1" )
	{
	
		$upgraded_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		header("Location: " . $upgraded_url);
	
	}

}
