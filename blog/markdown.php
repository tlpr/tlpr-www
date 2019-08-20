<?php
/*
 * Codename Canterlot
 * This code is licensed under AGPL-3.0-only
 */

require 'vendor/autoload.php';

function md_to_html ($markdown_code)
{

	$parsedown = new Parsedown();
	$parsedown->setMarkupEscaped(true);
	$html_code = $parsedown->text($markdown_code);
	
	return $html_code;

}
