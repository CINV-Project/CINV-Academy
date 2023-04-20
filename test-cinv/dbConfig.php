<?php  
// Database configuration  
define('DB_HOST', 'cinv.mysql.database.azure.com'); 
define('DB_USERNAME', 'cinv'); 
define('DB_PASSWORD', 'Project490!@'); 
define('DB_NAME', 'testcinv'); 
  
// Create database connection  
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);  
  
// Check connection  
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error);  
}