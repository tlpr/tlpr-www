<?php
/*
 * Codename Canterlot
 * This code is licensed under AGPL-3.0-only
 */

require_once("blog/markdown.php");

function list_all_posts ($with_metadata=false)
{

	$posts_directory_listing = scandir("blog/posts/");
	$all_post_directories = array_diff($posts_directory_listing, array(".", ".."));
	
	$posts = array();
	
	if ($with_metadata)
	{
		foreach ($all_post_directories as $directory)
		{
		
			$post_metadata_file = file_get_contents("blog/posts/$directory/metadata.json", true);
			$post_metadata = json_decode($post_metadata_file, true);
			
			$posts[ "id" ][ $directory ] = $post_metadata;
		
		}
	}
	
	else
		$posts[ "id" ] = $all_post_directories;
	
	
	$posts[ "count" ] = sizeof($all_post_directories);
	
	return $posts;

}


function get_post_by_id ($id)
{

	$all_posts = list_all_posts($with_metadata=true);
	$post_metadata = $all_posts[ "id" ][ $id ];
	
	$post_contents_in_markdown = file_get_contents("blog/posts/$id/contents.md", true);
	$post_contents = md_to_html($post_contents_in_markdown);
	
	return array(
		"metadata" => $post_metadata,
		"contents" => $post_contents
	);

}
