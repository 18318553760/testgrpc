<?php
namespace channel;

class channels
{
    public function lotteryService()
    {
        $client = new \Lotteryservice\lotteryServiceClient('127.0.0.1:8028', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure()
        ]);

        return $client;
    }

}