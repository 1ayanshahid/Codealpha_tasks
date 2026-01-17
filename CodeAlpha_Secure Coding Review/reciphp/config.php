<?php
$host = "localhost"; //database location
$user = "reciphp_demo"; //database username
$pass = "R-^RdTUabx3v"; //database password
$db_name = "reciphp_demo"; //database name

//database connection
$link = mysql_connect($host, $user, $pass);
mysql_select_db($db_name);

//sets encoding to utf8
mysql_query("SET NAMES utf8");
?>