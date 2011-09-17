<?php

/* Basic example for pettakam library.

!!! NOTE : For this example to work, the directory /examples/cache should have write permission !!!

*/


include "../pettakam.php";			// load pettakam library

$config = array(
		'repo'	=>	'cache',
		);

include 'header.php';

echo '<h3>Basic Example</h3>';

$pet = new Pettakam($config);			// config

if(($cached=$pet->get("msg"))===false)		// check whether cache is available for the variable 'msg'
{
	$cached="hello world";			// if not able in cache (expired or not set), create it (in real scenario, a large db query)
	$pet->store("msg",$cached,10);		// and store it in cache with an expiration time (in this case 10 secs, for testing)
	echo 'cache set!<br>';
}else
	echo 'FROM CACHE! <br> Cached is ';	// for testing

echo "'$cached'";				// process the cached variable or NEW one whichever applicable at this stage

?><br><br>
Refresh to check cache
