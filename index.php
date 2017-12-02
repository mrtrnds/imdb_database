<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16" />
<title>Index</title>
<style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
	  #map-canvas { height: 100%; width:70%; float:left; margin-right:50px;}

    </style>
<link href="style.css" rel="stylesheet" type="text/css" />
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7tT63Q1D-lXFXb2sQe0I1gGTxJMZKJkk"type="text/javascript"></script>
<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>  -->

    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(40,-73),
          zoom: 3
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
      	setMarkers(map, locations);
	  }
	  </script>
<?php
    include 'Connect.php';
	
if (isset($_POST)){
    //SQL query
	if(isset($_POST["film"])){
		$sel1="1";
		}
	else $sel1="0";
	if(isset($_POST["actor"])){
		$sel2="1";
		}
	else $sel2="0";
	if(isset($_POST["director"])){
		$sel3="1";
		}
	else $sel3="0";
	if(isset($_POST["gerne"])){
		$sel4="1";
		}
	else $sel4="0";
	switch ($sel1 . $sel2 . $sel3. $sel4)
{
case "0000":
  $query = "SELECT f.name,a.lang,a.long,fid FROM film f,f_location a where fid=lfid;";
  break;
case "0001":
  $query = "SELECT f.name,a.lang,a.long,fid FROM gerne,film f,f_location a where fid=lfid and gfid=fid and gerne='{$_POST["gerne"]}';";
  break;
case "0010":
  $query = "SELECT f.name,a.lang,a.long,fid FROM directs,artist,film f,f_location a where fid=lfid and fid=dfid and daid=aid and surname='{$_POST["director"]}';";
  break;
case "0011":
  $query = "SELECT f.name,a.lang,a.long,fid FROM gerne,directs,artist,film f,f_location a where fid=lfid and fid=dfid and daid=aid and surname='{$_POST["director"]}'and gfid=fid and gerne='{$_POST["gerne"]}';";
  break;
case "0100":
  $query = "SELECT f.name,a.lang,a.long,fid FROM acts,artist,film f,f_location a where fid=lfid and fid=afid and aaid=aid and surname='{$_POST["actor"]}';";
  break;
case "0101":
  $query = "SELECT f.name,a.lang,a.long,fid FROM gerne,acts,artist,film f,f_location a where fid=lfid and fid=afid and aaid=aid and surname='{$_POST["actor"]}'and gfid=fid and gerne='{$_POST["gerne"]}';";
  break;
case "0110":
  $query = "select f.name,l.lang,l.long,fid from film f,artist,acts,f_location l where fid=afid and aaid=aid and fid=lfid and surname='{$_POST["actor"]}' and fid in (select fid from film,directs,artist where daid=aid and fid=dfid and surname='{$_POST["director"]}');"; 
  break;
case "0111":
  $query = "select f.name,l.lang,l.long,fid from film f,artist,acts,gerne,f_location l where fid=afid and aaid=aid and gfid=fid and fid=lfid and gerne='{$_POST["gerne"]}' and surname='{$_POST["actor"]}' and fid in (select fid from film,directs,artist where daid=aid and fid=dfid and surname='{$_POST["director"]}');"; 
  break;
case "1000":
  $query = "SELECT f.name,a.lang,a.long,fid FROM film f,f_location a where fid=lfid and f.name='{$_POST["film"]}';";
  break;
case "1001":
  $query = "SELECT f.name,a.lang,a.long,fid FROM gerne,film f,f_location a where fid=lfid and gfid=fid and f.name='{$_POST["film"]}' and gerne='{$_POST["gerne"]};";
  break;
case "1010":
  $query = "SELECT f.name,a.lang,a.long,fid FROM directs,artist,film f,f_location a where fid=lfid and fid=dfid and daid=aid and surname='{$_POST["director"]}' and f.name='{$_POST["film"]}';";
  break;
case "1011":
  $query = "SELECT f.name,a.lang,a.long,fid FROM gerne,directs,artist,film f,f_location a where fid=lfid and fid=dfid and daid=aid and surname='{$_POST["director"]}'and gfid=fid and gerne='{$_POST["gerne"]}' and f.name='{$_POST["film"]}';";
  break;
case "1100":
  $query = "SELECT f.name,a.lang,a.long,fid FROM acts,artist,film f,f_location a where fid=lfid and fid=afid and aaid=aid and surname='{$_POST["actor"]}' and f.name='{$_POST["film"]}';";
  break;
case "1101":
  $query = "SELECT f.name,a.lang,a.long,fid FROM gerne,acts,artist,film f,f_location a where fid=lfid and fid=afid and aaid=aid and surname='{$_POST["actor"]}'and gfid=fid and gerne='{$_POST["gerne"]}' and f.name='{$_POST["film"]}';";
  break;
case "1110":
  $query = "select f.name,l.lang,l.long,fid from film f,artist,acts,f_location l where fid=afid and aaid=aid and fid=lfid and f.name='{$_POST["film"]}' and surname='{$_POST["actor"]}' and fid in (select fid from film,directs,artist where daid=aid and fid=dfid and surname='{$_POST["director"]}');"; 
  break;
case "1111":
  $query = "select f.name,l.lang,l.long,fid from film f,artist,acts,gerne,f_location l where fid=afid and aaid=aid and gfid=fid and fid=lfid and gerne='{$_POST["gerne"]}' and f.name='{$_POST["film"]}' and surname='{$_POST["actor"]}' and fid in (select fid from film,directs,artist where daid=aid and fid=dfid and surname='{$_POST["director"]}');"; 
  break;  
}
}
         //execute query 
	$result = mysql_query($query);
	if (!$result) {
 		die('Could not query:' . mysql_error());
	}
	print("<script>var locations=[");
    //query database 
    while($row = mysql_fetch_array($result, MYSQL_NUM))
    { 
    //format results 
    print ("['$row[0]',$row[1],$row[2],$row[3]],");   
    }  
 	print("];</script>");
    //disconnect from database 
    mysql_close($link);
    ?>
	<script>
	function setMarkers(map, locations) {
  	var myinfowindow = new google.maps.InfoWindow();
	for (var i = 0; i < locations.length; i++) {
    var movies = locations[i];
    var myLatLng = new google.maps.LatLng(movies[1], movies[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: movies[0],
		html: '<div class="inf"><a class="inf" href="show.php?fid='+movies[3]+'">'+movies[0]+'</a></div>',
		icon: "img/cinema.png"
    });
    google.maps.event.addListener(marker, 'click', function() {
         myinfowindow.setContent(this.html); 
         myinfowindow.open(map, this);
    });
  }
}
      
    </script>

  </head>
  <body style="overflow:hidden"; onload="initialize()";>
    <div id="map-canvas" style="margin-top:-10px;"></div>
    <div class="container" style="margin-top:10px; position:absolute; left:75%;">
    <div style="position:relative; left:50px;"><a href=""><img src="img/logo.png" width="100" height="102" /></a></div>
    <form action="index.php" method="post" class="form">
    <div class="headers">Film</div>
    <div class="inp">
    <input type="checkbox" name="cfilm" onchange="toggleDisabled(this.checked,'f1')"/>
	<input type="text" name="film" id="f1" disabled="disabled"/>
	</div>
    <div class="headers">Actor</div>
    <div class="inp">
    <input type="checkbox" name="cactor" onchange="toggleDisabled(this.checked,'f2')"/>
	<input type="text" name="actor" id="f2" disabled="disabled"/>
	</div>
    <div class="headers">Director</div>
    <div class="inp">
    <input type="checkbox" name="cdirector" onchange="toggleDisabled(this.checked,'f3')"/>
	<input type="text" name="director" id="f3" disabled="disabled"/>
    </div>
    <div class="headers">Genre</div>
    <div class="inp">
    <input type="checkbox" name="cgerne" onchange="toggleDisabled(this.checked,'f4')"/>
	<select name="gerne" id="f4" disabled="disabled" >
	<?php
	include 'Connect.php';
    $query = "select distinct gerne from gerne;"; 
	$result = mysql_query($query);
	if (!$result) {
 		die('Could not query:' . mysql_error());
	}
    while($row = mysql_fetch_array($result, MYSQL_NUM))
    { 
    //format results 
    print ("<option>$row[0]</option>");   
    }
    //disconnect from database 
    mysql_close($link);
    ?>
    </select>
    </div>
    <div style="position:relative; left:25px;">
    <input class="submit" type="submit" name="submit" value="SUBMIT"  />
    </div>
    </form>
    <div>
    <a href="insert.php"><img  style=" position:relative; left:10px;"src="img/add.png" width="200" height="200" onmouseover="hover(this);" onmouseout="unhover(this);" /></a> </div></div>
    
  <script>
function toggleDisabled(_checked,id) {
    document.getElementById(id).disabled = _checked ? false : true;
}
</script>
<script>
function hover(element) {
    element.setAttribute('src', 'img/addh.png');
}
function unhover(element) {
    element.setAttribute('src', 'img/add.png');
}
</script>
  </body>
</html>