<?php

require('SqlqueryClass.php') ;

class PushmessageClass
{
	
	public function campaign_use($id , $prefix){
		$request = new SqlqueryClass;
		
		$campaign[] = $request->campaign_by_prefix(strtoupper($prefix));
		foreach($campaign as $result){
			$campaign_use = $request->campaign_use($result["prefix"],$result["date_start"],$result["date_end"]);
			
			$data = '[{
				"to": "'.$id.'",
				"messages": [
					{
						"type": "flex",
						"altText": "CORPORATE A",
						"contents": {
						"type": "bubble",
						"body": {
							"type": "box",
							"layout": "vertical",
							"spacing": "md",
							"contents": [
								{
									"type": "text",
									"text": "CORPORATE A (5,000 บาท)",
									"size": "md",
									"weight": "bold"
								},
								{
									"type": "box",
									"layout": "vertical",
									"spacing": "sm",
									"contents": [
										{
										  "type": "separator"
										},
										{
										  "type": "box",
										  "layout": "baseline",
										  "contents": [
										  
											{
											  "type": "text",
											  "text": "ราคา / ข้อความ * ",
											  "size": "sm",
											  "flex": 0,
											  "margin": "sm",
											  "weight": "bold"
											},
											{
											  "type": "text",
											  "text": "0.50 / ข้อความ *",
											  "size": "sm",
											  "align": "end",
											  "color": "#AAAAAA"
											}
										  ]
										},
										{
										  "type": "box",
										  "layout": "baseline",
										  "contents": [
											{
											  "type": "text",
											  "text": "จำนวนข้อความ",
											  "size": "sm",
											  "flex": 0,
											  "margin": "sm",
											  "weight": "bold"
											},
											{
											  "type": "text",
											  "text": "10,000 ข้อความ",
											  "size": "sm",
											  "align": "end",
											  "color": "#AAAAAA"
											}
										  ]
										},
										{
										  "type": "box",
										  "layout": "baseline",
										  "contents": [
											{
											  "type": "text",
											  "text": "อายุการใช้งาน",
											  "size": "sm",
											  "flex": 0,
											  "margin": "sm",
											  "weight": "bold"
											},
											{
											  "type": "text",
											  "text": "1 ปี",
											  "size": "sm",
											  "align": "end",
											  "color": "#AAAAAA"
											}
										  ]
										},
										{
											"type": "box",
											"layout": "baseline",
											"contents": [
											  {
												"type": "text",
												"text": "Sender Name",
												"size": "sm",
												"flex": 0,
												"margin": "sm",
												"weight": "bold"
											  },
											  {
												"type": "text",
												"text": "1 Sender",
												"size": "sm",
												"align": "end",
												"color": "#AAAAAA"
											  }
											]
										},
										{
										  "type": "separator"
										},
										{
											"type": "text",
											"text": "'.iconv('tis-620','utf-8',$result["condition"]).'",
											"size": "xxs",
											"color": "#FF5551",
											"wrap": true
										}
									]
								}
							]
						}
					  }
					}
				]
			}]';
		
			$someArray = json_decode($data, true);
			return $someArray[0];
			
		}; //end foreach
	
	}
   
    public function flex_button($id) {
       $data = '[{
			"to": "'.$id.'",
			"messages": [
			  {
					"type": "template",
					"altText": "this is a carousel template",
					"template": {
						"type": "carousel",
						"columns": [
							{
							  "thumbnailImageUrl": "https://example.com/bot/images/item1.jpg",
							  "imageBackgroundColor": "#FFFFFF",
							  "title": "this is menu",
							  "text": "description",
							  "defaultAction": {
								  "type": "uri",
								  "label": "View detail",
								  "uri": "http://example.com/page/123"
							  },
							  "actions": [
								  {
									  "type": "postback",
									  "label": "Buy",
									  "data": "action=buy&itemid=111"
								  },
								  {
									  "type": "postback",
									  "label": "Add to cart",
									  "data": "action=add&itemid=111"
								  },
								  {
									  "type": "uri",
									  "label": "View detail",
									  "uri": "http://example.com/page/111"
								  }
							  ]
							},
							{
							  "thumbnailImageUrl": "https://example.com/bot/images/item2.jpg",
							  "imageBackgroundColor": "#000000",
							  "title": "this is menu",
							  "text": "description",
							  "defaultAction": {
								  "type": "uri",
								  "label": "View detail",
								  "uri": "http://example.com/page/222"
							  },
							  "actions": [
								  {
									  "type": "postback",
									  "label": "Buy",
									  "data": "action=buy&itemid=222"
								  },
								  {
									  "type": "postback",
									  "label": "Add to cart",
									  "data": "action=add&itemid=222"
								  },
								  {
									  "type": "uri",
									  "label": "View detail",
									  "uri": "http://example.com/page/222"
								  }
							  ]
							}
						]
					}
				  
			  }
			]
		}]';
		
		$someArray = json_decode($data, true);
		return $someArray[0];
    }
}
?>