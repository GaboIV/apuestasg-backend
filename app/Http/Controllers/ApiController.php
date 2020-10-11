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
}
