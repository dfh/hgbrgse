<?php

if (! function_exists("curl_init")) {
	die( "cURL required" );
}

/**
 * returns recent posts from my pinboard account.
 *
 *	array(
 *		<uri> => array(
 *			'title' => <title>,
 *			'description' => <description>,
 *		)
 *	)
 */
function pinboard_get_recent($limit = 15) {
	$url = "http://feeds.pinboard.in/rss/secret:7211c054947bf77d4e50/u:dfh/";

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$res = curl_exec($ch);
	curl_close($ch);

	if (! $res) {
		return array();
	}

	$xml = @ simplexml_load_string($res);
	if (!$xml) {
		return array();
	}

	$bookmarks = array();
	foreach ($xml->item as $item) {
		$bookmarks[(string) $item->link] = array(
			'title' => (string) $item->title,
			'description' => (string) $item->description,
		);
	}

	return $bookmarks;
}
