<?php 

$dbhost = 'localhost';
$user = 'root';
$pass = '';

$link = mysql_connect($dbhost, $user, $pass) or die('Could not connect');

mysql_select_db('imdb',$link) or die(mysql_error());
mysql_query('set character set greek',$link);
mysql_query("SET NAMES 'greek'",$link);
?> 
