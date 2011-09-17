<?php
/*
Cache control example by means of grouping cache

!!! NOTE : For this example to work, the directory /examples/cache should have write permission !!!

*/

include "../pettakam.php";			// load pettakam library

$config = array(
		'repo'	=>	'cache',
		);

$pet = new Pettakam($config);			// config

include 'groups_header.php';

$pet->clear_group("jungle");

?>
Group 'jungle' cleared. please check cache
