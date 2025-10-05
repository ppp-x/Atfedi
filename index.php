<?php
$ip = $_SERVER['REMOTE_ADDR'];
$isMobile = (bool)preg_match('#\b(ip(hone|od)|android\b.+\bmobile|opera m(ob|in)i|windows (phone|ce)|blackberry'.
                    '|s(ymbian|eries60|amsung)|p(alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                    '|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );
?>
<head>
<link rel="manifest" href="./manifest.json">
<title>The amazing title to this page</title>
<?php
if (strpos($isMobile,'1') !== false) { 
?><meta name="viewport" content="width=device-width, initial-scale=1.0" /><?php
} ?>
<style>
<style>
      body { margin: 0; padding: 0; }
      
/* Light mode */
@media (prefers-color-scheme: light) {
    body {
        background-color: white;
        color: black;
    }
    .post {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .sharebutton {
        background-color:white;
        border:0px;
        color:blue
    }
}

/* Dark mode */
@media (prefers-color-scheme: dark) {
    body {
        background-color: #222222;
        color: white;
    }
    .post {
        border: 1px solid white;
        border-collapse: collapse;
    }
    .iframe[src*="stuffifound.politicalmemes.org"] {
        color-scheme: light;
  }
    a.hashtag {
        color: #b1b1b1;
    }
    a.hashtag:visited {
        color: #b1b1b1;
    }
    .sharebutton {
        background-color: #222222;
        border:0px;
        color:white
    }
    a.followers {
        color: white;
    }
}
    /* Tooltip container */
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 0px dotted grey; 
}
    /* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 200px;
  background-color: white;
  color: #000;
  text-align: center;
  padding: 5px 5px;
  border-radius: 6px;
  border: 1px solid red;
 
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
h1 {
  font-weight: bold;
  display:inline;
  font-size: 1em;
}
</style>
</head>
<body style="margin:0;" bgcolor="white" text="black" alink="black" vlink="blue" link="blue">
<font face="arial">
<img src="banner.jpg" width="100%" height="120"><br>
<p align="center">
<table align="center" border="0" valign="top"<?php
if (strpos($isMobile,'1') !== false) {  } else {
?> style="table-layout:fixed" width="75%"
<?php } 
?>><tr>
<?php
if (strpos($isMobile,'1') !== false) {
 include('../mob_followerscount.txt'); 
} else {
?><td valign="top" rowspan="17"><img src="profile.png" height="128">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
<h1>The amazing title to this page</h1><br>
<?php include('../followerscount.txt'); ?>
<br><br><font size="2">
<a style="text-decoration:none" href="https://pixelfed.social/" rel="me">Follow on Pixelfed</a><br>
<a style="text-decoration:none" href="https://mastodon.social/">Follow on Mastodon.social</a><br>
<a style="text-decoration:none" href="https://bsky.app/">Follow&nbsp;on&nbsp;Bluesky&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br>

<tr><td bgcolor="blue"<?php
if (strpos($isMobile,'1') !== false) { } else {
?> colspan="3"<?php } ?> align="center">
    

<b><font size="4"><font color="white">Newest posts</b></font></font></td></tr><tr><td valign="top">
    <?php require('output.php'); ?>
<br><br></td></tr><tr><td bgcolor="blue" colspan="3" align="center" id="highlights">

<br><br></td></tr>
</table> 
<br><br>
</td></tr></table>
<hr width="100%" color="red"><p align="center">
This website doesn't have a cookie wall because it doesn't use tracking cookies. How about that!</body></html>
<?php die(); ?>

