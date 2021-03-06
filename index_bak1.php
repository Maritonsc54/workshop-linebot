<?php
    include ('LineBotLibrary.php');

    // Line Setting
    $channelSecret = '067ef242eec79c066cdef6793f2f0488';
    $access_token  = '3ckym0tOjI/vnueETubwqk2XibSK3Ydt63cEFos2UZqmEBzLl0zWcAsXOc7SzpdYUubGw+lNTxn2Q3ywndT4G94EtevAfLNj8TMTJA/az5KJmKu/GIz/y1xgaJe7+TcQaf0fMBgAa0poVIqXs40K0gdB04t89/1O/w1cDnyilFU=';
    $richMenuId = "richmenu-82e6ec42a68a15ef62f812a2bf98fd90";
    $richMenuImagePath = "richmenu-template-03.png";
    $bot = new LineBotLibrary($channelSecret, $access_token);

    //Upload rich menu image
    $bot->uploadRichMenuImage($richMenuId, $richMenuImagePath, 'image/jpeg');

    if (!empty($bot->isEvents)) {
        
        $getId = $bot->message->id;
        $getMessage = strtolower($bot->message->text);
        $getType =  $bot->message->type;

        if($getId != "" && $getType == "text" ){
            $bot->replyMessageNew($bot->replyToken, $bot);
            switch ($getMessage) {
                case "campaign:active":
                    $bot->replyMessageNew($bot->replyToken, 'active===>'.$getMessage);
                    break;
                case "campaign:inactive":
                    $bot->replyMessageNew($bot->replyToken, 'inactive===>'.$getMessage);
                    break;
                default:
                    $bot->replyMessageNew($bot->replyToken, $bot->message);
            }
        }

        // $bot->replyMessageNew($bot->replyToken, $bot->message->text);

        // Succeeded
        if ($bot->isSuccess()) { echo 'Succeeded!'; exit(); }

        // Failed
        echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); exit();

    }

?>