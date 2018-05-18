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
$q_name = 'q_linvo'; //无需队列名 
$k_route = 'key_1'; //路由key 
 
//创建连接和channel 
$conn = new AMQPConnection($conn_args);   
if (!$conn->connect()) {   
    die("Cannot connect to the broker!<br/>");   
}   
$channel = new AMQPChannel($conn);   
 
 
//创建交换机对象    
$ex = new AMQPExchange($channel);   
$ex->setName($e_name);


//创建队列    
$q = new AMQPQueue($channel); 
$q->setName($q_name);  //
$q->declare(); //声明一个新队列
$q->bind($e_name, $k_route);  ////绑定交换机与队列，并指定路由键 



//发送消息 
//$channel->startTransaction(); //开始事务  
for($i=0; $i<5; ++$i){  
    $message = "TEST MESSAGE! ".date("h:i:sa"); //消息内容


    //$message = array('call_url'=>'http://ep.mall.weilian.cn/test2.php','username'=>"test");
    $res = $ex->publish($message, $k_route);
    echo "Send Message:".$res."<br/>";  
} 
//$channel->commitTransaction(); //提交事务 
 
$conn->disconnect();
?>