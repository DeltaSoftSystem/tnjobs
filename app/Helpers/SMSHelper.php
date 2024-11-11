<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use App\Models\smsConfig;


class SMSHelper
{
    public static function setSMSConfig($mobile_number, $message)
    {
        $apiUrl = "http://mobicomm.dove-sms.com//submitsms.jsp";
        $params = [
            'user' => "TMSER",
            'key' => "3070a8e5f6XX",
            'mobile' => '+91' . $mobile_number, 
            'message' => $message, 
            'senderid' => "TNMHRD",
            'accusage' => 1
        ];
        
        $response = Http::get($apiUrl, $params);

        if ($response->successful()) {
            $responseData = $response->json(); 
        } else {
            $errorMessage = $response->body(); 
        }
    }
}
