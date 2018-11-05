<?php

function stringFilter($str) {
	return addslashes($str);
}

function intFilter($str) {
	return strval(intval($str));
}

function floatFilter($str) {
	return strval(floatval($str));
}

function htmlFilter($str) {
	$res = htmlspecialchars($str);
	$res = str_replace(' ', '&nbsp;', $res);
	return $res;
}

?>
