<?php 

namespace Stag\Ezlogger\Sender;

use GuzzleHttp\Client;

class Sender{

    private static $url = "/api/projects/exception";

    public static function send($data)
    {
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env("EZ_LOG_HOST").self::$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access-token: '.env('EZ_LOG_ACCESS_TOKEN'),
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
}