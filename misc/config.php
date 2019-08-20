<?php
/*
 * Codename Canterlot
 * This code is licensed under AGPL-3.0-only
 */

# Debugging
ini_set("display_errors", true);
ini_set("error_reporting", E_ALL);

# Fallback language
$default_language = "pl";

# HTML5 Player
$icecast_stream_url = "#";
$icecast_stream_type = "audio/ogg";

$icecast_stream_url_fallback = "#";
$icecast_stream_fallback_type = "audio/mpeg";

$icecast_stream_playlist_dl = "#";

# Blogging
$index_max_post_content_length = 450;

# Open source
$source_code_url = "https://github.com/noskla/project-canterlot-www";
$license = "GNU AGPL-3.0-only : https://www.gnu.org/licenses/agpl-3.0.en.html";

$copyright = "Copyright (C) 2019 github.com/noskla";

$third_party = array(
	array("erusev/parsedown", "MIT License", "https://github.com/erusev/parsedown"),
	array("dalerms/Goodlight", "OFL-1.1", "https://www.dafont.com/goodlight.font")
);

$version = array(
	"state" => "Alpha",
	"ver_string" => "1.0",
	"ver_float" => 1.0
);
