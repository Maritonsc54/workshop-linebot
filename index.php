<?php
    include ('LineBotLibrary.php');

    // Line Setting
    $channelSecret = '067ef242eec79c066cdef6793f2f0488';
    $access_token  = '3ckym0tOjI/vnueETubwqk2XibSK3Ydt63cEFos2UZqmEBzLl0zWcAsXOc7SzpdYUubGw+lNTxn2Q3ywndT4G94EtevAfLNj8TMTJA/az5KJmKu/GIz/y1xgaJe7+TcQaf0fMBgAa0poVIqXs40K0gdB04t89/1O/w1cDnyilFU=';

    $bot = new LineBotLibrary($channelSecret, $access_token);
    if (!empty($bot->isEvents)) {
        
        $bot->replyMessageNew($bot->replyToken, $bot->message->text);

        // Succeeded
        if ($bot->isSuccess()) { echo 'Succeeded!'; exit(); }

        // Failed
        echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); exit();

    }

?>