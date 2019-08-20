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
			
			<DIV id="postcontainer">
			<?php

			$all_posts = array_reverse(list_all_posts()["id"]);

			foreach ($all_posts as $post_id):

				$post_information = get_post_by_id($post_id);
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
