<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Professional</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/bv.css" media="screen" />
</head>
<body>
<div id="wrap">

<div id="header">
<h1><a href="#">Bernd Vierhuf</a></h1>
<h2>Ueberschrift 2</h2>
</div>

<div id="content">

<div id="intro">
Kurze Beschreibung der Seite
</div>

<div id="left">

Content
<br>

<?php

echo "Document_Root:" . $_SERVER["DOCUMENT_ROOT"]."<br><br>";
echo "REQUEST_URI:" .$_SERVER["REQUEST_URI"]."<br><br>";
echo "HTTP_REFERER:" .$_SERVER["HTTP_REFERER"]."<br><br>";

?>


<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<b>Url:</b>
   <input type="Text" name="name" value="yyy"/><br>
<b>Url:</b>
   <input type="Text" name="name1" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" />
</form>


</div>

<div id="right">

<h3>Advertisments or Latest Articles</h3>
<div class="rightads">
<img src="../images/ads.gif" alt="Ads" />
</div>

<div class="menu">
<h4>Categories</h4>
<ul>
<li><a href="#">Home</a></li>
</ul>
</div>

</div>

<div style="clear: both;"> </div>
</div>

<div id="footer">
&copy; Copyright by <a href="#">Bernd Vierhuf</a> | Design by <a href="http://www.minimalistic-design.com">Minimalistic Design</a>
</div>

<div id="bottom"> </div>

</div>
</body>
</html>