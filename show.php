<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7tT63Q1D-lXFXb2sQe0I1gGTxJMZKJkk"type="text/javascript"></script>
<script src="jquery-1.10.2.min.js"></script>
<script type='text/JavaScript' src='files/scw.js'></script>
<script language="JavaScript" src="files/gen_validatorv31.js" type="text/javascript"></script>
<style type="text/css">
    #map-canvas { height:400px; width:400px;float:left; margin-top:20px; }
	.form {
    margin:0;
}

.form li {
    list-style:none;
}

.hide {
    display:none;
}

.rating input[type="radio"] {
    position:absolute;
    filter:alpha(opacity=0);
    -moz-opacity:0;
    -khtml-opacity:0;
    opacity:0;
    cursor:pointer;
    width:17px;
}

.rating span {
    width:24px;
    height:16px;
    line-height:16px;
    padding:1px 22px 1px 0; /* 1px FireFox fix */
    background:url(img/stars.png) no-repeat -22px 0;
}

.rating input[type="radio"]:checked + span {
    background-position:-22px 0;
}

.rating input[type="radio"]:checked + span ~ span {
    background-position:0 0;
}
    </style>
<?php 

 include 'Connect.php';
 if(isset($_POST['submit'])){
	 
	 $query = "INSERT INTO `review` (`rid`,`title`,`user`,`comment`,`rate`,`reid`,`rfid`) VALUES (NULL,'{$_POST["title"]}','{$_POST["user"]}','{$_POST["comment"]}','{$_POST["rating"]}',NULL,'{$_GET["fid"]}');";
	$queryexe = mysql_query($query);
    if ($queryexe) { 
	mysql_query("COMMIT");
	 echo "<meta http-equiv='refresh' content='0'>";
	} else { 
	alert('Could not query:' . mysql_error());
	}
	 }
 $query="select fid,CAST(m_or_s as unsigned) from film where fid='{$_GET["fid"]}'";
 
 $result = mysql_query($query);
	if (!$result) {
 		die('Could not query:' . mysql_error());
	}
 $row = mysql_fetch_array($result, MYSQL_NUM);
 	$m_s=$row[1];
	if($row[1]==1){
			$query="select fid,name,seasons,channel,rdate,CAST(ended as unsigned) from film where fid='{$_GET["fid"]}';";
 		$result = mysql_query($query);
			if (!$result) {
 				die('Could not query:' . mysql_error());
		}
		$film = mysql_fetch_array($result, MYSQL_ASSOC);
		}
		else {
			
		$query="select fid,name,duration,oscar,rdate,estbudget from film where fid='{$_GET["fid"]}';";
 		$result = mysql_query($query);
			if (!$result) {
 				die('Could not query:' . mysql_error());
		}
		$film = mysql_fetch_array($result, MYSQL_ASSOC);
		}
				
		$query="select a.name,surname from film,acts,artist a where fid='{$_GET["fid"]}' and fid=afid and aaid=aid;";
 		$result = mysql_query($query);
			if (!$result) {
 				die('Could not query:' . mysql_error());
		}
		$actors= array
			(
				"name"=>array(),
				"surname"=>array()
			);
		$i=0;	
		
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			$actors["name"][$i]=$row[0];
			$actors["surname"][$i]=$row[1];
			$i++;
			}
			$actors["name"][$i]=NULL;
			$actors["surname"][$i]=NULL;
			
			
			
		$query="select gerne from gerne where gfid='{$_GET["fid"]}';";
 		$result = mysql_query($query);
			if (!$result) {
 				die('Could not query:' . mysql_error());
		}
		$gerne= array();
		$i=0;	
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			$gerne[$i]=$row[0];
			$i++;
			}
		$gerne[$i]=NULL;
		
		
		
		$query="select a.name,surname from film,directs,artist a where fid='{$_GET["fid"]}' and fid=dfid and daid=aid;";
 		$result = mysql_query($query);
			if (!$result) {
 				die('Could not query:' . mysql_error());
		}
		$directors= array
			(
				"name"=>array(),
				"surname"=>array()
			);
		$i=0;	
		
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			$directors["name"][$i]=$row[0];
			$directors["surname"][$i]=$row[1];
			$i++;
			}	
			$directors["name"][$i]=NULL;
			$directors["surname"][$i]=NULL;
		
		
		
		
		
		$query="select title,user,comment,rate from review where rfid='{$_GET["fid"]}';";
 		$result = mysql_query($query);
			if (!$result) {
 				die('Could not query:' . mysql_error());
		}
		$review= array
			(
				"title"=>array(),
				"user"=>array(),
				"comment"=>array(),
				"rate"=>array()
			);
		$i=0;	
		
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			$review["title"][$i]=$row[0];
			$review["user"][$i]=$row[1];
			$review["comment"][$i]=$row[2];
			$review["rate"][$i]=$row[3];
			$i++;
			}
			$review["title"][$i]=NULL;
			$review["user"][$i]=NULL;
			$review["comment"][$i]=NULL;
			$review["rate"][$i]=NULL;
			
		$i=0;
		$nrate=0;
 		$result = mysql_query("select rate from review where rfid='{$_GET["fid"]}';");
			if (!$result) {
 				die('Could not query:' . mysql_error());
		}
		
		while($row = mysql_fetch_array($result, MYSQL_NUM)){
			$nrate=$row[0]+$nrate;
			$i=$i+1;
		};
		if ($i!=0) {
		$nrate=$nrate / $i;
		}
 		$avgrate=number_format((float)$nrate, 2, '.', '');
		
		
		
		
		$query="select l.lang,l.long from f_location l where lfid='{$_GET["fid"]}';";
		$result = mysql_query($query);
	if (!$result) {
 		die('Could not query:' . mysql_error());
	}
	
	print("<script>var locations=[");
    //query database 
    while($row = mysql_fetch_array($result, MYSQL_NUM))
    { 
    //format results 
    print ("['$row[0]',$row[1]],");   
    }  
 	print("];</script>");
    //disconnect from database 
    mysql_close($link);
	
