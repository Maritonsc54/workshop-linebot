<?php

	require('PushmessageClass.php');
	require('SendmessageClass.php') ;

	$tempush = new PushmessageClass();
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

	#ตัวอย่าง Message Type "Text"
    if($message == "campaign"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $arrayJson['events'][0]['replyToken'];
        $sendmsg->replyMsg($arrayHeader,$arrayPostData);
	
        replyMsg($arrayHeader,$arrayPostData);
    }else if($message == "จำนวนสิทธิ์คงเหลือ"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $arrayJson['events'][0]['replyToken'];
        $sendmsg->replyMsg($arrayHeader,$arrayPostData);
	}else if($message == "ผู้ใช้สิทธิ์ทั้งหมด"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $arrayJson['events'][0]['replyToken'];
        $sendmsg->replyMsg($arrayHeader,$arrayPostData);
    }else if($message == "gpc"){
		$sendmsg->pushMsg($arrayHeader,$tempush->campaign_use($id , $message));
    }else if($message == "1"){
		$sendmsg->pushMsg($arrayHeader,$tempush->flex_button($id));
    }
	
	
	
    //#ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
         $sendmsg->replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
         $sendmsg->replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
         $sendmsg->replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
         $sendmsg->replyMsg($arrayHeader,$arrayPostData);
    }else{
		$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "1";
        $arrayPostData['messages'][0]['stickerId'] = "131";
         $sendmsg->replyMsg($arrayHeader,$arrayPostData);
	}
	
/*	function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
        curl_close ($ch);
    }
	
	function pushMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/push ";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
        curl_close ($ch);
    }
*/
   exit();
?>