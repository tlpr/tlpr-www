<?php
/*
 * The Las Pegasus Radio
 * This code is licensed under AGPL-3.0-only
 */

# Debugging
ini_set("display_errors", true);
ini_set("error_reporting", E_ALL);

# Fallback language
$default_language = "pl";

# Switch to HTTPS automatically if Upgrade-Insecure-Requests header is enabled.
$upgrade_https = false;

$icecast_streams = array(

	array("url" => "#", "info" => "HQ", "type" => "audio/ogg", "playlist_dl" => "#"),
	array("url" => "#", "info" => "LQ", "type" => "audio/ogg", "playlist_dl" => "#"),
	array("url" => "#", "info" => "Mobile", "type" => "audio/ogg", "playlist_dl" => "#")

	# url: Direct link to the stream
	# info: information of stream shown on the list
	# type: MIME type of stream (examples: audio/ogg, audio/mpeg)
	# playlist_dl: Download link to the .m3u file (usually it's the same as url + .m3u)
	# You're allowed to add as many stream you like, but be respectful of your user and don't add more than 10.
	# Icecast stream is REQUIRED to have "title".
	# The index of the array in this list should be the same as index of the array in status-json.xsl
	
);

# status-json.xsl file url. usually http://your.icecast.server:8000/status-json.xsl
$icecast_status_json_uri = '#';

# On index page cut the post content after X characters. To view more user is
# required to visit view_post.php page
$index_max_post_content_length = 450;

# How many posts can be displayed on the index page.
$max_posts_count_in_index = 4;

# Open source
$source_code_url = "https://github.com/tlpr/tlpr-www";
$license = "GNU AGPL-3.0-only : https://www.gnu.org/licenses/agpl-3.0.en.html";

$copyright = "Copyleft (C) 2019 The Las Pegasus Radio";

$third_party = array(
	array("erusev/parsedown", "MIT License", "https://github.com/erusev/parsedown"),
	array("dalerms/Goodlight", "OFL-1.1", "https://www.dafont.com/goodlight.font")
);

# Versioning here started being used after commit 843eaff
$version = array(
	"state" => "Alpha",
	"ver_string" => "0.5",
	"ver_float" => 0.5
);
