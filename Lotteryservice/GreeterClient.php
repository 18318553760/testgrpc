<?php
/**
 * 当前文件是自己编写的，使用服务端的.proto文件，执行protoc --php_out=. lottery.proto这样是不会生成当前的文件，当使用
 * $ protoc --proto_path=./ --php_out=./ --grpc_out=./ --plugin=protoc-gen-grpc=/usr/local/bin/grpc_php_plugin ./lottery.proto
 *是会自动生成如下文件
 *
 */
namespace Lotteryservice
class GreeterClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Sends a greeting
     * @param \Lotteryservice\lotteryReq $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function lottery(\Lotteryservice\lotteryReq $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/lotteryservice.Greeter/lottery',
        $argument,
        ['\Lotteryservice\lotteryRes', 'decode'],
        $metadata, $options); // lotteryservice为lottery.proto文件下的package名称，Greeter为ottery.proto文件下的service的名称，lottery为rpc的方法名
    }

}