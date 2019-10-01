<?php

// Start session and dump the logged-in session variable into local variable.
session_start ();
$logged_in = isset($_SESSION['logged-in']);

// Import required files.
require_once( 'l10n/main.php' );

// Check if user is logged in and get the language localization.
if ( $logged_in )
{
	$username = $_SESSION['username'];
	$userlang = array($_SESSION['userlang']);
}
else
{
	
	$accept_language = @$_SERVER[ 'HTTP_ACCEPT_LANGUAGE' ];
	if ( $accept_language )
	{
		$accept_language = substr( $accept_language, 0, strpos($accept_language, ';') );
		$userlang = explode( ',' , $accept_language );
	}
	else
		$userlang = array('en-US');
	
}

for ( $i = 0; $i <= (sizeof($userlang) - 1); $i++ )
{
	if ( lang_exists( $userlang[$i] ) )
	{
		$l10n = get_localization( $userlang[$i] );
		break;
	}
}

if ( !isset($l10n) )
	die( 'Death: Localization error.' );

?>

<!DOCTYPE html>
<html lang="<?= $l10n[ 'lang-code' ] ?>">
	
	<head>
		<meta charset="utf-8" />
		<title><?= $l10n[ 'station-name' ] ?> &#8212; <?= $l10n[ 'page-index-title' ] ?></title>
		<link rel="stylesheet" type="text/css" media="all" href="style.css" />
	</head>
	
	<body>
		
		<div id="header">
			<a href=".">
				<img src="media/logo_placeholder.png" alt="<?= $l10n[ 'logo-alternative' ] ?>" />
			</a>
			<div id="nav">
				<nav>
					<a href="."><?= $l10n[ 'nav-index' ] ?></a>
					<a href="radio"><?= $l10n[ 'nav-radio' ] ?></a>
					<a href="schedule"><?= $l10n[ 'nav-schedule' ] ?></a>
					<a href="irc"><?= $l10n[ 'nav-irc' ] ?></a>
					<a href="community"><?= $l10n[ 'nav-community' ] ?></a>
					<a href="contact"><?= $l10n[ 'nav-contact' ] ?></a>
				</nav>
			</div>
		</div>
		
		<div id="player_container">
			
			<div class="playing_now">
				<?= $l10n[ 'playing-now' ] ?><span id="playing-now">I don't - know</a>
			</div>
			
			<div class="listen_button">
				<a href="request/"><?= $l10n[ 'request-song' ] ?></a>
				<a href="#" id="listen-button"><?= $l10n[ 'listen-now' ] ?></a>
			</div>
			
		</div>
		
	</body>
	
</html>
