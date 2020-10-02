<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Traits\ApiResponser;

class ApiController extends Controller
{
    use ApiResponser;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    public function sendMessage($message, $recipients)
    {
        $account_sid = "ACd5fbbd41e71b0e7c709a2fae387ca61d";
        $auth_token = "a24f37e1c76a1917ffdda72258c579a9";
        $twilio_number = "+12056229751";

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
    }
}
