/**
* @program: Go
*
* @description:grpc客户端调用一
*
* @author: Mr.chen
*
* @create: 2020-07-06 10:04
**/
package main
import (
	"golang.org/x/net/context"
	"google.golang.org/grpc"
	"grpc/day02/lotteryservice"
	"log"
	"os"
)


func main() {
	// 建立连接到gRPC服务
	conn, err := grpc.Dial("127.0.0.1:8028", grpc.WithInsecure())
	if err != nil {
		log.Fatalf("did not connect: %v", err)
	}
	// 函数结束时关闭连接
	defer conn.Close()
	// 创建Waiter服务的客户端
	t := lotteryservice.NewGreeterClient(conn)
	// 模拟请求数据
	res := "hello Mr.chen"
	// os.Args[1] 为用户执行输入的参数 如：go run ***.go 123
	if len(os.Args) > 1 {
		res = os.Args[1]
	}

	// 调用gRPC接口
	tr, err := t.Lottery(context.Background(), &lotteryservice.LotteryReq{Param:res})
	if err != nil {
		log.Fatalf("could not greet: %v", err)
	}
	log.Printf("服务端响应: %s", tr.Data)
}
