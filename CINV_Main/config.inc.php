<?php

define('APP', 'Cinv');

define('DB_HOST', '');
define('DB_USER', 'cinv');
define('DB_PASS', '');
define('DB_NAME', 'testcinv');

//make a database connection
if(!$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME))
{
	die("Could not connect to database");
}