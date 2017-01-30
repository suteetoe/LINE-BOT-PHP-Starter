<?php

$access_token = "LhJ5HCtMecci0Lb/Sj9Z2PIy1+Fb8UR+UdR6sZJGyVkzZqWGmlBcu/wtM3jncoJZXM3mhBmX8qR2wkBDFdA4DiCTGWyXNYeLnwHdp8c2V93WSlHVWEkyiruDRgLpDh/Rky3FVaT7yDsAwdTsllghqAdB04t89/1O/w1cDnyilFU=";

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;