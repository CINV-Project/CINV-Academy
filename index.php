<?php
ob_clean();
session_start();
include_once(__DIR__ . '/vendor/autoload.php');
include_once "lib/utils.php";
db()->mapper('Cinv\Entity\User')->migrate();
db()->mapper('Cinv\Entity\Instructor')->migrate();
include_once "router.php";