?> 
<script type="text/javascript">
     function initialize() {
  // create the map
  var myOptions = {
    zoom: 2,
    center: new google.maps.LatLng(locations[0][0],locations[0][1]),
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map-canvas"),
                                myOptions);
								setMarkers(map,locations);
}
</script>
<script>
	function setMarkers(map, locations) {
  	var myinfowindow = new google.maps.InfoWindow();
	for (var i = 0; i < locations.length; i++) {
    var movies = locations[i];
    var myLatLng = new google.maps.LatLng(movies[0], movies[1]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: <?php print("'{$film["name"]}'"); ?>,
		html: '<div class="inf"><a class="inf" href="/show.php?fid='+<?php print("'{$film["fid"]}'"); ?>+'">'+<?php print("'{$film["name"]}'"); ?>+'</a></div>',
		icon: "img/cinema.png"
    });
    google.maps.event.addListener(marker, 'click', function() {
         myinfowindow.setContent(this.html); 
         myinfowindow.open(map, this);
    });
  }
}
      
    </script>
<?php print("<title>".$film["name"]."</title>"); ?>

</head>
<body onload="initialize()">

<div style="margin:0 auto; margin-left:15%; ">
    <div style=" float:left; margin-left:7%;margin-top:30px;" ><a href="index.php"><img src="img/logo.png" width="100" height="102" /></a></div>
   	<div class="headers" style=";float:left; margin-top:60px;"><?php print($film["name"]);?></div>
    <br />
    <div style="overflow: hidden; width:100%;">
    <div class="semi" style="margin-top:30px; margin-left:10%; float:left;">
    <div class="headers" style="margin-top:-5px; margin-left:15%; float:left;">INFO</div>

    <table width="300" border="0">
  <tr>
    <th scope="row" valign="top" align="left">Rate:</th>
    <td><?php print($avgrate);?></td>
  </tr>
  <tr>
    <th scope="row" valign="top"  align="left">Actors:</th>
    <td><?php $i=0; while($actors["name"][$i]){print($actors["name"][$i]."&nbsp;".$actors["surname"][$i]."<br>"); $i++;}?></td>
  </tr>
  <tr>
    <th scope="row" valign="top" align="left">Director:</th>
    <td><?php $i=0; while($directors["name"][$i]){print($directors["name"][$i]."&nbsp;".$directors["surname"][$i]."<br>"); $i++;}?></td>
  </tr>
  <tr>
    <th scope="row" valign="top" align="left">Genre:</th>
    <td><?php $i=0; while($gerne[$i]){print($gerne[$i]."<br>"); $i++;}?></td>
  </tr>
  <tr>
    <th scope="row" valign="top" align="left">Realease Date:</th>
    <td><?php print($film["rdate"]);?></td>
  </tr>
  <tr>
    <th scope="row" valign="top" align="left">
	<?php 
	if($m_s==0)
	{print("Duration:");}
	else{ print("Seasons:");}?>
    </th>
    <td>
	<?php 
	if($m_s==0)
	{print($film["duration"]);}
	else{ print($film["seasons"]);}?>
    </td>
  </tr>
  <tr>
    <th scope="row" valign="top" align="left">
	<?php 
	if($m_s==0)
	{print("Estimated Budget:");}
	else{ print("Channel:");}?>
    </th>
    <td>
	<?php 
	if($m_s==0)
	{print($film["estbudget"]);}
	else{ print($film["channel"]);}?>
    </td>
  </tr>
  <tr>
    <th scope="row" valign="top" align="left">
	<?php 
	if($m_s==0)
	{print("Number Of Oscars:");}
	else{ print("Ended:");}?>
    </th>
    <td>
	<?php 
	if($m_s==0)
	{print($film["oscar"]);}
	else{ 
		if($film["ended"])
		{print("Yes");}
		else{print("No");}
		}?>
    </td>
  </tr>
