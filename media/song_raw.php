<?php
/*
 * The Las Pegasus Radio
 * This code is licensed under AGPL-3.0-only
 */

require_once("../misc/config.php");


# Get source_id from GET header
if (isset($_GET[ "source_id" ]))
{
	if (is_numeric($_GET["source_id"]))
		$source_id = (int)$_GET[ "source_id" ];
	else
		$source_id = 0;
}
else
	$source_id = 0;


# Load file
$status_json_file = file_get_contents( $icecast_status_json_uri, true );

if (!$status_json_file)
	die("Unknown");

$status_json_arr = json_decode( $status_json_file, true );


# If only one stream is running Icecast replaces list of arrays with array of that stream.
if ( isset($status_json_arr["icestats"]["source"][$source_id]) )
	$source = $status_json_arr["icestats"]["source"][$source_id];
else
	$source = $status_json_arr["icestats"]["source"];


if ( !isset($source[ "title" ]) )
	die("Unknown");

echo $source[ "title" ];

