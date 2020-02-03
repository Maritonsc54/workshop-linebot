<?php
require('PushmessageClass.php');
require('SendmessageClass.php') ;

$tempush = new PushmessageClass();
$sendmsg = new SendmessageClass();
    
    
    $accessToken = "3ckym0tOjI/vnueETubwqk2XibSK3Ydt63cEFos2UZqmEBzLl0zWcAsXOc7SzpdYUubGw+lNTxn2Q3ywndT4G94EtevAfLNj8TMTJA/az5KJmKu/GIz/y1xgaJe7+TcQaf0fMBgAa0poVIqXs40K0gdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    print_r("adasdasd");
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
  
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = $arrayJson['events'][0]['replyToken'];
    $xxx = $sendmsg->pushMsg($arrayHeader,$tempush->campaign_use('U1bdaedc4492ce19a05cabceff301a12f', "TEST PUSH"));
    print_r($xxx);
    
?>
