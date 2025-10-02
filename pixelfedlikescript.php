<?php
$id = $_GET['id'];
$url = 'https://'.$instance.'/api/v1/statuses/'.$id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Accept: application/json', // Example of a common header
    'Authorization: Bearer YOUR-API-TOKEN-HERE'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
}
curl_close($ch);
echo($response);

?>