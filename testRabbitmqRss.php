<?php 
//配置信息 
$conn_args = array( 
    'host' => '127.0.0.1',  
    'port' => '5672',  
    'login' => 'guest',  
    'password' => 'guest', 
    'vhost'=>'/' 
);   
$e_name = 'e_linvo'; //交换机名 
$q_name = 'q_linvo'; //队列名 
$k_route = 'key_1'; //路由key 
 
//创建连接和channel 
$conn = new AMQPConnection($conn_args);   
if (!$conn->connect()) {   
    die("Cannot connect to the broker!<br/>");   
}   
$channel = new AMQPChannel($conn);   


/* create a queue object */
$queue = new AMQPQueue($channel);
$queue->setName($q_name);
$res = $queue->declare();
echo "Total Message: ".$res."<br/>";
//var_dump($res);//exit;




//while(True){ 
    $queue->consume("processMessage");
    //$queue->consume('processMessage', AMQP_AUTOACK); //自动ACK应答 
//}
$conn->disconnect();

/**
 * 消费回调函数
 * 处理消息
 */
$i = 0;
function processMessage($envelope, $queue) {
   global $i;
   //var_dump($envelope);
   $body = $envelope->getBody();
   echo "Message $i: " . $body . "<br/>";
   
   $tag = $envelope->getDeliveryTag();
   echo "DeliveryTag:".$tag."<br/>";
   $queue->ack($tag); //手动发送ACK应答
   $i++;
   if ($i > 1) {
       return false;
   }
}

die;







?>