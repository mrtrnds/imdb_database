<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>insertlocation</title>
</head>

<body>

<?php
	include 'Connect.php';
	$id=mysql_escape_string($_POST['id']);
	$lat=mysql_escape_string($_POST['lat']);
	$lng=mysql_escape_string($_POST['lng']);
	$query = "INSERT INTO f_location (lfid,lang,`long`) VALUES ('$id','$lat','$lng');";
	$queryexe = mysql_query($query);
    if ($queryexe) { 
	mysql_query("COMMIT");
	} else { 
	alert('Could not query:' . mysql_error());
	}
	mysql_close($link);

?>


</body>
</html>