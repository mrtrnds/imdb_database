
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16" />

    <title>Series</title> 
     <script src="http://code.jquery.com/jquery-latest.js"></script>    

<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7tT63Q1D-lXFXb2sQe0I1gGTxJMZKJkk"type="text/javascript"></script>

<style type="text/css">
html, body { height: 100%; } 
</style>

<script type="text/javascript"> 
//<![CDATA[

     // global "map" variable
     

<?php
	if(isset($_POST['submit'])){
	include 'Connect.php';
	if($_POST["ended"]=="Yes"){$ended=1;}else{$ended=0;}
	$query="INSERT INTO film (fid,name,duration,oscar,rdate,estbudget,m_or_s,seasons,channel,ended) VALUES (NULL,'{$_POST["name"]}',NULL,NULL,'{$_POST["rdate"]}',NULL,1,'{$_POST["seasons"]}','{$_POST["channel"]}',".$ended.");
";
	$queryexe = mysql_query($query);
    if ($queryexe) { 
	mysql_query("COMMIT");
	} else { 
	alert("Δημιουργήθηκε κάποιο λάθος κατά την εισαγωγή!");
	}
	$q = "select MAX(fid) from film";
	$result = mysql_query($q);
	$id = mysql_fetch_array($result, MYSQL_NUM);
	$count=0;
	print("var id = $id[0];");
	while($_POST["gerne".$count]){
	$query="INSERT INTO `gerne` (`gfid`,`gerne`) VALUES ($id[0],'{$_POST["gerne"."$count"]}');";
	$queryexe = mysql_query($query);
    if ($queryexe) { 
	mysql_query("COMMIT");
	} else { 
	alert("Δημιουργήθηκε κάποιο λάθος κατά την εισαγωγή!");
	}
	$count++;
	}
		mysql_close($link);
	}
?>
//]]>
</script> 
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7tT63Q1D-lXFXb2sQe0I1gGTxJMZKJkk"type="text/javascript"></script>

<script type="text/javascript">
      var map = null;
      var marker = null;
function initialize() {
  // create the map
  var myOptions = {
    zoom: 2,
    center: new google.maps.LatLng(0,0),
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);

  google.maps.event.addListener(map, 'click', function(event) {
	 marker = createMarker(event.latLng, "name");
  });

} 

function createMarker(latlng, name) {
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5,
		icon: "img/cinema.png"
        });
		var lat = latlng.lat();
		var lng = latlng.lng();
		var jsvar = <?php echo json_encode($id); ?>;
		var id=jsvar;
		var data = 'id='+id+'&lat='+lat+'&lng='+lng;
		

		
   $.ajax({
     type: "POST",
	 url: 'insertlocation.php',
     data: data,
     success: function(){
		 alert('marker was added');
     },
     error: function(xhr, textStatus, error){
      alert(xhr.statusText);
      alert(textStatus);
      alert(error);
	  marker.setMap(null);	    
}
  });     
    return marker;
}


    </script>
  </head> 
<body style="overflow:hidden"  onload="initialize();">
<div style="margin:0 auto; text-align:center;">
<div><a href="index.php"><img src="img/logo.png" width="100" height="102" /></a></div>

<div class="headers">Select The Places Of Your Series</div>  
           <div id="map_canvas" style="width: 1050px; height: 400px; margin:0 auto"></div> 
    <noscript><p><b>JavaScript must be enabled in order for you to use Google Maps.</b> 
      However, it seems JavaScript is either disabled or not supported by your browser. 
      To view Google Maps, enable JavaScript by changing your browser options, and then 
      try again.</p>
    </noscript> 
    
    <div class="headers">if you finish click here: <a href="index.php"><img  style="position:relative; top:10px;" src="img/done.png" width="50" height="50" /></a></div>
</div>
  </body> 
  
</html> 