</table>
    </div>
        <div id="map-canvas"></div>
  </div>
  <div style="margin-left:10%;">
    <div class="headers" >Write Your Review</div>
    <?php print('<form action="show.php?fid='.$film["fid"].'" method="post" name="myform2">');?>
    <div class="semi">Title:<input name="title" type="text" size="40" />&nbsp;User:<input name="user" type="text" value="guest" size="40" /></div>
    <div class="semi" style="margin-left:37px;"><textarea name="comment" cols="30" rows="40" wrap="off"></textarea></div>
    <div class="headers" style="margin-left:40px;">Rate</div>
    <div>
    <ul class="form">
    <li class="rating">
        <input type="radio" name="rating" value="0" checked /><span class="hide"></span>
        <input type="radio" name="rating" value="1" /><span></span>
        <input type="radio" name="rating" value="2" /><span></span>
        <input type="radio" name="rating" value="3" /><span></span>
        <input type="radio" name="rating" value="4" /><span></span>
        <input type="radio" name="rating" value="5" /><span></span>
    </li>
</ul>
<span style="margin-left:37px;"><input name="submit" type="submit" value="Review !" /></span>
    </div>
    </form>
    </div>
    <div style="margin-left:10%;">
    <div class="headers" style="margin-left:37px;">Comments</div>
    </div>
    <?php
	
	$i=0;
	while($review["comment"][$i]){
		print('<div style="margin-left:10%; margin-bottom:15px;"><div class="title" style="margin-left:37px;">'.$review["title"][$i]);
		$j=0; while($j<$review["rate"][$i]){echo "&nbsp;<img src=\"img/stars2.png\" width=\"22\" height=\"16\"/>";$j++;}
		print('</div><div class="semi" style="margin-left:37px;">'.$review["comment"][$i].'</div><div class="semi2" style="margin-left:37px;">by '.$review["user"][$i].'</div></div>');
		$i++;
		}
	?>
</div>
      <script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform2");
  frmvalidator.EnableMsgsTogether();
  frmvalidator.addValidation("title","req","You Forget Your Title");
  frmvalidator.addValidation("user","req","You Forget Your Alias");
  frmvalidator.addValidation("comment","req","You Forget Your Comment");
  frmvalidator.addValidation("rating","req","You Forget Your Rating");
      </script>
</body>
</html>