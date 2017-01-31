<?php


$access_token = "LhJ5HCtMecci0Lb/Sj9Z2PIy1+Fb8UR+UdR6sZJGyVkzZqWGmlBcu/wtM3jncoJZXM3mhBmX8qR2wkBDFdA4DiCTGWyXNYeLnwHdp8c2V93WSlHVWEkyiruDRgLpDh/Rky3FVaT7yDsAwdTsllghqAdB04t89/1O/w1cDnyilFU=";

$url = 'https://api.line.me/v2/bot/message/push';

$headers = array('Authorization: Bearer ' . $access_token);


$Uid = "C22d30228c5352a5709bc1725d54d8a0f"; // test 

//"U085e99fa163271339d4ec5028d5731be"; // วิรุณ
//"C82211a2fb3cab06d4ae62f203ed8bd67";
//"U2188b7a5c3c13500da732de0fd132835"; //"C82211a2fb3cab06d4ae62f203ed8bd67";// ["U2188b7a5c3c13500da732de0fd132835","C82211a2fb3cab06d4ae62f203ed8bd67"];

$messageSend = [
'type' => 'text',
'text' => 'วงเงินเครดิต xx บาท'
];

$data = [
'to' => $Uid,
'messages' => [$messageSend],
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

