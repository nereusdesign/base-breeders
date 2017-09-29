<?php

require '../vendor/autoload.php';







use SparkPost\SparkPost;

use GuzzleHttp\Client;

use Http\Adapter\Guzzle6\Client as GuzzleAdapter;



$httpClient = new GuzzleAdapter(new Client());

$sparky = new SparkPost($httpClient, ['key'=>'f4287710c11bddf7a05104e7dfbae6de5161172c']);





//list 1 has been sent







$promise = $sparky->transmissions->post([

    'content' => [

        'from' => [

            'name' => 'Todd Moore',

            'email' => 'todd.moore@findyourbreeder.com',

        ],

        'subject' => 'Breeder question',

        'html' => '<html><head></head> <body style="height:100%;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <center> <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;height:100%;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%;" ><tr> <td align="center" valign="top" id="bodyCell" style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;height:100%;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%;" > <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" ><tr><td align="center" valign="top" id="templateHeader" data-template-container style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#F7F7F7;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top-width:0;border-bottom-width:0;padding-top:0px;padding-bottom:0px;" ><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;max-width:600px !important;" ><tr> <td valign="top" class="headerContainer" style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top-width:0;border-bottom-width:0;padding-top:0;padding-bottom:0;" ></td></tr></table></td></tr><tr><td align="center" valign="top" id="templateBody" data-template-container style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#FFFFFF;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top-width:0;border-bottom-width:0;padding-top:27px;padding-bottom:63px;" ><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;max-width:600px !important;" ><tr> <td valign="top" class="bodyContainer" style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top-width:0;border-bottom-width:0;padding-top:0;padding-bottom:0;" ><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextContentContainer" style="max-width:100%;min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <tbody><tr> <td valign="top" class="mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;word-break:break-word;color:#808080;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;" > <h2 style="display:block;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;color:#222222;font-family:Helvetica;font-size:28px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal;text-align:left;" >You\'ve been sent a special breeder deal.</h2><p style="font-size:18px !important;margin-top:10px;margin-bottom:10px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#808080;font-family:Helvetica;line-height:150%;text-align:left;" >This is a quick message to let you know that findyourbreeder.com a top breeder directory is having their first fall sale right now. All prices have been slashed 60% so that lifetime memberships are as low as one payment of $19.99 (as well as other discounts for 3 month, 6 month and 1 year memberships). With your membership its a full unlimited membership with the following features:</p><ul><li style="font-size:18px !important;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" >Unlimited puppy/kitten\'s for sale listings</li><li style="font-size:18px !important;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" >Unlimited pictures and breeder listings</li><li style="font-size:18px !important;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" >No additional fees for edits or multiple breeds</li><li style="font-size:18px !important;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" >Full support 7 days a week (no worry about not being able to reach someone for help. They respond 7 days a week)</li><li style="font-size:18px !important;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" >Special member only deals and discounts</li><li style="font-size:18px !important;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" >Deals on gas and airline tickets for breeders who need to deliver a pet to their new forever homes.</li></ul><div style="font-size:18px !important;" >If you wish to jump on this limited time offer before it expires simply follow the link below, or if you have more questions more information about the website, features, and how to add your email to the do not contact list are below.<br>&nbsp;</div></td></tr></tbody></table> </td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;table-layout:fixed !important;" > <tbody class="mcnDividerBlockOuter"> <tr> <td class="mcnDividerBlockInner" style="min-width:100%;padding-top:18px;padding-bottom:0px;padding-right:18px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <tbody><tr> <td style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <span></span> </td></tr></tbody></table> </td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <tbody class="mcnButtonBlockOuter"> <tr> <td valign="top" align="center" class="mcnButtonBlockInner" style="padding-top:0;padding-right:18px;padding-bottom:18px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse:separate !important;border-radius:3px;background-color:#3F69B3;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <tbody> <tr> <td align="center" valign="middle" class="mcnButtonContent" style="font-family:Helvetica;font-size:18px;padding-top:18px;padding-bottom:18px;padding-right:18px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <a class="mcnButton " title="Get Your Discount" href="https://findyourbreeder.com/register" target="_self" style="font-weight:bold;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:#FFFFFF;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;display:block;" >Get Your Discount</a> </td></tr></tbody> </table> </td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" ><tbody class="mcnBoxedTextBlockOuter"> <tr> <td valign="top" class="mcnBoxedTextBlockInner" style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextContentContainer" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <tbody><tr> <td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <table border="0" cellpadding="18" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width:100% !important;background-color:#FFFFFF;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" > <tbody><tr> <td valign="top" class="mcnTextContent" style="text-align:left;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;word-break:break-word;color:#808080;font-family:Helvetica;font-size:16px;line-height:150%;" > <div style="text-align:left;" >And to be clear this is not a broker service, nobody interferes &nbsp;in your screening and placement process. There are deals available &nbsp;both for gas cards as well as plane tickets for members who need to ship or deliver, but find your breeder plays no active role in deciding who you sale to nor would you ever have to pay anything other than your membership fee. If you have any questions, people are standing by at contact@findyourbreeder.com or if you wish to unsubscribe and not receiving any other offers please go to <a href="https://www.findyourbreeder.com/unsubscribe" target="_blank" style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#00ADD8;font-weight:normal;text-decoration:underline;" >www.findyourbreeder.com/unsubscribe</a></div></td></tr></tbody></table> </td></tr></tbody></table> </td></tr></tbody></table> </center> </body> </html>',
        'text' => 'Hi this is Sue from dogshomeonline.com the breeder directory and social network for dog breeders and people in search of dogs. I just wanted to extend an offer to you to join our website. For the next 24 hours we are having a flash sale on lifetime memberships. $16.99 - and no that is not a typo. Just one payment for $16.99 and you\'re all set. Like many other sites, it is fully unlimited. Unlimited pictures, unlimted uploaded, unlimited edits, unlimited ads for only $16.99. This is again only available for the next 24 hours (or if we hit 30 new signups before the 24 hours ends). If you have ever considered advertising or are looking to advertise more, now is the time. This is the lowest price, I know of, from any major breeder directory and by listing with us not only do you gain exposure to all our guest also having more sites link to your own website or facebook pages boosts your own site in google search rankings. But I just wanted to send a quick notice about the flash sale. Just go to https://www.dogshomeonline.com/join.php?coupon=topbreeder or  If you have any questions, comments concerns, you can contact dogs home online at https://www.dogshomeonline.com/contact.php If you wish to block your email from visitors discounts please do so at https://www.dogshomeonline.com/block.php',

    ],

    'recipients' => ['list_id' => '09272017'],

]);



try {

    $response = $promise->wait();

    echo $response->getStatusCode()."\n";

    print_r($response->getBody())."\n";

} catch (\Exception $e) {

    echo $e->getCode()."\n";

    echo $e->getMessage()."\n";

}







?>