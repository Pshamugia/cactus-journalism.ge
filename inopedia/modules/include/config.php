<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'vertrigo');
define('DB_NAME', 'paata_mtavari');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query('SET CHARACTER SET utf8'); mysqli_query('SET NAMES utf8');?>
 