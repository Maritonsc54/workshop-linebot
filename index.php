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
            switch ($getMessage) {
                case "campaign:active":
                    $jsonFlex = [
                        "type" => "flex",
                        "altText" => "Hello Flex Message",
                        "contents" => [
                          "type" => "bubble",
                          "direction" => "ltr",
                          "header" => [
                            "type" => "box",
                            "layout" => "vertical",
                            "contents" => [
                              [
                                "type" => "text",
                                "text" => "Purchase",
                                "size" => "lg",
                                "align" => "start",
                                "weight" => "bold",
                                "color" => "#009813"
                              ],
                              [
                                "type" => "text",
                                "text" => "฿ 100.00",
                                "size" => "3xl",
                                "weight" => "bold",
                                "color" => "#000000"
                              ],
                              [
                                "type" => "text",
                                "text" => "Rabbit Line Pay",
                                "size" => "lg",
                                "weight" => "bold",
                                "color" => "#000000"
                              ],
                              [
                                "type" => "text",
                                "text" => "2019.02.14 21:47 (GMT+0700)",
                                "size" => "xs",
                                "color" => "#B2B2B2"
                              ],
                              [
                                "type" => "text",
                                "text" => "Payment complete.",
                                "margin" => "lg",
                                "size" => "lg",
                                "color" => "#000000"
                              ]
                            ]
                          ],
                          "body" => [
                            "type" => "box",
                            "layout" => "vertical",
                            "contents" => [
                              [
                                "type" => "separator",
                                "color" => "#C3C3C3"
                              ],
                              [
                                "type" => "box",
                                "layout" => "baseline",
                                "margin" => "lg",
                                "contents" => [
                                  [
                                    "type" => "text",
                                    "text" => "Merchant",
                                    "align" => "start",
                                    "color" => "#C3C3C3"
                                  ],
                                  [
                                    "type" => "text",
                                    "text" => "BTS 01",
                                    "align" => "end",
                                    "color" => "#000000"
                                  ]
                                ]
                              ],
                              [
                                "type" => "box",
                                "layout" => "baseline",
                                "margin" => "lg",
                                "contents" => [
                                  [
                                    "type" => "text",
                                    "text" => "New balance",
                                    "color" => "#C3C3C3"
                                  ],
                                  [
                                    "type" => "text",
                                    "text" => "฿ 45.57",
                                    "align" => "end"
                                  ]
                                ]
                              ],
                              [
                                "type" => "separator",
                                "margin" => "lg",
                                "color" => "#C3C3C3"
                              ]
                            ]
                          ],
                          "footer" => [
                            "type" => "box",
                            "layout" => "horizontal",
                            "contents" => [
                              [
                                "type" => "text",
                                "text" => "View Details",
                                "size" => "lg",
                                "align" => "start",
                                "color" => "#0084B6",
                                "action" => [
                                  "type" => "uri",
                                  "label" => "View Details",
                                  "uri" => "https://google.co.th/"
                                ]
                              ]
                            ]
                          ]
                        ]
                      ];
                    $bot->replyMessageNew($bot->replyToken,  $jsonFlex );
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