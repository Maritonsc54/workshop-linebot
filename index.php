<?php
// require_once __DIR__ . '/vendor/autoload.php';
// $accessToken = "3ckym0tOjI/vnueETubwqk2XibSK3Ydt63cEFos2UZqmEBzLl0zWcAsXOc7SzpdYUubGw+lNTxn2Q3ywndT4G94EtevAfLNj8TMTJA/az5KJmKu/GIz/y1xgaJe7+TcQaf0fMBgAa0poVIqXs40K0gdB04t89/1O/w1cDnyilFU=";

// $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
// $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '067ef242eec79c066cdef6793f2f0488']);

//Upload rich menu image
// $imagePath = 'richmenu-template-guide-01.png';
// $contentType = 'image/jpeg';
// $response = $bot->uploadRichMenuImage('richmenu-cdf849b8bef42da1057ae584bf8e0436', $imagePath, $contentType);

//Reply Message


include ('LineBotLibrary.php');

// Line Setting
$channelSecret = '067ef242eec79c066cdef6793f2f0488';
$access_token  = '3ckym0tOjI/vnueETubwqk2XibSK3Ydt63cEFos2UZqmEBzLl0zWcAsXOc7SzpdYUubGw+lNTxn2Q3ywndT4G94EtevAfLNj8TMTJA/az5KJmKu/GIz/y1xgaJe7+TcQaf0fMBgAa0poVIqXs40K0gdB04t89/1O/w1cDnyilFU=';

$bot = new LineBotLibrary($channelSecret, $access_token);
if (!empty($bot->isEvents)) {
        
    $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

    // Succeeded
    if ($bot->isSuccess()) { echo 'Succeeded!'; exit(); }

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); exit();

}

?>