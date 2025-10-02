<?php
//// THE VALUES BELOW SHOULD BE CHANGED TO YOUR NEEDS
$maxposts = 9; // Built to be a value of either 3, 6 or 9
$instance = "pixelfed.social" // Change to what instance you're not
$fediuser = "yourusername" // Change to your Fediverse username
$atprotouser = "yourusername.bsky.social" // Change to your Atproto username
$atprotodid = "did:plc:blablabla" // Change to your Aproto DID
/////////////////////////////////////////////////////



$date = time();

/////////////////////////// P I X E L F E D /////////////////////////////////
// URL of the ATOM feed
$feedUrl = "https://".$instance."/users/".$fediuser.".atom";

// Load the feed
$xml = simplexml_load_file($feedUrl, "SimpleXMLElement", LIBXML_NOCDATA);

if ($xml === false) {
    die("Error loading ATOM feed.");
}

// Register the media namespace
$xml->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');

// Start HTML output
// Loop through the first three entries
$counter = 0;
foreach ($xml->entry as $entry) {
    if ($counter >= $maxposts) {
        break;
    }

    $title = (string) $entry->title;
    $link = (string) $entry->link['href'];
    $published = (string) $entry->updated;

    // Extract media:content image URL (handling nested arrays)
    $mediaContentArray = $entry->xpath('media:content');
    $imageUrl = '';

    if (!empty($mediaContentArray)) {
        foreach ($mediaContentArray as $mediaContent) {
            if (isset($mediaContent['url'])) {
                $imageUrl = (string) $mediaContent['url'];
                break; // Take the first available image
            }
        }
    }
    $healthy = array('https://'.$instance.'/p/'.$fediuser.'/');
    $yummy = array('');

    if($counter == 0) {
        $position = strpos($title, '#');
        $captiona = substr($title, 0, $position);
        $imagea = $imageUrl;
        $publisheda = $published;
        $postIDa = str_replace($healthy,$yummy,$link);


    } else if($counter == 1) {
        $position = strpos($title, '#');
        $captionb = substr($title, 0, $position);
        $imageb = $imageUrl;
        $publishedb = $published;
        $postIDb = str_replace($healthy,$yummy,$link);
        
        
    } else if($counter == 2) {
        $position = strpos($title, '#');
        $captionc = substr($title, 0, $position);
        $imagec = $imageUrl;
        $publishedc = $published;
        $postIDc = str_replace($healthy,$yummy,$link);

    } else if($counter == 3) {
        $position = strpos($title, '#');
        $captiond = substr($title, 0, $position);
        $imaged = $imageUrl;
        $postIDd = str_replace($healthy,$yummy,$link);

    } else if($counter == 4) {
        $position = strpos($title, '#');
        $captione = substr($title, 0, $position);
        $imagee = $imageUrl;
        $postIDe = str_replace($healthy,$yummy,$link);

    } else if($counter == 5) {
        $position = strpos($title, '#');
        $captionf = substr($title, 0, $position);
        $imagef = $imageUrl;
        $postIDf = str_replace($healthy,$yummy,$link);

    } else if($counter == 6) {
        $position = strpos($title, '#');
        $captiong = substr($title, 0, $position);
        $imageg = $imageUrl;
        $postIDg = str_replace($healthy,$yummy,$link);

    } else if($counter == 7) {
        $position = strpos($title, '#');
        $captionh = substr($title, 0, $position);
        $imageh = $imageUrl;
        $postIDh = str_replace($healthy,$yummy,$link);

    } else if($counter == 8) {
        $position = strpos($title, '#');
        $captioni = substr($title, 0, $position);
        $imagei = $imageUrl;
        $postIDi = str_replace($healthy,$yummy,$link);
        }



    $counter++;
}

/////////////////// B L U E S K Y ////////////////////////////////////
// URL of the JSON API
$url = "https://public.api.bsky.app/xrpc/app.bsky.feed.getAuthorFeed?actor=".$atprotouser."&limit=".$maxposts;

