<?php

	// require('PushmessageClass.php');
	require('SendmessageClass.php') ;

	// $tempush = new PushmessageClass();
	$sendmsg = new SendmessageClass();
	
    //$accessToken = "eyJhbGciOiJIUzI1NiJ9.UFWcrQH1jMyi3gPzq-WsOclipRRJqbctbksu5wjz9cXyCWMRb_wMEyyA9t3NA84sgQ27e0HRLErYLi-RFgireLnDpxvnGs7LZspA7PoKvR8U8oavJwefuO35V4utaE4VSBZVo27Lr3dMeNrmsHt0oXKaDLZrpinCCl0vGq_zOok.lcKWyUj-K7i-ANwbTfEnVl8889TB-bIhrAarge5hm5o";
    $accessToken = "3ckym0tOjI/vnueETubwqk2XibSK3Ydt63cEFos2UZqmEBzLl0zWcAsXOc7SzpdYUubGw+lNTxn2Q3ywndT4G94EtevAfLNj8TMTJA/az5KJmKu/GIz/y1xgaJe7+TcQaf0fMBgAa0poVIqXs40K0gdB04t89/1O/w1cDnyilFU=";
	$content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";

	if(isset($arrayJson['events'][0]['source']['userId'])){
		$id_type ="userId";
        $id = $arrayJson['events'][0]['source']['userId'];
	}else if(isset($arrayJson['events'][0]['source']['groupId'])){
		$id_type ="groupId";
		$id = $arrayJson['events'][0]['source']['groupId'];
	}else if(isset($arrayJson['events'][0]['source']['room'])){
		$id_type ="room";
		$id = $arrayJson['events'][0]['source']['room'];
	}
	
	//get message reply
    $message = strtolower($arrayJson['events'][0]['message']['text']);

    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = $arrayJson['events'][0]['source']['userId'];
    $sendmsg->replyMsg($arrayHeader,$arrayPostData);

?>