<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use Sample\PayPalClient;
use  PayPalHttp\HttpException;

class PayClient extends Controller
{
    public function index(Request $request){
            $clientId = "AReOqHL8_Se1gKNumi5j8uKEpfX5ZQ4n8120YZHMzmUtRx25eWgSCI0YUVoImm0q8I7sD5LMGWmSMABb";
            $clientSecret = "EMtrGLKAAH-3bf9gPj4hQO9s0-_wN--Vlb_fF78-F15EoGqN1Ole-gbxy_fKu8xo2838cNgW_YQuM7q4";
            $environment = new SandboxEnvironment($clientId, $clientSecret);
            $client = new PayPalHttpClient($environment);
            $request = new OrdersCreateRequest();
$request->prefer('return=representation');
$request->body = [
                     "intent" => "CAPTURE",
                     "purchase_units" => [[
                         "reference_id" => "test_ref_id1",
                         "amount" => [
                             "value" => "100.00",
                             "currency_code" => "USD"
                         ]
                     ]],
                     "application_context" => [
                          "cancel_url" => "https://example.com/cancel",
                          "return_url" => "https://example.com/return"
                     ] 
                 ];

try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
    }
}