// Fetch the JSON data
$jsonData = file_get_contents($url);

if ($jsonData === false) {
    die("Error fetching data from API.");
}

// Decode the JSON data
$data = json_decode($jsonData, true);

if ($data === null) {
    die("Error decoding JSON data.");
}

// Extract the first three 'at://' entries
$entries = [];
if (isset($data['feed']) && is_array($data['feed'])) {
    foreach ($data['feed'] as $item) {
        if (isset($item['post']['uri']) && strpos($item['post']['uri'], 'at://') === 0) {
            $entries[] = $item['post']['uri'];
        }
    }
}

$entrya = $entries[0];
$entryb = $entries[1];
$entryc = $entries[2];
$entryd = $entries[3];
$entrye = $entries[4];
$entryf = $entries[5];
$entryg = $entries[6];
$entryh = $entries[7];
$entryi = $entries[8];


$altTexts = [];

// Loop through the feed items
if (isset($data['feed'])) {
    foreach ($data['feed'] as $item) {
        if (isset($item['post']['embed']['images'])) {
            foreach ($item['post']['embed']['images'] as $image) {
                if (isset($image['alt'])) {
                    $altTexts[] = $image['alt'];
                }
            }
        }
    }
}
$quote = array("\"");
$apostrophe = array("'");
$altTexta = str_replace($quote,$apostrophe,$altTexts[0]);
$altTextb = str_replace($quote,$apostrophe,$altTexts[1]);
$altTextc = str_replace($quote,$apostrophe,$altTexts[2]);
$altTextd = str_replace($quote,$apostrophe,$altTexts[3]);
$altTexte = str_replace($quote,$apostrophe,$altTexts[4]);
$altTextf = str_replace($quote,$apostrophe,$altTexts[5]);
$altTextg = str_replace($quote,$apostrophe,$altTexts[6]);
$altTexth = str_replace($quote,$apostrophe,$altTexts[7]);
$altTexti = str_replace($quote,$apostrophe,$altTexts[8]);
$atstring = array('at://'.$atprotodid.'/app.bsky.feed.post/');
$noatstring = array('');
$bida = str_replace($atstring,$noatstring,$entrya);
$bidb = str_replace($atstring,$noatstring,$entryb);
$bidc = str_replace($atstring,$noatstring,$entryc);
$bidd = str_replace($atstring,$noatstring,$entryd);
$bide = str_replace($atstring,$noatstring,$entrye);
$bidf = str_replace($atstring,$noatstring,$entryf);
$bidg = str_replace($atstring,$noatstring,$entryg); 
$bidh = str_replace($atstring,$noatstring,$entryh);
$bidi = str_replace($atstring,$noatstring,$entryi);

//////////////////////////// P A R S E R ///////////////////////////////////
?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDa?>&bid=<?=$bida?>"><img src="<?= $imagea ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTexta ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captiona ?><br><br>
        <?php
        ob_start();
        $pid=$postIDa;$bid=$entrya;
        include('likeshandler.php');
        $likesa=ob_get_clean();
        print($likesa);
        ?>
    </td></tr>
</table>  
<?= "<" ?>?php
if (strpos($isMobile,'1') !== false) { ?><br><?= "<" ?>?php } else {
?></td><td valign="top">
<?= "<" ?>?php } 
?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDb?>&bid=<?=$bidb?>"><img src="<?= $imageb ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTextb ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captionb ?><br><br>
        <?php
        ob_start();
        $pid=$postIDb;$bid=$entryb;
        include('likeshandler.php');
        $likesb=ob_get_clean();
        print($likesb);
        ?>
    </td></tr>
