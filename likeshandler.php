<?php
$pixelfed = $pid;
$bluesky = $bid;


$xpath = file_get_contents('https://public.api.bsky.app/xrpc/app.bsky.feed.getLikes?limit=100&uri='.$bluesky);
$bskylikes = substr_count($xpath,"\"handle\":");

        ob_start();
        $pid=$postIDg;$bid=$entryg;
        include('pixelfedlikescript.php');
        $response=ob_get_clean();

$out2 = deletepftop('{', 'favourites_count":', $response);

function deletepftop($beginning3, $end3, $response) {
  $beginning3Pos = strpos($response, $beginning3);
  $end3Pos = strpos($response, $end3);
  if ($beginning3Pos === false || $end3Pos === false) {
    return $xpath1;
  }

  $textToDelete3 = substr($response, $beginning3Pos, ($end3Pos + strlen($end3)) - $beginning3Pos);

  return str_replace($textToDelete3, '', $response);
}

$pfed = again_delete_all_between(',"reblogged"', 'false}', $out2);


function again_delete_all_between($beginning4, $end4, $out2) {
  $beginning4Pos = strpos($out2, $beginning4);
  $end4Pos = strpos($out2, $end4);
  if ($beginning4Pos === false || $end4Pos === false) {
    return $string;
  }

  $textToDelete4 = substr($out2, $beginning4Pos, ($end4Pos + strlen($end4)) - $beginning4Pos);

  return str_replace($textToDelete4, '', $out2);
}    

$changeat = array("at://","app.bsky.feed.");
$toposturl= array("https://bsky.app/profile/","");
$bskyurl = str_replace($changeat,$toposturl,$bluesky);

$totallikes = $pfed + $bskylikes;
print("<b>&hearts; ".$totallikes." Likes</b> <font size=\"2\"><a href=\"https://".$instance."/i/web/post/".$pixelfed."\" style=\"text-decoration: none\"><img src=\"/fediverse.png\" height=\"10\"> ".$pfed." on the Fediverse</a> <a href=\"".$bskyurl."\" style=\"text-decoration:none\"><img src=\"/bskylogo.png\" height=\"10\"> ".$bskylikes." on Bluesky</a>");

?>
