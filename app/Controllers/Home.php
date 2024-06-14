<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;
use Config\Services;
use App\Controllers\ApiHook;

class Home extends BaseController
{
    public function getCoinList()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $url = "https://ccpayment.com/ccpayment/v2/getCoinList";
        $content = [];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp . ($body ?? '');

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Setting up the request
        $client = Services::curlrequest();
        $headers = [
            "Content-Type" => "application/json;charset=utf-8",
            "Appid" => $app_id,
            "Sign" => $server_sign,
            "Timestamp" => $timestamp
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'body' => $body
        ]);

        // $jsonData = json_encode($content);
        // $file_path = WRITEPATH . 'uploads/data.json';
        // file_put_contents($file_path, $jsonData);

        $result = json_decode($response->getBody(), true);
        dd($result);
    }

    public function coinInfo(){
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $url = "https://ccpayment.com/ccpayment/v2/getCoin";
        $content = ['coinId'=>1603];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp . ($body ?? '');

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Setting up the request
        $client = Services::curlrequest();
        $headers = [
            "Content-Type" => "application/json;charset=utf-8",
            "Appid" => $app_id,
            "Sign" => $server_sign,
            "Timestamp" => $timestamp
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'body' => $body
        ]);

        $result = json_decode($response->getBody(), true);
        dd($result);
    }

    public function getQueryBalance()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $url = "https://ccpayment.com/ccpayment/v2/getAppCoinAssetList";
        $content = [];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp . ($body ?? '');

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Setting up the request
        $client = Services::curlrequest();
        $headers = [
            "Content-Type" => "application/json;charset=utf-8",
            "Appid" => $app_id,
            "Sign" => $server_sign,
            "Timestamp" => $timestamp
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'body' => $body
        ]);

        $result = json_decode($response->getBody(), true);
        dd($result);
    }

    public function getBalance()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $url = "https://ccpayment.com/ccpayment/v2/getAppCoinAsset";
        $content = ["coinId"=> 1280];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp . ($body ?? '');

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Setting up the request
        $client = Services::curlrequest();
        $headers = [
            "Content-Type" => "application/json;charset=utf-8",
            "Appid" => $app_id,
            "Sign" => $server_sign,
            "Timestamp" => $timestamp
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'body' => $body
        ]);

        $result = json_decode($response->getBody(), true);
        dd($result);
    }

    public function deposit()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $url = "https://ccpayment.com/ccpayment/v2/createAppOrderDepositAddress";
        $content = [
            "coinId"=> 1891,
            "price"=> "0.0002",
            "orderId"=> "T-VKYRIMRFD8M7T",
            "chain"=> "ETH_SEPOLIA"
        ];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp . ($body ?? '');

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Setting up the request
        $client = Services::curlrequest();
        $headers = [
            "Content-Type" => "application/json;charset=utf-8",
            "Appid" => $app_id,
            "Sign" => $server_sign,
            "Timestamp" => $timestamp
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'body' => $body
        ]);

        $result = json_decode($response->getBody(), true);
        dd($result);
    }

    public function formWD()
    {
        return view('formwd');
    }

    public function withdraw()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $url = "https://ccpayment.com/ccpayment/v2/applyAppWithdrawToNetwork";
        $content = [
            "coinId"=> 1891,
            "address"=> "0x9d9dB315a891B8B191d407687bBf61434D7C7B8b",
            "orderId"=> "N49F5UIO7W32MXIM8",
            "chain"=> "ETH_SEPOLIA",
            "amount"=> "0.002"
        ];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp . ($body ?? '');

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Setting up the request
        $client = Services::curlrequest();
        $headers = [
            "Content-Type" => "application/json;charset=utf-8",
            "Appid" => $app_id,
            "Sign" => $server_sign,
            "Timestamp" => $timestamp
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'body' => $body
        ]);

        $result = json_decode($response->getBody(), true);
        dd($result);
    }

    public function respond(){
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $timestamp = $this->request->getHeaderLine('Timestamp');
        $sign = $this->request->getHeaderLine('Sign');
        $sign_text = $this->request->getBody();

        // Mencetak yang di tangkap
        $jsonData = json_encode($sign_text);
        $file_path = WRITEPATH . 'uploads/data.json';
        file_put_contents($file_path, $jsonData);

        if ($this->verifySignature($sign_text, $sign, $app_id, $app_secret, $timestamp)) {
            return $this->response->setStatusCode(Response::HTTP_OK)->setBody('success');
        } else {
            return $this->response->setStatusCode(Response::HTTP_UNAUTHORIZED)->setBody('Invalid signature');
        }
    }

    // public function respond(){
    //     $sign_text = $this->request->getBody();
    // }

    private function verifySignature($content, $signature, $app_id, $app_secret, $timestamp)
    {
        $sign_text = $app_id . $timestamp . $content;
        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);
        return $signature === $server_sign;
    }

}
