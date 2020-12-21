<?php


class tools
{
    public function index($text)
    {

        echo $text;
        exit();
        if (extension_loaded('curl')) {
            echo "kurulu";
        } else {
            echo "kurulu değil";
        }
    }

    public function getPageContent($page){
        $ch = curl_init($page);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function sendToTelegramChannel($message){
        $botToken="YOUR_BOT_TOKEN";

        $website="https://api.telegram.org/bot".$botToken;
        $chatId=-Your_Channel;
        $params=[
            'chat_id'=>$chatId,
            'text'=>$message,
        ];
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    public function tweet(){

    }
}