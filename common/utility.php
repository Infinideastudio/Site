<?php

require_once(__DIR__ . '/database.php');
require_once(__DIR__ . '/filter.php');
require_once(__DIR__ . '/template.php');

function Post($url, $post) {
	if (is_array($post)) {
		ksort($post);
		$content = http_build_query($post);
		$content_length = strlen($content);
		$options = array(
			'http' => array(
				'method' => 'POST',
				'header' =>
				"Content-type: application/x-www-form-urlencoded\r\n" .
				"Content-length: $content_length\r\n",
				'content' => $content
			)
		);
		return file_get_contents($url,false,stream_context_create($options));
	}
}

function Base64Encode($str) {
	return str_replace('+', '_', base64_encode($str));
}

function Base64Decode($str) {
	return base64_decode(str_replace('_', '+', $str));
}

?>
