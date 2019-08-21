<!DOCTYPE html>
<?php require_once("misc/language.php"); ?>
<?php require_once("misc/config.php"); ?>
<?php require_once("blog/view.php"); ?>
<HTML lang="<?= $locale["language-code"] ?>">
	
	<HEAD>
		
		<META charset="UTF-8" />
		<META name="author" content="" />
		<META name="description" content="<?= $locale["brand-description-short"] ?>" />
		<META name="viewport" content="width=device-width, initial-scale=1.0" />
		<TITLE><?= $locale["brand-name"] ?> &mdash; <?= $locale["page-index"] ?></TITLE>
		<LINK rel="stylesheet" type="text/css" media="all" href="style.css" />
		<SCRIPT type="text/javascript" src="scripts/main.js"></SCRIPT>
		
	</HEAD>
	
	<BODY>
		
		<DIV id="banner">
			<A href=".">
				<IMG src="media/logo/logo-optimized.png" alt="<?= $locale["brand-name"] ?>" />
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
			
			<DIV id="postcontainer">
			<?php

			$all_posts = array_reverse( list_all_posts()[ "id" ] );
	  
	  		if (sizeof($all_posts) > 6)
				$all_posts = array_slice($all_posts, 0, $max_posts_count_in_index);

			foreach ($all_posts as $post_id):

				$post_information = get_post_by_id($post_id);
	  			
	  			# Cut first X characters.
				$contents = substr($post_information[ "contents" ], 0, $index_max_post_content_length);
	  
				?>

				<DIV class="post">
					<H2 class="titlebar">
						<A href="view_post.php?id=<?= $post_id ?>"><?= $post_information[ "metadata" ][ "title" ] ?></A>
					</H2>
					<P class="titlebar"><?= $post_information[ "metadata" ][ "date" ] ?></P>
					<HR />
					<DIV class="content"><?= $contents ?></DIV>
					<A href="view_post.php?id=<?= $post_id ?>" class="readmore"><?= $locale["blog-read-more"] ?></A>
				</DIV>

				<?php

			endforeach;

			?>
			</DIV>

			<DIV id="rightpanel">
				
				<H4><?= $locale[ "user-panel-name" ] ?></H4>
				<HR />
				<P>User accounts are scheduled for development.</P>
				<BR />
				
				<H4><?= $locale[ "playback-history-name" ] ?></H4>
				<HR />
				<P>Playback history is scheduled for development.</P>
				
				<HR />
				
				<P id="footer"><?= $copyright ?> <BR /> <A href="<?= $source_code_url ?>"><?= $locale[ "source-code" ] ?></A></P>
				
				
			</DIV>
			
		</DIV>

		<DIV id="playercontainer">
			<?php foreach ($icecast_streams as $id => $stream): ?>
			<DIV class="switchstream" id="streamswitcher-<?= $id ?>" style="left: <?= ($id * 125) + 10 ?>px;"> <?= $id ?> - <?= $stream[ "info" ] ?> </DIV>
			<?php endforeach; ?>
			
			<DIV id="hideplayer"><?= $locale[ "player-hide" ] ?></DIV>
			
			<?php foreach ($icecast_streams as $id => $stream): ?>
			<DIV class="player" id="stream-<?= $id ?>">
				<IMG src="media/albums/default-album-cover.jpg" alt="<?= $locale[ "player-cover-art-image-alt" ] ?>" id="coverart" /> 
				<AUDIO controls volume="40" preload="none">
					<SOURCE src="<?= $stream["url"] ?>" type="<?= $stream["type"] ?>" codecs="opus" />
					<P><?= $locale["player-html5-no-support"] ?> <?= $stream["playlist_dl"] ?></P>
				</AUDIO>
			</DIV>
			<?php endforeach; ?>
			
			<DIV id="playbackinformation">
				<P><?= $locale[ "song-loading" ] ?></P>
			</DIV>
			
			<NOSCRIPT><P><?= $locale[ "song-noscript_song_information" ] ?></P></NOSCRIPT>
		</DIV>
		
		<DIV id="showplayer"><?= $locale[ "player-show" ] ?></DIV>
		
	</BODY>
	
</HTML>
