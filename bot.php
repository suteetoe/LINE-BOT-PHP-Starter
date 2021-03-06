<?php

/*
1. if send message register keep userId to client
*/

$access_token = "LhJ5HCtMecci0Lb/Sj9Z2PIy1+Fb8UR+UdR6sZJGyVkzZqWGmlBcu/wtM3jncoJZXM3mhBmX8qR2wkBDFdA4DiCTGWyXNYeLnwHdp8c2V93WSlHVWEkyiruDRgLpDh/Rky3FVaT7yDsAwdTsllghqAdB04t89/1O/w1cDnyilFU=";


// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			$uid = '';
			if ($event['source']['type']=='group') {
				$uid = $event['source']['groupId'];
			}
			else if ($event['source']['type']=='room') {
				$uid = $event['source']['roomId'];
			}
			else 
				{
				$uid = $event['source']['userId'];
			}

			$uid .= 'type : ' . $event['source']['type'];

			$replyMessage = [
				'type' => 'text',
				'text' => 'uid : ' . $uid
				];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$replyMessage],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";