<!DOCTYPE html>
<?php require_once("misc/language.php"); ?>
<?php require_once("misc/config.php"); ?>
<?php require_once("blog/view.php"); ?>
<HTML lang="<?= $locale["language-code"] ?>">
	
	<HEAD>
		
		<META charset="UTF-8" />
		<META name="author" content="" />
		<META name="description" content="<?= $locale["brand-description-short"] ?>" />
		<TITLE><?= $locale["brand-name"] ?> &mdash; <?= $locale["page-index"] ?></TITLE>
		<LINK rel="stylesheet" type="text/css" media="all" href="style.css" />
		
	</HEAD>
	
	<BODY>
		
		<DIV id="banner">
			<A href=".">
				<PICTURE>
					<SOURCE type="image/webp" srcset="media/logo/logo-optimized.webp" />
					<SOURCE type="image/png" srcset="media/logo/logo-optimized.png" />
					<IMG src="media/logo/logo-optimized.png" alt="<?= $locale["brand-name"] ?>" />
				</PICTURE>
			</A>
		</DIV>
		
		<DIV id="navigation">
			<NAV>
				<A href="index.php"><?= $locale["page-index"] ?></A>
				<A href="about.php"><?= $locale["page-about"] ?></A>
				<A href="community.php"><?= $locale["page-community"] ?></A>
				<A href="contact.php"><?= $locale["page-contact"] ?></A>
			</NAV>
		</DIV>
		
		<DIV id="panels">
			
		<?php

		$all_posts = list_all_posts();
	  
	  	foreach ($all_posts[ "id" ] as $post_id):
			
			$post_information = get_post_by_id($post_id);
			?>
			
			<DIV class="post">
				<H3><?= $post_information[ "metadata" ][ "title" ]; ?></H3>
				<H5><?= $post_information[ "metadata" ][ "date" ]; ?></H5>
				<HR />
				<P><?= $post_information[ "contents" ]; ?></P>
			</DIV>
			
			<?php
			
		endforeach;
	
		?>
			
			<DIV id="rightpanel">
			</DIV>
			
		</DIV>

		<DIV id="playercontainer">
			<DIV id="player">
				<AUDIO controls volume="40">
					<SOURCE src="<?= $icecast_stream_url ?>" type="<?= $icecast_stream_type ?>" />
					<SOURCE src="<?= $icecast_stream_url_fallback ?>" type="<?= $icecast_stream_fallback_type ?>" />
					<P><?= $locale["player-html5-no-support"] ?> <?= $icecast_stream_playlist_dl ?></P>
				</AUDIO>
			</DIV>
		</DIV>
		
	</BODY>
	
</HTML>
