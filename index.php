<?php
require_once __DIR__ . '/vendor/autoload.php';
$accessToken = "3ckym0tOjI/vnueETubwqk2XibSK3Ydt63cEFos2UZqmEBzLl0zWcAsXOc7SzpdYUubGw+lNTxn2Q3ywndT4G94EtevAfLNj8TMTJA/az5KJmKu/GIz/y1xgaJe7+TcQaf0fMBgAa0poVIqXs40K0gdB04t89/1O/w1cDnyilFU=";

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '067ef242eec79c066cdef6793f2f0488']);
$imagePath = 'richmenu-template-guide-01.png';
$contentType = 'image/jpeg';
$response = $bot->uploadRichMenuImage('richmenu-82739ab1296eeb62edf97e4326a3c56a', $imagePath, $contentType);

print_r($response)
?>