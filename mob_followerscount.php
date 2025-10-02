<?php
$xpath = file_get_contents('https://public.api.bsky.app/xrpc/app.bsky.actor.getProfile?actor=YOUR_ATPROTO_USERNAME');
$out1 = deletebstop('{"did"', '"followersCount":', $xpath);

function deletebstop($beginning1, $end1, $xpath) {
  $beginning1Pos = strpos($xpath, $beginning1);
  $end1Pos = strpos($xpath, $end1);
  if ($beginning1Pos === false || $end1Pos === false) {
    return $xpath1;
  }

  $textToDelete1 = substr($xpath, $beginning1Pos, ($end1Pos + strlen($end1)) - $beginning1Pos);

  return str_replace($textToDelete1, '', $xpath);
}


$out = delete_all_between(',', '}', $out1);


function delete_all_between($beginning, $end, $out1) {
  $beginningPos = strpos($out1, $beginning);
  $endPos = strpos($out1, $end);
  if ($beginningPos === false || $endPos === false) {
    return $string;
  }

  $textToDelete = substr($out1, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

  return str_replace($textToDelete, '', $out1);
}


//$healthy1 = array(",\"followsCount\":2,\"postsCount\":9}");
//$yummy1   = array("");

//$string = str_replace($healthy1, $yummy1, $out1);


$ypath = file_get_contents('https://pixelfed.social/TheHeartoftheTARDIS');
$out2 = deletepftop('<!DOCTYPE html>', 'Following, ', $ypath);

function deletepftop($beginning3, $end3, $ypath) {
  $beginning3Pos = strpos($ypath, $beginning3);
  $end3Pos = strpos($ypath, $end3);
  if ($beginning3Pos === false || $end3Pos === false) {
    return $xpath1;
  }

  $textToDelete3 = substr($ypath, $beginning3Pos, ($end3Pos + strlen($end3)) - $beginning3Pos);

  return str_replace($textToDelete3, '', $ypath);
}


$out0 = again_delete_all_between(' Followers', '</html>', $out2);


function again_delete_all_between($beginning4, $end4, $out2) {
  $beginning4Pos = strpos($out2, $beginning4);
  $end4Pos = strpos($out2, $end4);
  if ($beginning4Pos === false || $end4Pos === false) {
    return $string;
  }

  $textToDelete4 = substr($out2, $beginning4Pos, ($end4Pos + strlen($end4)) - $beginning4Pos);

  return str_replace($textToDelete4, '', $out2);
}



$total = $out + $out0;
$len = strlen($total);
if($len < 4) {
    print("&nbsp;");
}
print("<img src=\"profile.png\" height=\"44\"><br><a href=\"#\" style=\"text-decoration:none\" class=\"followers\"><div class=\"tooltip\"><font size=\"3\"><b>".$total." followers<br><span class=\"tooltiptext\">".$out0." followers on the Fediverse + ".$out." followers on Bluesky</span></div></a></font>");
?></b><br>
Follow on:
<table></td></tr><tr border="0">
<td border="0"><div style="border: solid 0 #060; border-width:2px; padding:0.5ex;text-align:center"><a href="https://pixelfed.social/" style="text-decoration:none" class="followers"><img src="/pixelfedlogo.png"><br>Pixelfed</a></div></td>
<td border="0"><div style="border: solid 0 #060; border-width:2px; padding:0.5ex;text-align:center"><a href="https://mastodon.social/" style="text-decoration:none" class="followers"><img src="/mastodontiny.png"><br>Mastodon</a></div></td>
<td><div style="border: solid 0 #060; border-width:2px; padding:0.5ex;text-align:center"><a href="https://bsky.app/" style="text-decoration:none" class="followers"><img src="/bskylogo.png"><br>Bluesky</a></div></td>
<td border="0"></td><td border="1"><div style="border: solid 0 #060; border-width:2px; padding:0.5ex; height: 36px;">
<button class="sharebutton"><font size="4">&#128227;</font><br>Share</button>
<script language="javascript">
const shareData = {
  title: "My amazing profile",
  url: "https://example.org/",
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
            </div>
</td></tr></table></td></tr></table><table align="center" border="0" valign="top">
