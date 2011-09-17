<?php

/* Basic example for pettakam library.

!!! NOTE : For this example to work, the directory /examples/cache should have write permission !!!

*/


include "../pettakam.php";			// load pettakam library

$config = array(
		'repo'	=>	'cache',
		);

include 'groups_header.php';
$pet = new Pettakam($config);			// config
$pet->clear_all();

echo '<h3>Cache all cleared</h3>';
?>
<a href="groups_check.php">check cache</a>
