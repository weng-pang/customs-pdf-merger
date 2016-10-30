<?php
/**
 * index.php
 * The reception file, no application logic to be deployed here
 *
 *	@copyright Dominance of Kaugebra 2016
 *	@copyright KATS 2016
 *	@version 1.0
 *
 * 
 */

foreach (glob("Controller/*.php") as $filename)
{
	include $filename;
}

define('PROJECT_DIR', __DIR__);


$router = new Router();
$router -> start();