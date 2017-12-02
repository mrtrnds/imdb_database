<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16" />
<script src="jquery-1.10.2.min.js"></script>
<script type='text/JavaScript' src='files/scw.js'></script>
<script language="JavaScript" src="files/gen_validatorv31.js" type="text/javascript"></script>
<title>insert</title>

</head>

<body>
<div style="margin:0 auto; text-align:center;">
	<div style=""><a href="index.php"><img src="img/logo.png" width="186" height="189" /></a></div>
    <form method="post" class="form">
    <span class="headers" style="margin-bottom:15px;">Add A Film To The Map</span>
    
    <span class="headers" style="margin-bottom:20px;">Movie OR Series</span>
    <select name="m_or_s"  class="ch">
    <option selected="selected">Select...</option>
    <option>Movie</option>
    <option>Series</option>
    </select>
    </form>
    <div class="movie">
    <form action="movie.php" method="post" class="form" name="myform">
    <span class="headers">Name</span>
	<input type="text" name="name"/>
	<span class="headers">Duration</span>
	<input type="text" name="duration"/>
    <span class="headers">Release Date</span>
	<input type="date" name="rdate"/>
    <span class="headers">Oscars</span>
	<input type="text" name="oscars"/>
    <span class="headers">Estimated Budget</span>
	<input type="text" name="estbudget"/>
    <span class="headers">Genre</span>
	<span class="ger">
    
    </span>
    <div style="margin-top:10px;">
    <input class="submit" type="submit" name="submit" value="SUBMIT"/>
    </div>
    </form>
    </div>
    

    <div class="series">
    <form action="series.php" method="post" class="form" name="myform2">
    <span class="headers">Name</span>
	<input type="text" name="name"/>
	<span class="headers">Seasons</span>
	<input type="text" name="seasons"/>
    <span class="headers">Release Date</span>
	<input type="date" name="rdate"/>
    <span class="headers">Channel</span>
	<input type="text" name="channel"/>
    <span class="headers">Ended?</span>
	<select name="ended">
    <option>Yes</option>
    <option>No</option>
    </select>
    <span class="headers">Genre</span>
	<span class="ger">
    
    </span>
    <div style="margin-top:10px;">
    <input class="submit" type="submit" name="submit" value="SUBMIT"  />
    </div>
    </form>
    </div>
<script>
$('select.ch').change(function() {
	if ($('select.ch :selected').val()=="Movie"){
    $("div.series").hide("slow");
	$("div.movie").show("slow");
  }
  else if($('select.ch :selected').val()=="Series"){
    $("div.movie").hide("slow");
	$("div.series").show("slow");
  }
});

</script>
<script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  frmvalidator.EnableMsgsTogether();
  frmvalidator.addValidation("name","req","You Forget The Name");
  frmvalidator.addValidation("duration","req","You Forget The Duration");
  frmvalidator.addValidation("rdate","req","You Forget The Release Date"); 
      </script>
      <script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform2");
  frmvalidator.EnableMsgsTogether();
  frmvalidator.addValidation("name","req","You Forget The Name");
  frmvalidator.addValidation("seasons","req","You Forget The Seasons");
  frmvalidator.addValidation("rdate","req","You Forget The Release Date");
      </script>
      <script>
      var startingNo =0;
var $node = "";
var varCount=0
    $node += '<div style="position:relative;  left:-15px;"><img class="addg" style="position:relative; left:-5px; top:5px;" src="img/addg.png" /><input type="text" name="gerne'+varCount+'"/></div>';

//add them to the DOM
$('.ger').prepend($node);

//add a new node
$('.addg').on('click', function(){
varCount++;
$node = '<div style="position:relative;  left:15px;"><input type="text" name="gerne'+varCount+'"/><img style="position:relative;  top:10px;" class="minusg" src="img/minusg.png" height="25" width="32"/></div>';
$(this).parent().parent().append($node);
});
//remove a textfield    
$('.ger').on('click','.minusg', function(){
   $(this).parent().remove();
   varCount--;
});
</script>
</body>
</html>