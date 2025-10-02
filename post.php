<?php
$atprotodid = "Your ATproto DID";


$isMobile = (bool)preg_match('#\b(ip(hone|od)|android\b.+\bmobile|opera m(ob|in)i|windows (phone|ce)|blackberry'.
                    '|s(ymbian|eries60|amsung)|p(alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                    '|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );
$pid = $_GET['pid'];
$bid = $_GET['bid'];

if($pid == "") {
    print("Parameter missing");
    die();
}
if($bid == "") {
    print("Parameter missing");
    die();
}



$url = 'https://pixelfed.social/api/v1/statuses/'.$pid; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Accept: application/json', // Example of a common header
    'Authorization: Bearer YOUR-TOKEN-HERE'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$json = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
}
curl_close($ch);

// Load the feed

$json = json_decode($json, true);
$content = $json['content'];
$position = strpos($content, '<');
$timestampraw = new \DateTime($json['created_at']);
$timestamp = $timestampraw->format('d M Y H:i');
$caption = substr($content, 0, $position);
$captionnohashtags = $caption;
if (isset($json['media_attachments']) && is_array($json['media_attachments'])) {
    foreach ($json['media_attachments'] as $attachment) {
        if (isset($attachment['url'])) {
            $imgurl = $attachment['url'];
            $alt = $attachment['description'];
        }
    }
}

/*        if(strpos($content, "#climate") !== false) {
            $caption=$caption." <font size=\"2\" face=\"courier\"><a class=\"hashtag\" href=\"/climate/\" style=\"text-decoration:none\">#climate</a></font>";
        }
        if(strpos($content, "#feminism") !== false) {
            $caption=$caption." <font size=\"2\" face=\"courier\"><a class=\"hashtag\" href=\"/feminism/\" style=\"text-decoration:none\">#feminism</a></font>";
        }
        if(strpos($content, "#anticapitalism") !== false) {
            $caption=$caption." <font size=\"2\" face=\"courier\"><a class=\"hashtag\" href=\"/anticapitalism/\" style=\"text-decoration:none\">#anticapitalism</a></font>";
        }
        if(strpos($content, "#antifascism") !== false) {
            $caption=$caption." <font size=\"2\" face=\"courier\"><a class=\"hashtag\" href=\"/antifascism/\" style=\"text-decoration:none\">#antifascism</a></font>";
        }
        if(strpos($content, "#queer") !== false) {
            $caption=$caption." <font size=\"2\" face=\"courier\"><a class=\"hashtag\" href=\"/queerissues/\" style=\"text-decoration:none\">#queer</a></font>";
        }
        if(strpos($content, "#palestine") !== false) {
            $hashtagpalestine = "true";
        }
        if(strpos($content, "#freepalestine") !== false) {
            $hashtagpalestine = "true";
        }
        if($hashtagpalestine == "true") {
            $caption=$caption." <font size=\"2\" face=\"courier\"><a class=\"hashtag\" href=\"/palestine/\" style=\"text-decoration:none\">#palestine</a></font>";
        } */

$quote = array("\"");
$apostrophe = array("&quot;");
$alt = str_replace($quote,$apostrophe,$alt);

?><head>
<meta property="og:image" content="<?=$imgurl?>">
<meta property="og:title" content="My post" />
<meta property="og:url" content="https://example.org/post.php?pid=<?=$pid?>&bid=<?=$bid?>" />
<meta property="og:image:alt" content="<?=$alt?>" />
<link rel="manifest" href="./manifest.json">
<title>My post</title>
<?php
include("../header.txt");
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
    a.title {
        color: black;
        text-decoration:none;
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
    .iframe[src*="theheartofthetardis.politicalmemes.org"] {
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
    a.title {
        color: white;
        text-decoration:none;
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
<img src="thott_banner.jpg" width="100%" height="120"></a><br>
<p align="center">
<table align="center" border="0" valign="top"<?php
if (strpos($isMobile,'1') !== false) {  } else {
?> style="table-layout:fixed" width="75%"
<?php } 
?>><tr>
<?php
if (strpos($isMobile,'1') !== false) {
 // include('../mob_followerscount.txt'); 
} else {
?><td valign="top" rowspan="17"><a class="title" href="/"><img src="thott_profile.png" height="128">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
<h1>The Heart of the TARDIS</h1></a><br>
<?php include('../followerscount.txt'); ?>
<br><br><font size="2">
<a style="text-decoration:none" href="https://pixelfed.social/" rel="me">Follow on Pixelfed</a><br>
<a style="text-decoration:none" href="https://mastodon.social/">Follow on Mastodon.social</a><br>
<a style="text-decoration:none" href="https://bsky.app/">Follow&nbsp;on&nbsp;Bluesky&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br>

<tr><td align="left">

<table class="post">
    <tr border="0"><td height="200" border="0">


        <?php
if (strpos($isMobile,'1') !== false) {
    ?><a href="/" style="text-decoration:none"><a class="title" href="/"><img src="profile.png" height="20" align="left"><font size="4"> <b>My Profile</a></font></b></a><br>
    <?php } ?><p align="center">
        <img src="<?=$imgurl?>" style="max-width: 100%" alt="<?=$alt?>">
    </td></tr>
    <tr border="0"><td border="0">
        <font size="2" color="grey"><i><?=$timestamp?></i></font><br>
        <?=$caption?><br><br>
<?php 
$pixelfed=$pid;$bluesky='at://'.$atprotodid'/app.bsky.feed.post/'.$bid;
        ob_start();
        $pid=$pixelfed;$bid=$bluesky;
        include('../newposts/likeshandler.php');
        $likesa=ob_get_clean();
        print($likesa);
if (strpos($isMobile,'1') !== false) { 
?>
<p><button>&#128227; Share!</button></p>
<p class="result"></p>
<script language="javascript">
const shareData = {
  title: "My amazing website",
  url: "https://example.org/post.php?pid=<?=$pid?>&bid=<?=$bid?>",
};

const btn = document.querySelector("button");
const resultPara = document.querySelector(".result");

// Share must be triggered by "user activation"
btn.addEventListener("click", async () => {
  try {
    await navigator.share(shareData);
    resultPara.textContent = "Shared successfully";
  } catch (err) {
    resultPara.textContent = `Error: ${err}`;
  }
});

</script>
<?php } 
?>
    </td></tr>
</table> 

</td></tr></table>
<hr width="100%" color="red"><p align="center">
This website doesn't have a cookie wall because it doesn't use tracking cookies. How about that!</body></html>
<?php die(); ?>