</table>  
<?= "<" ?>?php
if (strpos($isMobile,'1') !== false) { ?><br><?= "<" ?>?php } else {
?></td><td valign="top">
<?= "<" ?>?php } 
?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDc?>&bid=<?=$bidc?>"><img src="<?= $imagec ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTextc ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captionc ?><br><br>
        <?php
        ob_start();
        $pid=$postIDc;$bid=$entryc;
        include('likeshandler.php');
        $likesc=ob_get_clean();
        print($likesc);
        ?>
    </td></tr>
</table>  
<?php
    print("<?");
    ?>if (strpos($isMobile,'1') !== false) { ?><br><?php
    print("<?} else {");?>
    // NEW ROW //
?></td></tr><tr><td valign="top">
<?php print("<?php } ?>"); ?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDd?>&bid=<?=$bidd?>"><img src="<?= $imaged ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTextd ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captiond ?><br><br>
        <?php
        ob_start();
        $pid=$postIDd;$bid=$entryd;
        include('likeshandler.php');
        $likesd=ob_get_clean();
        print($likesd);
        ?>
    </td></tr>
</table>  
<?= "<" ?>?php
if (strpos($isMobile,'1') !== false) { ?><br><?= "<" ?>?php } else {
?></td><td valign="top">
<?= "<" ?>?php } 
?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDe?>&bid=<?=$bide?>"><img src="<?= $imagee ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTexte ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captione ?><br><br>
        <?php
        ob_start();
        $pid=$postIDe;$bid=$entrye;
        include('likeshandler.php');
        $likese=ob_get_clean();
        print($likese);
        ?>
    </td></tr>
</table>  
<?= "<" ?>?php
if (strpos($isMobile,'1') !== false) { ?><br><?= "<" ?>?php } else {
?></td><td valign="top">
<?= "<" ?>?php } 
?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDf?>&bid=<?=$bidf?>"><img src="<?= $imagef ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTextf ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captionf ?><br><br>
        <?php
        ob_start();
        $pid=$postIDf;$bid=$entryf;
        include('likeshandler.php');
        $likesb=ob_get_clean();
        print($likesf);
        ?>
    </td></tr>
</table>  
<?php
    print("<?");
    ?>if (strpos($isMobile,'1') !== false) { ?><br><?php
    print("<?} else {");?>
    // NEW ROW //
?></td></tr><tr><td valign="top">
<?php print("<?php } ?>"); ?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDg?>&bid=<?=$bidg?>"><img src="<?= $imageg ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTextg ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captiong ?><br><br>
        <?php
        ob_start();
        $pid=$postIDg;$bid=$entryg;
        include('likeshandler.php');
        $likesg=ob_get_clean();
        print($likesg);
        ?>
    </td></tr>
</table>  
<?= "<" ?>?php
if (strpos($isMobile,'1') !== false) { ?><br><?= "<" ?>?php } else {
?></td><td valign="top">
<?= "<" ?>?php } 
?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDh?>&bid=<?=$bidh?>"><img src="<?= $imageh ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTexth ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captionh ?><br><br>
        <?php
        ob_start();
        $pid=$postIDh;$bid=$entryh;
        include('likeshandler.php');
        $likesh=ob_get_clean();
        print($likesh);
        ?>
    </td></tr>
</table>  
<?= "<" ?>?php
if (strpos($isMobile,'1') !== false) { ?><br><?= "<" ?>?php } else {
?></td><td valign="top">
<?= "<" ?>?php } 
?>
<table class="post">
    <tr border="0"><td height="200" border="0">
        <a href="/post.php?pid=<?=$postIDi?>&bid=<?=$bidi?>"><img src="<?= $imagei ?>" style="max-width:100%;max-height:500px;" alt="<?= $altTexti ?>"></a>
    </td></tr>
    <tr border="0"><td border="0">
        <?= $captioni ?><br><br>
        <?php
        ob_start();
        $pid=$postIDi;$bid=$entryi;
        include('likeshandler.php');
        $likesi=ob_get_clean();
        print($likesi);
        ?>
    </td></tr>
</table>