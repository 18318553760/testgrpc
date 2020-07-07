<?php

//引入 composer 的自动载加
require __DIR__ . '/vendor/autoload.php';
// require __DIR__ . '/channel/channels.php';
// $channels = new channel\channels();

// $lotteryClient = $channels->lotteryService();

// $lotteryRequest = new \Lotteryservice\lotteryReq();

// $lotteryRequest->setParam("hello");

// $lottery_res = $lotteryClient->Lottery($lotteryRequest)->wait();

// list($reply, $status) = $lottery_res;
// print_r($status);die;
// $data = $reply->getData();
// var_dump($data);die;

use Grpc\ChannelCredentials;
ini_set("display_errors", true);
error_reporting(E_ALL);

$lotteryRequest = new \Lotteryservice\lotteryReq();
$lotteryRequest->setParam("hello");
$client = new \Lotteryservice\GreeterClient("127.0.0.1:8028", [
    'credentials' => ChannelCredentials::createInsecure(), //不加密
    'timeout' => 3000000,
]);

//分别是响应、状态对象
list($reply, $status) = $client->Lottery($lotteryRequest)->wait();

if (!$reply) {
    echo json_encode($status);
    return;
}

//data
$data = $reply->getData();
var_dump($data);die;
