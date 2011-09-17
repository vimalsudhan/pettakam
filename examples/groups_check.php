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

?>

<h4>Grouped cache : jungle</h4>
<div>msg1 => <?php echo ($c=$pet->get("msg1"))===false?'not available in cache':$c?>
<div>msg2 => <?php echo ($c=$pet->get("msg2"))===false?'not available in cache':$c?>
<div>msg3 => <?php echo ($c=$pet->get("msg3"))===false?'not available in cache':$c?>
<div>msg4 => <?php echo ($c=$pet->get("msg4"))===false?'not available in cache':$c?>

<h4>Ungrouped cache</h4>
<div>bird => <?php echo ($c=$pet->get("bird"))===false?'not available in cache':$c?>
<div>tiger => <?php echo ($c=$pet->get("tiger"))===false?'not available in cache':$c?>

