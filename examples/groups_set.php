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


$pet->store("msg1","i am available in cache for 4 secs",4,"jungle");
$pet->store("msg2","i am available in cache for 10 secs",10,"jungle");
$pet->store("msg3","i am available in cache for 30 secs",30,"jungle");
$pet->store("msg4","i am available in cache for 3 mins",3*60,"jungle");

$pet->store("bird","I am not grouped. Cached for 20 sec",20);
$pet->store("tiger","I am not grouped. Cached for 1 min",60);


?>

<br><br>
Cache set! pls check cache

