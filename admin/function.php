<?php


function db_escape($string) {
	global $connection;
	if(!$connection) { return null; }
	return mysqli_real_escape_string($connection, $string);
}

?>